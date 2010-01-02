<?php
class Outcomes extends Controller {
	function Outcomes() {
		parent::Controller() ;
		$this->load->helper('url', 'form');

	}

	function index() {
		$data = array();
		$query_get_outcomes = $this->db->query("
SELECT *
FROM outcomes
ORDER BY outcome_date
");
		foreach ($query_get_outcomes->result() as $row) {
			$data["outcomes"][] = $row->outcome_id;
			$data["spent_for"][] = $row->spent_for;
			$data["outcome_amount"][] = $row->outcome_amount;
			$data["outcome_date"][] = $row->outcome_date;
		}
		$this->load->view('outcomes_view', $data);
	}

	function add() {
		$this->load->view('outcomes_add_view');
	}

	function edit() {
		$query_get_outcome = $this->db->query("
SELECT * FROM outcomes
WHERE outcome_id = ".$this->uri->segment(3)."
");
		$row = $query_get_outcome->row();
			$data["outcome_id"] = $row->outcome_id;
			$data["spent_for"] = $row->spent_for;
			$data["outcome_amount"] = $row->outcome_amount;
			$data["outcome_date"] = $row->outcome_date;

		$this->load->view('outcomes_add_view', $data);
	}

	function do_save() {
		extract ($_POST);

		if (!isset($save)){
			$this->db->insert("outcomes", $_POST);
			redirect("outcomes/add/success");
		}elseif ($save == "Update"){
			$this->db->query("
UPDATE outcomes
SET spent_for = '$spent_for', outcome_amount = '$outcome_amount', outcome_date = '$outcome_date'
WHERE outcome_id = $outcome_id
");
			redirect("outcomes/edit/$outcome_id");

		}
	}

	function delete() {
		$outcome_id = $this->uri->segment(3);
		$this->db->query("
DELETE FROM outcomes
WHERE outcome_id = $outcome_id");

		redirect("outcomes");
	}
}
?>
