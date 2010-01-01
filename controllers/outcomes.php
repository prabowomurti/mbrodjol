<?php
class Outcomes extends Controller {
	function Outcomes() {
		parent::Controller() ;
		$this->load->helper('url', 'form');

	}

	function index() {
		echo "outcomes";
	}
}
?>
