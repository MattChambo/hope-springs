<?php

class EditCommentController extends PageController {

	private $commentMessage;

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

		if($this->commentMessage != '') {
			$data['commentMessage'] = $this->commentMessage;
		}

		echo $plates->render('editcomment', $data);
	}


}