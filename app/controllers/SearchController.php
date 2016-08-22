<?php 

class SearchController extends PageController {

	public function __construct($dbc) {
		parent::__construct();

		// Save the database conection
		$this->dbc = $dbc;

		// Make sure the user is logged in
		$this->mustBeLoggedIn();

		// Get the search results
		$this->getSearch();
	} 

	public function buildHTML() {

		echo $this->plates->render('search', $this->data);
	}

	public function getSearch() {
		if(strlen($_POST['search']) === 0){
			$searchTerm = "";
		} else {
			$result = $_POST['search'];
			$searchTerm = strtolower($result);
		}

		$this->data['searchTerm'] = $searchTerm;

		// See if the search terms are found in the title or the post
		$sql = "SELECT posts.id, title AS score_title, content AS score_content
				FROM posts
				WHERE 
					title LIKE '%$searchTerm%' OR
					content LIKE '%$searchTerm%'
				ORDER BY score_title ASC";

		$result = $this->dbc->query($sql);

		// Check to see if there are any results, get results if there are, display message if there aren't
		if( !$result || $result->num_rows == 0){
			$this->data['searchResults'] = "No Results";
		} else {
			$this->data['searchResults'] = $result->fetch_all(MYSQLI_ASSOC);
		}

	}

}