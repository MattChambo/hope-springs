<?php 

class SignUpController extends PageController {

	protected $usernamemessage;
	protected $emailmessage;
	protected $passwordmessage;
	protected $reenterpasswordmessage;

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

		if($this->usernamemessage != '') {
			$data['usernamemessage'] = $this->usernamemessage;
		}

		if($this->emailmessage != '') {
			$data['emailmessage'] = $this->emailmessage;
		}

		if($this->passwordmessage != '') {
			$data['passwordmessage'] = $this->passwordmessage;
		}

		if($this->reenterpasswordmessage != '') {
			$data['reenterpasswordmessage'] = $this->reenterpasswordmessage;
		}
		echo $plates->render('signup', $data);
	}

	private function processNewAccountDetails() {
		$totalErrors = 0;

		// Validate user name

		 if( strlen($_POST['username']) > 30 ){

		// 	$this->data['usernamemessage'] = '<p>Your user name can only be 30 characters long</p>';
		 	$totalErrors++;

		 }

		if( strlen($_POST['username']) === 0 ){

			$this->data['usernamemessage'] = '<p>Username is required</p>';
			$totalErrors++;

		}

		if( strlen($_POST['email']) > 100 ){

			$this->data['emailmessage'] = '<p>Your email address cannot be more than 89 characters long</p>';
			$totalErrors++;

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
			$this->emailMessage = 'E-mail in use';
			$totalErrors++;
		}

		// If the password is less than 8 characters long
		if( strlen($_POST['password']) < 8 ) {
			// Password is too short
			$this->passwordMessage = 'Password must be at least 8 characters';
			$totalErrors++;

		}
		var_dump($totalErrors);
		// If total errors is still 0

		if( $totalErrors == 0) {
			
			// Get user name
			$username = ( $_POST['username']);

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