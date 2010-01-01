<?php
class Incomes extends Controller {
	function Incomes() {
		parent::Controller() ;
		$this->load->helper('url', 'form');

	}

	function index() {
		echo "incomes";
	}
}
?>
