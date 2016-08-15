<?php 

class EditAccountController extends PageController {

	public function __construct($dbc) {

	parent::__construct();
	// Save database connection
	$this->dbc = $dbc;

	$this->mustBeLoggedIn();

	if( isset($_POST['editaccount']) ){
		$this->processAccountEdit();
	}

	// Get information about the post
	 $this->getAccountInfo();

	}

	public function buildHTML() {

		echo $this->plates->render('editaccount', $this->data);

	}

	private function getAccountInfo() {

		$userID = $_SESSION['id'];

		$sql = "SELECT id, username, email, privilege
				FROM user";
				
				if( $_SESSION['privilege'] != 'admin') {

				$sql .= "WHERE user_id = $userID";
			}
		$result = $this->dbc->query($sql);

		$accountInfo = $result->fetch_all(MYSQLI_ASSOC);

		return $accountInfo;
	}
}