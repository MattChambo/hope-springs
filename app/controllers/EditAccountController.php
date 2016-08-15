<?php 

class EditAccountController extends PageController {

	public function __construct($dbc) {

	parent::__construct();
	// Save database connection
	$this->dbc = $dbc;

	$this->mustBeLoggedIn();

	// Get information about the post
	 $this->getAccountInfo();

	if( isset($_POST['editaccount']) ){
		$this->processAccountEdit();
	}


	}

	public function buildHTML() {

		echo $this->plates->render('editaccount', $this->data);

	}

	private function getAccountInfo() {

		$userID = $_SESSION['id'];

		$sql = "SELECT id, username, email, privilege
				FROM user
				WHERE id = '$userID'";

		$result = $this->dbc->query($sql);

		$accountInfo = $result->fetch_assoc();

		$this->data['accountInfo'] = $accountInfo;
		// return $accountInfo;
	}
}