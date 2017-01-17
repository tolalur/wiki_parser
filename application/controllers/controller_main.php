<?php

class Controller_Main extends Controller
{

	
	function __construct()
	{
		$this->model = new Model_main();
		$this->view = new View();
		
	}

	public function action_index($request = null)
	{
		$data = $this -> model -> get_data();
		$this -> view -> index($data);

	}
}