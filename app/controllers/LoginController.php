<?php 

class LoginController extends PageController {

	private $userNameMessage;
	private $passwordMessage;

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

	if($this->userNameMessage != '') {
		$data['userNameMessage'] = $this->userNameMessage;
	}

	if($this->passwordMessage != '') {
		$data['passwordMessage'] = $this->passwordMessage;
	}

	echo $plates->render('login', $data);

	}

}