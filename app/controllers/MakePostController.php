<?php

class MakePostController extends PageController {

	private $titleMessage;
	private $postMessage;

	public function __construct($dbc) {

		parent::__construct();
		
		// Save database connection
		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

		// Did the user submit the new post form?
		if( isset($_POST['postsubmit']) ) {
			$this->processNewPost();
		}

	}

	public function buildHTML() {
		// // Insantiate (create instance of) Plates library
		// $plates = new League\Plates\Engine('app/templates');

		// // Prepare a container for data
		// $data = [];

		// if($this->titleMessage != '') {
		// 	$data['titleMessage'] = $this->titleMessage;
		// }

		// if($this->postMessage != '') {
		// 	$data['postMessage'] = $this->postMessage;
		// }

		echo $this->plates->render('makepost', $this->data);
	}

	private function processNewPost() {

		$totalErrors = 0;

		$title = trim($_POST['title']);
		$post = trim($_POST['post']);

		// Title
		if( strlen( $title ) == 0 ) {
			$this->data['titleMessage'] = 'A post title is required';
			$totalErrors++;
		} elseif( strlen( $title ) > 80 ) {
			$this->data['titleMessage'] = 'Your title cannot be longer than eighty characters';
			$totalErrors++;
		}

		// Post
		if( strlen( $post ) == 0 ) {
			$this->data['postMessage'] = 'You must write something!';
			$totalErrors++;
		} elseif( strlen( $post ) > 10000 ) {
			$this->data['postMessage'] = 'Your post cant be more than 10000 characters long';
			$totalErrors++;
		}

		if($totalErrors == 0) {


			// Filter the data
			$title = $this->dbc->real_escape_string($title);
			$post = $this->dbc->real_escape_string($post);

			// Get the ID of the logged in user
			$userID = $_SESSION['id'];

			// SQL (INSERT)
			$sql = "INSERT INTO posts (title, content, user_id) 
					VALUES ('$title', '$post', $userID) ";

			$this->dbc->query( $sql );

			// Make sure it worked
			if ( $this->dbc->affected_rows ) {
				// echo 'The ID is: '.$this->insert_id;
				$postID = $this->dbc->insert_id;
				header('Location: index.php?page=viewpost&postid='.$postID);
			} 


		}

	}


}