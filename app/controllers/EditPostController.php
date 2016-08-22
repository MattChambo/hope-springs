<?php

class EditPostController extends PageController {

	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

		if( isset($_POST['editpost']) ){
			$this->processPostEdit();
		}

		// Get information about the post
		 $this->getPostInfo();

	}

	public function buildHTML() {
		
		echo $this->plates->render('editpost', $this->data);

	}

		private function getPostInfo() {

		// Get the POST ID from the GET array
		$postID = $this->dbc->real_escape_string($_GET['postid']);

		// Get the user ID
		$userID = $_SESSION['id'];

		// Prepare the query
		$sql= "SELECT title, content
				FROM posts
				WHERE id = $postID ";

			if( $_SESSION['privilege'] != 'admin') {

				$sql .= "AND user_id = $userID";
			}

		// Run the query
		$result = $this->dbc->query($sql);

		// If the query failed
		if( !$result || $result->num_rows == 0 ) {
			// Send the user back to the view post page
			// They probably didn't own the post or the post was deleted
			header("Location: index.php?page=viewpost&postid=$postID");
		} else {

			// If the user has submited the form we don't want to lose their changes

			if( isset($_POST['editpost'])) {

				// Use the form data
				$this->data['post'] = $_POST;

				$result = $result->fetch_assoc();
				$this->data['originalTitle'] = $result['title'];

			} else {
				// Use the database data
				$result = $result->fetch_assoc();

				$this->data['post'] = $result;
				
				$this->data['originalTitle'] = $result['title'];

			}	
		}
	}

		private function processPostEdit() {
		// Validation
		$totalErrors = 0;

		$title = $_POST['title'];
		$post = $_POST['content'];

		if( strlen($title) > 80 ){
			$totalErrors++;
			$this->data['titleError'] = 'Your title cannot be more than 80 characters long';
		}

		if( strlen($title) == 0){
			$totalErrors++;
			$this->data['titleError'] = 'You must include a title';
		}

		if( strlen($post) > 10000 ){
			$totalErrors++;
			$this->data['postError'] = 'Your post cannot be more than 10000 characters long';
		}

		if( strlen($post) == 0){
			$totalErrors++;
			$this->data['postError'] = 'You must include a post';
		}

		// If there are no errors
		if( $totalErrors == 0 ) {

			$postID = $this->dbc->real_escape_string($_GET['postid']);

			// Filter the data
			$title = $this->dbc->real_escape_string($title);
			$post = $this->dbc->real_escape_string($post);

			$userId = $_SESSION['id'];

			// Prepare the SQL
			$sql = "UPDATE posts
					SET title = '$title',
					content = '$post'
					WHERE id = $postID ";

				if($_SESSION['privilege'] != 'admin') {
					$sql .= " AND user_id = $userId";
				}

			// Run the query
			$this->dbc->query($sql);

			// Validation
			if( $this->dbc->affected_rows == 0) {
				$this->data['updateMessage'] = 'Nothing changed. there must have been an error';
			} else {

				// Redirect the user to the view post page
				 header("Location: index.php?page=viewpost&postid=$postID");
			}

		}

	}
}
