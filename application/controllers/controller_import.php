<?php

class Controller_Import_Data extends Controller
{

	
	function __construct()
	{
		$this->model = new Model_Import();
		$this->view = new View();
		
	}

	public function action_index ($request = null)
	{
		$data = $this -> model -> get_data($request);
		$this -> view -> import($data);

	}
}