<?php
class Accounts extends Controller {
	function Accounts () {
		parent::Controller();
		$this->load->helper('url', 'form');

	}

	function index() {
		$data = array();
		$data["balance"] = $this->db->query("
SELECT SUM(amount) AS balance
FROM accounts")->row()->balance +
		$this->db->query("
SELECT SUM(income_amount) AS balance
FROM incomes;")->row()->balance -
		$this->db->query("
SELECT SUM(outcome_amount) AS balance
FROM outcomes;")->row()->balance;

		$this->load->view("accounts_view", $data);
	}

	function history () {
		$data = array();
		/**
		 * Transactions separated into table accounts, incomes, and outcomes.
		 * Accounts table : money that come from player, so it's called payment
		 * Incomes table : everything that don't come from player, e.g sponsor, merchandise, etc
		 * Outcomes table is used to track where the money gone, e.g buy t-shirt, rent a place, etc
		 * All amount field in the tables (accounts.amount, income_amount, and outcome_amount)
		 * have the same data type, that is bigint(20) unsigned
		 */
		$query_get_all_transactions = $this->db->query("
SELECT
	SUBSTRING(time, 1, 10) AS `date`,
	CONCAT('From ', nickname, accounts.account_note) AS what,
	accounts.amount AS amount
FROM accounts NATURAL JOIN players

UNION

SELECT
	income_date AS `date`,
	source AS what,
	income_amount AS amount
FROM incomes

UNION

SELECT
	outcome_date AS `date`,
	spent_for AS what,
	outcome_amount AS amount
FROM outcomes;
");
		foreach ($query_get_all_transactions->result() as $row){
			$data["transactions"]["date"] = $row->date;
			$data["transactions"]["what"] = $row->what;
			$data["transactions"]["amount"] = $row->amount;
		}

		$this->load->view('accounts_view', $data);
	}

	function payment() {

		$this->load->view('accounts_view', isset($data)?$data: array());
	}

	function income() {
		$this->load->view('accounts_view', isset($data)?$data: array());
	}

	function outcome() {
		$this->load->view('accounts_view', isset($data)?$data: array());
	}
}
?>