<?php
class Players extends Controller {
	function Players() {
		parent::Controller();
		$this->load->helper(array('url', 'form'));
		$this->load->library('table');
	}

	function index() {
		$query_show_all_players = $this->db->query("
SELECT *
FROM players;
");
		foreach ($query_show_all_players->result() as $player){
			$data["players"][] = $player->player_id;
			$data["fullnames"][] = $player->fullname;
			$data["nicknames"][] = $player->nickname;
			$data["birthdays"][] = $player->birthday;
		}
		
		$this->load->view('players_view', isset($data)?$data:array());
	}

	function add() {
		$this->load->view("players_add_view");
	}

	function do_save() {
		extract($_POST);
		
		if (empty($birthday)) $birthday = '1970-01-01';
		if (!isset($save)){
			$this->db->insert("players", $_POST);
			redirect("players/add/success");
		}elseif ($save == "Update"){
			$this->db->query("
UPDATE players
SET fullname = '$fullname', nickname = '$nickname', birthday = '$birthday'
WHERE player_id = $player_id
");
			redirect("players/edit/$player_id/success");

		}
		
	}

	function edit() {
		$query_get_player = $this->db->query("
SELECT * FROM players
WHERE player_id = ".$this->uri->segment(3)."
");
		$row = $query_get_player->row();
			$data["player_id"] = $row->player_id;
			$data["fullname"] = $row->fullname;
			$data["nickname"] = $row->nickname;
			$data["birthday"] = $row->birthday;
		$this->load->view("players_edit_view", $data);
	}

	function delete() {
		$player_id = $this->uri->segment(3);
		$this->db->query("
DELETE FROM players
WHERE player_id = $player_id");

		$this->db->query("
DELETE FROM attendances
WHERE player_id = $player_id");

		$this->db->query("
DELETE FROM scorers
WHERE player_id = $player_id");

		$this->db->query("
DELETE FROM assistants
WHERE player_id = $player_id");

		$this->db->query("
DELETE FROM accounts
WHERE player_id = $player_id");


		redirect ("players");

	}

	function attendances() {
		$query_show_get_players_attendances = $this->db->query("
SELECT nickname, count(game_id) AS times_played
FROM players NATURAL JOIN attendances
GROUP BY nickname
ORDER BY times_played DESC
		");
		foreach ($query_show_get_players_attendances->result() as $row){
			$data["players"][] = $row->nickname;
			$data["times_played"][] = $row->times_played;
		}
		$this->load->view('players_attendances_view', isset($data)?$data:array());

	}

}
?>
