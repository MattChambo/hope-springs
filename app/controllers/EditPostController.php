<?php

class EditPostController extends PageController {

	private $titleMessage;
	private $postMessage;

	public function __construct($dbc) {

		parent::__construct();
		// Save database connection
		$this->dbc = $dbc;


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
		$postID = $this->dbc->real_escape_string($_GET['id']);

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
}
