<?php

class NotFoundController extends PageController {

	public function buildHTML() {

		// This is a really boring controller
		echo $this->plates->render('notfound');
	}

}