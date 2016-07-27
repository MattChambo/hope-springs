<?php 

class SignUpController extends PageController {


	public function __construct($dbc) {

		parent::__construct();
		// Save database connection
		$this->dbc = $dbc;

		// Did the user submit account details
		if( isset( $_POST['signupsubmit'] )) {
			$this->processNewAccountDetails();
		}

	}

	public function buildHTML() {
		// Insantiate (create instance of) Plates library
		$plates = new League\Plates\Engine('app/templates');

		// Prepare a container for data
		$data = [];

		echo $plates->render('signup', $data);
	}

	private function processNewAccountDetails() {
		$totalErrors = 0;

		// Validate user name

		 if( strlen($_POST['username']) > 30 ){

		 	$this->data['userNameMessage'] = '<p>Your user name can only be 30 characters long</p>';
		 	$totalErrors++;

		 }

		if( strlen($_POST['username']) === 0 ){

			$totalErrors++;
			$this->data['userNameMessage'] = '<p>User name is required</p>';
			

		}

		if( strlen($_POST['email']) > 100 ){

			$totalErrors++;
			$this->data['emailMessage'] = '<p>Your email address cannot be more than 89 characters long</p>';
			

		}

		// Make sure the E-mail is not in use
		$filteredEmail = $this->dbc->real_escape_string( $_POST['email'] );

		$sql = "SELECT email
				FROM user
				WHERE email = '$filteredEmail' ";

		// Run the query
		$result = $this->dbc->query($sql);

		// If the query failed OR there is a result
		if( !$result || $result->num_rows > 0 ) {

			$totalErrors++;
			$this->emailMessage = '<p>E-mail in use</p>';
			
		}

		// If the password is less than 8 characters long
		if( strlen($_POST['password']) < 8 ) {
			// Password is too short
			$totalErrors++;
			$this->passwordMessage = '<p>Password must be at least 8 characters</p>';
			

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

			// Prepare sql
			$sql = "INSERT INTO user(username, email, password)
					VALUES('$username','$filteredEmail','$hash')";

			// Run the query
			$this->dbc->query($sql);

			// Log the user in
			$_SESSION['id'] = $this->dbc->insert_id;

			// Redirect the user to the home page
			header('Location: index.php?page=home');
		}

	}

}