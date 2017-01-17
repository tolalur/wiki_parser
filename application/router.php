<?php
function get_data($request=null)
	{	
		$request_search = Requests::get('https://ru.wikipedia.org/w/api.php?action=query&list=search&srwhat=text&srsearch='.$request.'&format=json');

		//$response = Requests::get('https://ru.wikipedia.org/w/api.php?action=query&titles=Путин,%20Владимир Владимирович&prop=extracts&format=json');

		$request_search = json_decode($request_search->body,true);

		//$response = json_decode($response->body,true);
		//$text = $response['query']['pages'][5723]['extract'];
		$ret = 'Нашлось '.$request_search['query']['searchinfo']['totalhits'].' записей.';
		return $ret;
		
		
	}

class Router {
	function __construct(){
		$url = $_SERVER['REQUEST_URI'];		
		$url = explode('/', $url);

		// вызов начальной страницы
		if (empty($url[2])) {			
			require_once 'controllers/controller_main.php';
			require_once 'models/model_main.php';
			$controller = new Controller_Main;
			$controller -> action_index();		
		}
		
		// вызов контроллера на импорт статьи в базу
		if ($url[2] == 'import' and !empty($url[3])) {
			require_once 'controllers/controller_import.php';
			require_once 'models/model_import.php';
			$controller = new Controller_Import_Data;
			$controller -> action_index($url[3]);

		} elseif ($url[2] == 'import' and empty($url[3])) {
			require_once 'controllers/controller_main.php';
			require_once 'models/model_main.php';
			$controller = new Controller_Main;
			$controller -> action_index();		
		}

		// вызов контроллера на поиск импортированной статьи в базе
		if ($url[2] == 'search' and empty($url[3])) {
			require_once 'controllers/index_controller.php';
			$controller = new Index_controller;
			$controller -> view -> search($see_url);	
		} elseif ($url[2] == 'search' and !empty($url[3])) {
			echo 'поиск по базе';
		}

		if ($url[2] == 'test') {

		file_put_contents('server.txt', json_encode($_SERVER['REQUEST_URI']));
		file_put_contents('url.txt', is_string($url[3]));
		}

		// если вызов отличается от начальной страницы и "import"/"search" - ошибка 404
		/*if (!empty($url[2]) and $url[2] !== 'import' and $url[2] !== 'search') {
			require_once 'controllers/controller_404.php';
			$controller = new Controller_404;
			$controller -> action_index();
		}*/




	}   
}

