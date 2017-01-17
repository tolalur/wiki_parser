<?php

class View
{
	
	function __construct()	
	{ 
		$this -> smarty = new Smarty; 
		$this -> smarty->debugging = true;
		$this -> smarty->caching = true;
		$this -> smarty->cache_lifetime = 60;
		$this -> smarty->template_dir = $_SERVER['DOCUMENT_ROOT'].'/wiki/application/smarty_files/templates/';
		$this -> smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'].'/wiki/application/smarty_files/templates_c/';
		$this -> smarty->config_dir = $_SERVER['DOCUMENT_ROOT'].'/wiki/application/smarty_files/configs/';
		$this -> smarty->cache_dir =$_SERVER['DOCUMENT_ROOT'].'/wiki/application/smarty_files/cache/';
	}
	
	

	public function index ($data)
	{

		$this -> smarty->assign("data", $data);
		$this -> smarty->assign("home", $_SERVER['SERVER_NAME'].':8080/wiki/');
		$this -> smarty->display('index.tpl');


	}

	public function import ($data)
	{
		//$this -> smarty->caching = FALSE;
                $this -> smarty->assign("data", $data);
		$this -> smarty->display('import.tpl');

	}
		public function search ($name)
	{
		$this -> smarty->caching = FALSE;
                $this -> smarty->assign("http_request", $name, true);
		$this -> smarty->display('search.tpl');

	}
	public function error ()
	{
		$this -> smarty->display('404.tpl');

	}
}
