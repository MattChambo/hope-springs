<?php 
abstract class PageController {

	// Create variables for use on various pages
	protected $title;
	protected $metaDesc;
	protected $dbc;
	protected $plates;
	protected $data = [];

	public function __construct() {

		// Create instance of Plates library
		$this->plates = new League\Plates\Engine('app/templates');

	}

		// Force children classes to have the buildHTML function
		abstract public function buildHTML();

	public function mustBeLoggedIn() {
			// If you are not logged in
		if( !isset($_SESSION['id']) ) {
			// Redirect the user to the login page
			header('Location: index.php?page=login');
			die();
		}
	}

	public function mustBeLoggedOut() {
			// If you are logged in
		if( isset($_SESSION['id']) ) {
			// Redirect the user to the home page
			header('Location: index.php?page=home');
			die();
		}
	}

	public function getNavLinks(){

		$sql = "SELECT id, title, updated_at
				FROM posts
				ORDER BY updated_at DESC";

		$result = $this->dbc->query($sql);

		$postTitles = $result->fetch_all(MYSQLI_ASSOC);

		$this->data['allTitles'] = $postTitles;


	}

}