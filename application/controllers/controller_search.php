<?php

class Controller_Search_Data extends Controller
{

	
	function __construct()
	{
		$this->model = new Model_Search();
		$this->view = new View();
		
	}

	public function action_index ($request = null)
	{
		$this -> view -> search_index($request);

	}
        
        public function search_data ($request)
	{
		$data = $this -> model -> search_data($request);
		$this -> view -> search($data);

        }
}