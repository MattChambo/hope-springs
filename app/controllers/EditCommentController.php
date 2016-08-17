<?php

class EditCommentController extends PageController {

	private $commentMessage;

	public function __construct($dbc) {

		parent::__construct();
		// Save database connection
		$this->dbc = $dbc;

		// Check to see if the user is logged in
		$this->mustBeLoggedIn();

		if( isset($_POST['editcomment']) ){
		$this->processCommentEdit();
		}

		// Get information about the post
		$this->getCommentInfo();


	}

	public function buildHTML() {

		echo $this->plates->render('editcomment', $this->data);
	}

	private function getCommentInfo() {

		// Get the POST ID from the GET array
		$commentID = $this->dbc->real_escape_string($_GET['commentid']);

		// Get the user ID
		$userID = $_SESSION['id'];

		// Prepare the query
		$sql= "SELECT id, comment, post_id
				FROM comments
				WHERE id = $commentID ";

			if( $_SESSION['privilege'] != 'admin') {

				$sql .= "AND user_id = $userID";
			}

		// Run the query
		$result = $this->dbc->query($sql);

		// If the query failed
		if( !$result || $result->num_rows == 0 ) {
			// Send the user back to the home page
			header("Location: index.php?page=home");
		} else {

			// If the user has submitted the form we don't want to lose their changes
			if( isset($_POST['editcomment'])) {
				// Use the form data
				$this->data['post'] = $_POST;

			} else {
				// Use the database data
				$result = $result->fetch_assoc();

				$this->data['post'] = $result;
			}	
		}
	}

	private function processCommentEdit() {

		// Validation
		$totalErrors = 0;

		
		$comment = $_POST['comment'];

		if( strlen($comment) > 10000 ){
			$totalErrors++;
			$this->data['commentError'] = 'Your comment cannot be more than 10000 characters long';
		}

		if( strlen($comment) == 0){
			$totalErrors++;
			$this->data['commentError'] = 'You must include a title';
		}

		// If there are no errors
		if( $totalErrors == 0 ) {

			// Filter the data
			$postID = $this->dbc->real_escape_string($_GET['postid']);

			$commentID = $this->dbc->real_escape_string($_GET['commentid']);

			$comment = $this->dbc->real_escape_string($comment);

			$userId = $_SESSION['id'];

			// Prepare the SQL
			$sql = "UPDATE comments
					SET comment = '$comment'
					WHERE id = $commentID ";

				if($_SESSION['privilege'] != 'admin') {
					$sql .= " AND user_id = $userId";
				}

			$this->dbc->query($sql);

			// Validation
			if( $this->dbc->affected_rows == 0) {
				$this->data['updateMessage'] = 'Nothing changed. there must have been an error';
			} else {

				// Redirect the user to the view post page
				header("Location: index.php?page=viewpost&postid= $postID");
			}

		}

	}

}