<?php
class Accounts extends Controller {
	function Accounts () {
		parent::Controller();
		$this->load->helper('url', 'form');

	}

	function index() {
		
		$this->load->view("accounts_view", $data);
	}

	function apakek1() {
		
	}

	function apakek2() {
		
	}
}
?>