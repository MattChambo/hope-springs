<?php

class WellcomeController extends PageController {

	// Not sure if I need this for the welcome page which is pretty basic, but the site is working so I didn't want to change it.
	public function __construct($dbc) {

		parent::__construct();

		$this->dbc = $dbc;

	}

	public function buildHTML() {

		echo $this->plates->render('wellcome', $this->data);
	}

}
