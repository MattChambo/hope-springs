<?php 

class SignUpController extends PageController {

	private $userNameMessage;
	private $emailMessage;
	private $passwordMessage;
	private $reenterPasswordMessage;

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

		if($this->emailMessage != '') {
			$data['emailMessage'] = $this->emailMessage;
		}

		if($this->passwordMessage != '') {
			$data['passwordMessage'] = $this->passwordMessage;
		}

		if($this->reenterPasswordMessage != '') {
			$data['reenterPasswordMessage'] = $this->reenterPasswordMessage;
		}

		echo $plates->render('signup', $data);
	}

}