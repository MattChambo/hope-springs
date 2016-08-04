<?php

class ViewPostController extends PageController {

	private $commentMessage;

	public function __construct($dbc) {

		parent::__construct();
		// Save database connection
		$this->dbc = $dbc;

		// Did the user add a comment?
		if( isset($_POST['new-comment']) ) {
			$this->processNewComment();
		}
	}

	public function buildHTML() {
		
		// Insantiate (create instance of) Plates library
		$plates = new League\Plates\Engine('app/templates');

		$post = $this->getPostData();

		// Prepare a container for data
		$data = [];

		$data['post'] = $post;

		if($this->commentMessage != '') {
			$data['commentMessage'] = $this->commentMessage;
		}


		echo $plates->render('viewpost', $this->data);
	}

	private function getPostData() {
			
		// Filter the ID
		$postID = $this->dbc->real_escape_string( $_GET['postid'] );

		// Get info about this post
		$sql = "SELECT id, title, content, created_at, updated_at, user_id
				FROM posts 
				WHERE id = $postID";

		// Run the SQL
		$result = $this->dbc->query($sql);

		// If the query failed
		if( !$result || $result->num_rows == 0 ) {
		// Redirect user to 404 page
		//header('Location: index.php?page=notfound');
		} else {
		// Yay!
			$this->data['post'] = $result->fetch_assoc();

		}

		// Get all the comments!
		$sql = "SELECT comments.id, user_id, comment, username, updated_at, created_at
				FROM comments
				JOIN user
				ON comments.user_id = user.id
				WHERE post_id = $postID
				ORDER BY created_at ASC
				";

		$result = $this->dbc->query($sql);

		// Extract the data as an associative array

		$this->data['allComments'] = $result->fetch_all(MYSQLI_ASSOC);
	}

	private function processNewComment() {

		// Validate the comment
		$totalErrors = 0;
		// Minimum length
		if(strlen($_POST['comment']) < 3) {
			$this->data['commentMessage'] = 'Your comment must be at least three charcters';
			$totalErrors++;
		}
		// Maximum length (10000)
		if(strlen($_POST['comment']) > 10000) {
			$this->data['commentMessage'] = 'Your comment can not be more than 10,000 characters long';
			$totalErrors++;
		}
		// If passed, add to database
		if( $totalErrors == 0 ) {

			// Filter the comment
			$comment = $this->dbc->real_escape_string($_POST['comment']);

			$userID = $_SESSION['id'];

			$postID = $this->dbc->real_escape_string( $_GET['postid'] );

			// Prepare SQL
			$sql = "INSERT INTO comments (comment, user_id, post_id)
						VALUES ('$comment', $userID, $postID)
						";

			// Run the SQL
			$this->dbc->query($sql);


		}

	}

}