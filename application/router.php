<?php

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
			$controller = new Controller_Import_Data();
			$controller -> action_index($url[3]);
                        
		} elseif ($url[2] == 'import' and empty($url[3])) {
			require_once 'controllers/controller_main.php';
			require_once 'models/model_main.php';
			$controller = new Controller_Main;
			$controller -> action_index();		
		}

		// вызов контроллера на поиск импортированной статьи в базе
		if ($url[2] == 'search' and !empty($url[3])) {
			require_once 'controllers/controller_search.php';
			require_once 'models/model_search.php';
			$controller = new Controller_Search_Data();
			$controller -> search_data ($url[3]);
                        
		} elseif ($url[2] == 'search' and empty($url[3])) {
			require_once 'controllers/controller_search.php';
			require_once 'models/model_search.php';
			$controller = new Controller_Search_Data();
			$controller -> action_index();
		}

		// если вызов отличается от начальной страницы и "import"/"search" - ошибка 404
		if (!empty($url[2]) and $url[2] !== 'import' and $url[2] !== 'search') {
			require_once 'controllers/controller_404.php';
			$controller = new Controller_404;
			$controller -> action_index();
		}




	}   
}

