<?php 

class LoginController extends PageController {

	public function __construct($dbc) {

	parent::__construct();

	$this->mustBeLoggedOut();

	// Save database connection
	$this->dbc = $dbc;

	if( isset( $_POST['login'] ) ) {
			$this->processLoginForm();
		}

	}

	public function buildHTML() {

	echo $this->plates->render('login', $this->data);

	}

	private function processLoginForm() {
		$totalErrors = 0;

		if(strlen($_POST['username']) < 3) {
			$this->data['userNameMessage'] = 'You must enter your full user name';
			$totalErrors++;
		}

		if(strlen($_POST['username']) > 30) {
			$this->data['userNameMessage'] = 'Your user name cannot be more than thirty characters';
			$totalErrors++;
		}

		// Make sure password is at least 8 characters
		if( strlen($_POST['password']) < 8 ) {

			$this->data['passwordMessage'] = 'Your must enter your full password';
			$totalErrors++;

		}

		if( strlen($_POST['password']) > 100 ) {

			$this->data['passwordMessage'] = 'Your password cannot be more than 100 characters please enter your password correctly';
			$totalErrors++;

		}

		if($totalErrors == 0) {
			$filteredUsername = $this->dbc->real_escape_string( $_POST['username'] );

			$sql = "SELECT id, password, privilege
					FROM user
					WHERE username = '$filteredUsername'	";

			// Run the query
			$result = $this->dbc->query( $sql );

			// Is there a result?
			if( $result->num_rows == 1 ) {

				$userData = $result->fetch_assoc();

				// Check the password
				$passwordResult = password_verify( $_POST['password'], $userData['password'] );

				// If the result was good
				if( $passwordResult == true ) {

					// Log the user in
					$_SESSION['id'] = $userData['id'];
					$_SESSION['privilege'] = $userData['privilege'];

					header('Location: index.php?page=home');

				} else {
					
					// Prepare error message
					$this->data['loginMessage'] = 'User name or password incorrect';
				}

			} 

		}

	}

}