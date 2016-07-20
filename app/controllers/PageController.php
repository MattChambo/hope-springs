<?php 
abstract class PageController {

	protected $title;
	protected $metaDesc;
	protected $dbc;
	protected $plates;
	protected $data = [];

	public function __construct() {

		// Create instance of Plates library
		$this->plates = new League\Plates\Engine('app/templates');

	}

		// Force children classes to have the buildHTML function
		abstract public function buildHTML();

}