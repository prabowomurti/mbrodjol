<?php
class Incomes extends Controller {
	function Incomes() {
		parent::Controller() ;
		$this->load->helper('url', 'form');

	}

	function index() {
		$data = array();
		$query_get_incomes = $this->db->query("
SELECT *
FROM incomes
ORDER BY income_date
");
		foreach ($query_get_incomes->result() as $row) {
			$data["incomes"][] = $row->income_id;
			$data["source"][] = $row->source;
			$data["income_amount"][] = $row->income_amount;
			$data["income_date"][] = $row->income_date;
		}
		$this->load->view('incomes_view', $data);
	}

	function add() {
		$this->load->view('incomes_add_view');
	}

	function edit() {
		$query_get_income = $this->db->query("
SELECT * FROM incomes
WHERE income_id = ".$this->uri->segment(3)."
");
		$row = $query_get_income->row();
			$data["income_id"] = $row->income_id;
			$data["source"] = $row->source;
			$data["income_amount"] = $row->income_amount;
			$data["income_date"] = $row->income_date;

		$this->load->view('incomes_add_view', $data);
	}

	function do_save() {
		extract ($_POST);

		if (!isset($save)){
			$this->db->insert("incomes", $_POST);
			redirect("incomes/add/success");
		}elseif ($save == "Update"){
			$this->db->query("
UPDATE incomes
SET source = '$source', income_amount = '$income_amount', income_date = '$income_date'
WHERE income_id = $income_id
");
			redirect("incomes/edit/$income_id");

		}
	}

	function delete() {
		$income_id = $this->uri->segment(3);
		$this->db->query("
DELETE FROM incomes
WHERE income_id = $income_id");

		redirect("incomes");
	}
}
?>
