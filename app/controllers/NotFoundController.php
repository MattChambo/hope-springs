<?php

class NotFoundController extends PageController {

	public function buildHTML() {

		// This is a really boring controller it just renders the page
		echo $this->plates->render('notfound');
	}

}