<?php

class EditCommentController extends PageController {

	private $commentMessage;

	public function __construct($dbc) {

		parent::__construct();
		// Save database connection
		$this->dbc = $dbc;

		$this->mustBeLoggedIn();

		if( isset($_POST['editcomment']) ){
			$this->processCommentEdit();
		}

		// Get information about the post
		$this->getCommentInfo();


	}

	public function buildHTML() {
		// // Insantiate (create instance of) Plates library
		// $plates = new League\Plates\Engine('app/templates');

		// // Prepare a container for data
		// $data = [];

		// if($this->commentMessage != '') {
		// 	$data['commentMessage'] = $this->commentMessage;
		// }

		// echo $plates->render('editcomment', $data);

		echo $this->plates->render('editcomment', $this->data);
	}

	private function getCommentInfo() {

		// Get the POST ID from the GET array
		$commentID = $this->dbc->real_escape_string($_GET['id']);

		// Get the user ID
		$userID = $_SESSION['id'];

		// Prepare the query
		$sql= "SELECT comment
				FROM comments
				WHERE id = $commentID ";

			if( $_SESSION['privilege'] != 'admin') {

				$sql .= "AND user_id = $userID";
			}

		// Run the query
		$result = $this->dbc->query($sql);

		// If the query failed
		if( !$result || $result->num_rows == 0 ) {
			// Send the user back to the post page
			// They probably didn't own the post OR the post was deleted
			header("Location: index.php?page=home");
		} else {

			// WAIT!
			// What if the user has submited the form?
			// We don't want to lose their changes
			if( isset($_POST['editcomment'])) {
				// USE THE FORM DATA!
				$this->data['post'] = $_POST;

			} else {
				// USE the database data
				$result = $result->fetch_assoc();

				$this->data['post'] = $result;

			}	
		}
	}

	private function processCommentEdit() {

		// Validation
		$totalErrors = 0;

		
		$comment = $_POST['comment'];

		// Title
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

			$postID = $this->dbc->real_escape_string($_GET['id']);

			// Filter the data
			$comment = $this->dbc->real_escape_string($comment);

			$userId = $_SESSION['id'];

			// Prepare the SQL
			$sql = "UPDATE comments
					SET comment = '$comment'
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
				header("Location: index.php?page=home");
			}

		}

	}

}