<?php

class HomeController extends PageController {

	private $commentMessage;

	public function __construct($dbc) {

		parent::__construct();

		// Save database connection
		$this->dbc = $dbc;

		// Get the nav links
		// $test = $this->getNavLinks();
		// var_dump($test);
		// die();

		
		// Get the posts
		$this->getLatestPosts();
	}

	public function buildHTML() {

		 echo $this->plates->render('home', $this->data);
	}



	private function getLatestPosts() {

		// Pagination stuff
		if( isset($_GET['pagination']) ) {
			$paginationPage = $this->dbc->real_escape_string($_GET['pagination']);
		} else {
			$paginationPage = 1;
		}

		$sql = "SELECT count(id) AS TotalPosts FROM posts";

		$result = $this->dbc->query($sql);

    	$result = $result->fetch_assoc();

    	$totalPosts = $result['TotalPosts'];

    	$totalPages = $totalPosts / 10;

    	$totalPages = ceil($totalPages);

    	$this->data['totalPages'] = $totalPages;

    	$offset = $paginationPage * 10 - 10;

		// Prepare some SQL, this query was really hard to write, it's probably a bit messier than it could have been but it works
		$sql = "SELECT posts.id, posts.user_id, posts.title, posts.content, posts.updated_at, posts.created_at, user.username,
				(SELECT COUNT(comment)
				FROM `comments`
				WHERE comments.post_id = posts.id) as commentCount
				FROM posts JOIN user ON user_id = user.id
				ORDER BY updated_at DESC
				LIMIT 10 OFFSET $offset
				";


		// Run the SQL and capture the result
		$result = $this->dbc->query($sql);

		// Extract the results as an array
		$allData = $result->fetch_all(MYSQLI_ASSOC);
		
		$this->data['allPosts'] = $allData;
	}
}
