<?php 

class EditAccountController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		// Save database connection
		$this->dbc = $dbc;

		// Check to see if the user is logged in
		$this->mustBeLoggedIn();

		// Get information about the post
		$this->getAccountInfo();

		// If the user has submited the form process the edit details
		if( isset($_POST['editaccount']) ){
			$this->processAccountEdit();
		}

		// If the user has chosen to delete their account delete the account
		if( isset($_GET['deleteaccount']) ){
			$this->deleteAccount();
		}

	}

	public function buildHTML() {

		// Render the page
		echo $this->plates->render('editaccount', $this->data);

	}

	private function getAccountInfo() {

		// Assign the session id to a variable
		$userID = $_SESSION['id'];

		// Get user information
		$sql = "SELECT id, username, email, privilege
				FROM user
				WHERE id = '$userID'";

		// Run the query
		$result = $this->dbc->query($sql);

		// Save as an associative array
		$accountInfo = $result->fetch_assoc();

		$this->data['accountInfo'] = $accountInfo;
		return $accountInfo;
	}

 	 private function processAccountEdit() {

 	 	// Start with zero errors
	  	$totalErrors = 0;

	  	// Remove spaces from data
	  	$userName = trim($_POST['username']);
	  	$email = trim($_POST['email']);
	  	$password = trim( $_POST['password']);
	  	$reenterPassword = trim( $_POST['reenterpassword']);

	  	// If there isn't any data in the field or the username is too long display an error 
	  	if( strlen( $userName ) == 0 ) {
			$this->data['userNameMessage'] = 'You must include a user name';
			$totalErrors++;
		} elseif( strlen( 'userName' ) > 30 ) {
			$this->data['userNameMessage'] = 'Your user name cannot be more than thirty characters';
			$totalErrors++;
		}

		// Check that the email address exists and is not too long display error if it is too long or not there

		if( strlen( $email ) === 0 ) {
			$this->data['emailMessage'] = 'You must include an email address';
			$totalErrors++;
		} elseif( strlen( $email ) > 100 ) {
			$this->data['emailMessage'] = 'Your user name cannot be more than thirty characters';
			$totalErrors++;
		} 

		// Make sure the password is long enough but not too long and display error if it is too long or too short

		if( strlen( $password ) < 8 ) {
			$this->data['passwordMessage'] = 'Your password must be at least eight characters';
			$totalErrors++;
		} elseif( strlen( $password ) > 200 ) {
			$this->data['passwordMessage'] = 'Your password cannot be more than 200 characters';
			$totalErrors++;
		}

		// If the password was not reentered correctly display an error
		if( $reenterPassword != $password) {
			$this->data['reenterPasswordMessage'] = 'Your reentered password must be the same as your password';
			$totalErrors++;
		}

		// If there are no errors
		if ( $totalErrors == 0) {

			// Make sure there isn't any code in the data
			$username = $this->dbc->real_escape_string($username);
			$email = $this->dbc->real_escape_string($email);

			// Hash the password
			$password = password_hash( $_POST['password'], PASSWORD_BCRYPT );

			// Save user id as a variable
			$userID = $_SESSION['id'];

			// Update user info
			$sql = "UPDATE user
					SET username = '$userName',
					email = '$email',
					password = '$password'
					WHERE id = $userID "; 

			// Run the query
			$this->dbc->query($sql);

			// If the data didn't change display an error
			if( $this->dbc->affected_rows == 0) {
				$this->data['reenterPasswordMessage'] = 'Something went wrong your account details were not updated';
			} else {

				// Redirect the user to the post page
				header("Location: index.php?page=home");
			}
		}
	}

		// The function for deleting your account
		private function deleteAccount() {

			// If you are not logged in don't delete the account
			if( !isset($_SESSION['id']) ) {
				return;
			}

			$userID = $_SESSION['id'];

			// If userid is not the same as the id in the get array don't delete the account
			if ($userID !== $_GET['userid']) {
				return; 
			} else {

				// Delete the account
				$sql = "DELETE FROM user
						WHERE id = '$userID' ";

				// Run the query
				$this->dbc->query($sql);

				// Remove the session id and privilege
				unset($_SESSION['id']);
				unset($_SESSION['privilege']);

				// Return to the home page
				header('Location: index.php?page=home');
				die();
		}
	}
}