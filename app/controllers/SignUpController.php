<?php 

class SignUpController extends PageController {


	public function __construct($dbc) {

		parent::__construct();

		// Check to make sure the user is logged out and redirect them to the home page if they are logged in
		$this->mustBeLoggedOut();

		// Save database connection
		$this->dbc = $dbc;

		// Did the user submit account details?
		if( isset( $_POST['signupsubmit'] )) {
			$this->processNewAccountDetails();
		}

	}

	public function buildHTML() {

		echo $this->plates->render('signup', $this->data);
	}

	private function processNewAccountDetails() {
		$totalErrors = 0;

		// Validate user name

		 if( strlen($_POST['username']) > 30 ){

		 	$this->data['userNameMessage'] = 'Your user name can only be 30 characters long';
		 	$totalErrors++;

		 }

		if( strlen($_POST['username']) === 0 ){

			$totalErrors++;
			$this->data['userNameMessage'] = 'User name is required';
			

		}

		// Validate email address

		if( strlen($_POST['email']) > 89 ){

			$totalErrors++;
			$this->data['emailMessage'] = 'Your email address cannot be more than 89 characters long';
			

		}

		if( strlen($_POST['email']) === 0 ){

			$totalErrors++;
			$this->data['emailMessage'] = 'You must include an email address';
		}

		// Make sure the email address is not in use
		$filteredEmail = $this->dbc->real_escape_string( $_POST['email'] );

		$sql = "SELECT email
				FROM user
				WHERE email = '$filteredEmail' ";

		// Run the query
		$result = $this->dbc->query($sql);

		// If the query failed OR there is a result
		if( !$result || $result->num_rows > 0 ) {

			$totalErrors++;
			$this->emailMessage = 'E-mail in use';
			
		}

		// If the password is less than 8 characters long
		if( strlen($_POST['password']) < 8 ) {
			// Password is too short
			$totalErrors++;
			$this->data['passwordMessage'] = 'Password must be at least 8 characters';
			

		}

		if( strlen($_POST['password']) > 200 ) {
			// The password is too long
			$totalErrors++;
			$this->data['passwordMessage'] = 'Your password cannot be more than 200 characters';
		}

		// If the reentered password is not the same as the first password entry
		if(($_POST['password']) != ($_POST['reenterpassword'])) {
			$totalErrors++;
			$this->data['reenterPasswordMessage'] = 'Your reentered password must be the same as your password';
		}

		// If total errors is still 0

		if( $totalErrors == 0) {
			
			// Get user name
			$username = ( $_POST['username'] );

			// Hash the password
			$hash = password_hash( $_POST['password'], PASSWORD_BCRYPT );

			// Update the database
			$userName = $this->dbc->real_escape_string($_POST['username']);
			$filteredEmail = $this->dbc->real_escape_string($_POST['email']);

			// Prepare sql, insert data into user table
			$sql = "INSERT INTO user(username, email, password)
					VALUES('$username','$filteredEmail','$hash')";

			// Run the query
			$this->dbc->query($sql);

			// Log the user in and set their privilege to user
			$_SESSION['id'] = $this->dbc->insert_id;
			$_SESSION['privilege'] = 'user';

			// Redirect the user to the home page
			header('Location: index.php?page=home');
		}

	}

}