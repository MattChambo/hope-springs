<?php

class HomeController extends PageController {

	private $commentMessage;

	public function __construct($dbc) {

		parent::__construct();
		// Save database connection
		$this->dbc = $dbc;


	}

	public function buildHTML() {
		// Insantiate (create instance of) Plates library
		$plates = new League\Plates\Engine('app/templates');

		$allData = $this->getLatestPosts();

		$data = [];

		$data['allPosts'] = $allData;

		echo $plates->render('home', $data);
	}



	private function getLatestPosts() {

		// Prepare some SQL
		$sql = "SELECT posts.id, posts.user_id, posts.title, posts.content, posts.updated_at, posts.created_at, user.username,
				(SELECT COUNT(comment)
				FROM `comments`
				WHERE comments.post_id = posts.id) as commentCount
				FROM posts JOIN user ON user_id = user.id
				ORDER BY updated_at DESC
				";


		// Run the SQL and capture the result
		$result = $this->dbc->query($sql);

		// Extract the results as an array
		$allData = $result->fetch_all(MYSQLI_ASSOC);

		
		// Return the results to the code that called this function
		return $allData;


	}
}
