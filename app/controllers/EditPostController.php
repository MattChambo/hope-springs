<?php

class EditPostController extends PageController {

	private $titleMessage;
	private $postMessage;

	public function __construct($dbc) {

		parent::__construct();
		// Save database connection
		$this->dbc = $dbc;


	}

	public function buildHTML() {
		// Insantiate (create instance of) Plates library
		$plates = new League\Plates\Engine('app/templates');

		// Prepare a container for data
		$data = [];

		if($this->titleMessage != '') {
			$data['titleMessage'] = $this->titleMessage;
		}

		if($this->postMessage != '') {
			$data['postMessage'] = $this->postMessage;
		}

		echo $plates->render('editpost', $data);
	}


}