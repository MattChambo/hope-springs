<?php

class HomeController extends PageController {

	private $commentMessage;

	public function __construct($dbc) {

		// Save database connection
		$this->dbc = $dbc;


	}

	public function buildHTML() {
		// Insantiate (create instance of) Plates library
		$plates = new League\Plates\Engine('app/templates');

		// Prepare a container for data
		$data = [];
		
	}


}