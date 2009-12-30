<?php
class Places extends Controller {
	function Places () {
		parent::Controller();
	}

	function index() {
		$data = array();
		$query_show_all_places = $this->db->query("
SELECT *
FROM places;
");
		foreach ($query_show_all_places->result() as $place){
			$data["places"][] = $place->place_id;
			$data["stadium_names"][] = $place->stadium_name;
		}
		$this->load->view('places_view', $data);
	}

	function add () {
		$data["message"] = $this->uri->segment(3);
		$this->load->view('places_add_view', $data);
	}

	function delete() {
		$place_id = $this->uri->segment(3);
		$this->db->query("
DELETE FROM places
WHERE place_id = $place_id");
		redirect ("places");
	}

	function edit() {
		$data["place_id"] = $this->uri->segment(3);
		$query_get_place = $this->db->query("
SELECT * FROM places
WHERE place_id = ".$this->uri->segment(3)."
");
		$row = $query_get_place->row();
			$data["player_id"] = $row->place_id;
			$data["stadium_name"] = $row->stadium_name;
		$data["message"] = $this->uri->segment(4);
		$this->load->view('places_add_view', $data);
	}

	function do_save() {
		extract($_POST);
		
		if (!isset($save)){//comes from add new place
			$this->db->insert("places", $_POST);
			redirect("places/add/success");
		}elseif ($save == "Update"){
			$this->db->query("
UPDATE places
SET stadium_name = '$stadium_name'
WHERE place_id = $place_id
");
			redirect("places/edit/$place_id/success");

		}
	}
}

?>