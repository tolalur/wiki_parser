<?php

class Controller_404 extends Controller
{
	
	function action_index($request = null)
	{
		$this -> view -> error();
	}

}
