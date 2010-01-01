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
SELECT * FROM (
	SELECT
		SUBSTRING(time, 1, 10) AS `date`,
		CONCAT('From ', nickname, ', ',accounts.account_note) AS what,
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
	FROM outcomes
) AS transactions
ORDER BY date
");
		foreach ($query_get_all_transactions->result() as $row){
			$data["transactions_date"][] = $row->date;
			$data["transactions_what"][] = $row->what;
			$data["transactions_amount"][] = $row->amount;
		}

		$this->load->view('accounts_view', $data);
	}

	function payment() {
		$query_get_accounts = $this->db->query("
SELECT account_id, nickname, amount, time, account_note
FROM accounts NATURAL JOIN players
ORDER BY time
		");
		foreach ($query_get_accounts->result() as $row){
			$data['accounts'][] = $row->account_id;
			$data['account_nickname'][] = $row->nickname;
			$data['account_amount'][] = $row->amount;
			$data['account_time'][] = $row->time;
			$data['account_note'][] = $row->account_note;
		}
		
		$this->load->view('accounts_view', isset($data)?$data: array());
		
	}

	function add() {
		$query_get_players = $this->db->query("
SELECT player_id, nickname
FROM players
ORDER BY nickname
		");
		//if there is no player yet, force user to add some
		if ($query_get_players->num_rows() == 0)
			redirect ("players/add/noplayer");
		foreach ($query_get_players->result() as $row){
			$data["players"][$row->player_id] = $row->nickname;
		}
		
		$this->load->view('accounts_add_view', $data);
	}

	function delete() {
		$this->db->query("
DELETE FROM accounts
WHERE account_id = ".$this->uri->segment(3)
		);
		redirect ("accounts/payment");
	}

	function edit() {
		if ($this->uri->segment(3) == '')
			redirect("accounts");

		$query_get_account = $this->db->query("
SELECT *
FROM accounts
WHERE account_id = ".$this->uri->segment(3)
		);
		$data = $query_get_account->row_array();

		$query_get_players = $this->db->query("
SELECT player_id, nickname
FROM players
ORDER BY nickname
		");

		foreach ($query_get_players->result() as $row){
			$data["players"][$row->player_id] = $row->nickname;
		}

		$this->load->view('accounts_add_view', $data);
		
	}

	function do_save() {
		extract($_POST);

		if (!isset($save)){
			$this->db->insert("accounts", $_POST);
			redirect("accounts/add/success");
		}elseif ($save == "Update"){
			$this->db->query("
UPDATE accounts
SET player_id = '$player_id', amount = '$amount', time = '$time', account_note = '$account_note'
WHERE account_id = $account_id
");
			redirect("accounts/edit/".$account_id);

		}
	}
}
?>