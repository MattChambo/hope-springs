<?php

class EditPostController extends PageController {

	private $titleMessage;
	private $postMessage;

	public function __construct($dbc) {

		parent::__construct();
		// Save database connection
		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

		// Get information about the post
		 $this->getPostInfo();

		if( isset($_POST['editpost']) ){
			$this->processPostEdit();
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

		// echo $plates->render('editpost', $data);

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
			// Send the user back to the post page
			// They probably didn't own the post OR the post was deleted
			header("Location: index.php?page=viewpost&postid=$postID");
		} else {

			// WAIT!
			// What if the user has submited the form?
			// We don't want to lose their changes
			if( isset($_POST['editpost'])) {
				// USE THE FORM DATA!
				$this->data['post'] = $_POST;

				// Use the original title
				$result = $result->fetch_assoc();
				$this->data['originalTitle'] = $result['title'];

			} else {
				// USE the database data
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

		// Title
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

			$postID = $this->dbc->real_escape_string($_GET['id']);

			// Filter the data
			$title = $this->dbc->real_escape_string($title);
			$post = $this->dbc->real_escape_string($post);

			$userId = $_SESSION['id'];

			// Prepare the SQL
			$sql = "UPDATE posts
					SET title = '$title',
					content = '$post',
					WHERE id = $postID ";

				if($_SESSION['privilege'] != 'admin') {
					$sql .= " AND user_id = $userId";
				}

			$this->dbc->query($sql);

			// Validation
			if( $this->dbc->affected_rows == 0) {
				$this->data['updateMessage'] = 'Nothing changed. there must have been an error';
			} else {

				// Redirect the user to the post page
				 header("Location: index.php?page=viewpost&postid=$postID");
			}

		}

	}
}
