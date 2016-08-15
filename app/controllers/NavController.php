<?php

class NavController extends PageController {

	public function __construct($dbc) {

		parent::__construct();
		
		$this->dbc = $dbc;

		$this->getNavLinks();
	}

		public function buildHTML() {
		// Insantiate (create instance of) Plates library
		$plates = new League\Plates\Engine('app/templates');


		$allTitles = $this->getNavLinks();

		$data = [];

		$data['allTitles'] = $allTitles;

		echo $plates->render('home', $data);
	}

		public function getNavLinks() {
		$sql = "SELECT id, title
				FROM posts
				ORDER BY updated_at DESC";

		$result = $this->dbc->query($sql);

		$postTitles = $result->fetch_all(MYSQLI_ASSOC);

		return $postTitles;
	}

}