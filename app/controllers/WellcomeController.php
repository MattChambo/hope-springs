<?php

class WellcomeController extends PageController {

	public function buildHTML() {

		echo $this->plates->render('wellcome', $this->data);
	}

}
