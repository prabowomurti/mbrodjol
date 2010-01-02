<?php
class Opponents extends Controller {
	function Opponents() {
		parent::Controller() ;
		$this->load->helper('url', 'form');

	}

	function index() {
		$data = array();
		$query_get_opponents = $this->db->query("
SELECT *
FROM opponents
");
		foreach ($query_get_opponents->result() as $row) {
			$data["opponents"][] = $row->opponent_id;
			$data["team_name"][] = $row->team_name;
			$data["note"][] = $row->note;
			
		}
		$this->load->view('opponents_view', $data);
	}

	function add() {
		$this->load->view('opponents_add_view');
	}

	function edit() {
		$query_get_opponent = $this->db->query("
SELECT * FROM opponents
WHERE opponent_id = ".$this->uri->segment(3)."
");
		$row = $query_get_opponent->row();
			$data["opponent_id"] = $row->opponent_id;
			$data["team_name"] = $row->team_name;
			$data["note"] = $row->note;

		$this->load->view('opponents_add_view', $data);
	}

	function do_save() {
		extract ($_POST);

		if (!isset($save)){
			$this->db->insert("opponents", $_POST);
			redirect("opponents/add/success");
		}elseif ($save == "Update"){
			$this->db->query("
UPDATE opponents
SET team_name = '$team_name', note = '$note'
WHERE opponent_id = $opponent_id
");
			redirect("opponents/edit/$opponent_id");

		}
	}

	function delete() {
		$opponent_id = $this->uri->segment(3);
		$this->db->query("
DELETE FROM opponents
WHERE opponent_id = $opponent_id");

		redirect("opponents");
	}
}
?>
