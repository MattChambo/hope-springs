<?php

class WellcomeController extends PageController {

	public function buildHTML() {

		// Render the page
		echo $this->plates->render('wellcome', $this->data);
	}

}
