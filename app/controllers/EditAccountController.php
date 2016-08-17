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

	if( isset($_GET['deleteaccount']) ){
		$this->deleteAccount();
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
		return $accountInfo;
	}

 	 private function processAccountEdit() {
	  	$totalErrors = 0;

	  	$userName = trim($_POST['username']);
	  	$email = trim($_POST['email']);
	  	$password = trim( $_POST['password']);
	  	$reenterPassword = trim( $_POST['reenterpassword']);

	  	if( strlen( $userName ) == 0 ) {
			$this->data['userNameMessage'] = 'You must include a user name';
			$totalErrors++;
		} elseif( strlen( 'userName' ) > 30 ) {
			$this->data['userNameMessage'] = 'Your user name cannot be more than thirty characters';
			$totalErrors++;
		}

		if( strlen( $email ) == 0 ) {
			$this->data['emailMessage'] = 'You must include an email address';
			$totalErrors++;
		} elseif( strlen( $email ) > 100 ) {
			$this->data['emailMessage'] = 'Your user name cannot be more than thirty characters';
			$totalErrors++;
		}

		if( strlen( $password ) < 8 ) {
			$this->data['passwordMessage'] = 'Your password must be at least eight characters';
			$totalErrors++;
		} elseif( strlen( $password ) > 200 ) {
			$this->data['passwordMessage'] = 'Your password cannot be more than 200 characters';
			$totalErrors++;
		}

		if( $reenterPassword != $password) {
			$this->data['reenterPasswordMessage'] = 'Your reentered password must be the same as your password';
			$totalErrors++;
		}

		if ( $totalErrors == 0) {
			$username = $this->dbc->real_escape_string($username);
			$email = $this->dbc->real_escape_string($email);
			$password = password_hash( $_POST['password'], PASSWORD_BCRYPT );

			$userID = $_SESSION['id'];

			$sql = "UPDATE user
					SET username = '$userName',
					email = '$email',
					password = '$password'
					WHERE id = $userID "; 

			$this->dbc->query($sql);

			if( $this->dbc->affected_rows == 0) {
				$this->data['reenterPasswordMessage'] = 'Something went wrong your account details were not updated';
			} else {

				// Redirect the user to the post page
				header("Location: index.php?page=home");
			}
		}
	}

		private function deleteAccount() {
			if( !isset($_SESSION['id']) ) {
				return;
			}

			$userID = $_SESSION['id'];

			if ($userID !== $_GET['userid']) {
				return; 
			} else {
				$sql = "DELETE FROM user
						WHERE id = '$userID' ";

				$this->dbc->query($sql);

				unset($_SESSION['id']);
				unset($_SESSION['privilege']);

				header('Location: index.php?page=home');
				die();
		}
	}
}