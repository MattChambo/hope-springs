<?php 

class LoginController extends PageController {

	 private $userNameMessage;
	 private $passwordMessage;

	public function __construct($dbc) {

	parent::__construct();

	// Save database connection
	$this->dbc = $dbc;

	$this->mustBeLoggedOut();

	if( isset( $_POST['login'] ) ) {
			$this->processLoginForm();
		}

	}

	public function buildHTML() {
	//  // Insantiate (create instance of) Plates library
	//  $plates = new League\Plates\Engine('app/templates');

	//  // Prepare a container for data
	//  $data = [];

	//  if($this->userNameMessage != '') {
	//  	$data['userNameMessage'] = $this->usernameMessage;
	//  }

	// if($this->passwordMessage != '') {
	//  	$data['passwordMessage'] = $this->passwordMessage;
	//  }

	echo $this->$plates->render('login', $this->$data);

	}

	private function processLoginForm() {
		$totalErrors = 0;

		if(strlen($_POST['username']) < 3) {
			$this->data['userNameMessage'] = 'Your user name must be more than three charcters';
			$totalErrors++;
		}

		if(strlen($_POST['username']) > 30) {
			$this->data['userNameMessage'] = 'Your user name cannot be more than thirty characters';
			$totalErrors++;
		}

		// Make sure password is at least 8 characters
		if( strlen($_POST['password']) < 8 ) {

			$this->data['passwordMessage'] = 'Your password must be more than eight characters';
			$totalErrors++;

		}

		if( strlen($_POST['password']) > 100 ) {

			$this->data['passwordMessage'] = 'Your password must be less than 100 characters';
			$totalErrors++;

		}

		if($totalErrors == 0) {
			$filteredUsername = $this->dbc->real_escape_string( $_POST['username'] );

			$sql = "SELECT id, password
					FROM user
					WHERE username = '$filteredUsername'	";

			// Run the query
			$result = $this->dbc->query( $sql );

			// Is there a result?
			if( $result->num_rows == 1 ) {

				// Check the password
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

			} else {

				// Credential do not match our records
				$this->data['loginMessage'] = 'User name or password incorrect';


			}

		}

	}

}