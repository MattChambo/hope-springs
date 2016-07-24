<?php 
	
	session_start();

	require 'vendor/autoload.php';
	require 'app/controllers/PageController.php';

	$page = isset($_GET['page']) ? $_GET['page'] : 'home';

	$dbc = new mysqli('localhost', 'root', '', 'hope_springs');

	switch($page) {

		// Home page

		case 'home':
			require 'app/controllers/HomeController.php';
			$controller = new HomeController($dbc);
		break;

		// Login page

		case 'login':
			require 'app/controllers/LoginController.php';
			$controller = new LoginController($dbc);
		break;

		// Sign up page

		case 'signup':
			require 'app/controllers/SignupController.php';
			$controller = new SignupController($dbc);
		break;

		// View post page

		case 'viewpost':
			require 'app/controllers/ViewPostController.php';
			$controller = new ViewPostController($dbc);
		break;

		// Make post page

		case 'makepost':
			require 'app/controllers/MakePostController.php';
			$controller = new MakePostController($dbc);
		break;

		// Edit post page

		case 'editpost':
			require 'app/controllers/EditPostController.php';
			$controller = new EditPostController($dbc);
		break;

		// Edit comment page

		case 'editcomment':
			require 'app/controllers/EditCommentController.php';
			$controller = new EditCommentController($dbc);
		break;

		default:
			require 'app/controllers/NotFoundController.php';
			$controller = new NotFoundController;
		break;

	}

$controller->buildHTML();