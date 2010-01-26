<?php

class Assistants extends Controller{
	function Assistants () {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	function index() {
		$data["assistants"] = $this->db->query("
SELECT players.nickname AS nick, SUM(total_assists) AS total_assists
FROM players NATURAL JOIN assistants
GROUP BY nick
ORDER BY total_assists DESC")->result();

		$this->load->view('assistants_view', $data);

	}

	function match() {
		$data["game_id"] = $this->uri->segment(3);
		$game_id = $data["game_id"];

		$query_attendances_in_game = $this->db->query("
SELECT player_id, nickname
FROM attendances NATURAL JOIN players
WHERE game_id = ".$game_id);
		$data["players_played"] = array();
		foreach ($query_attendances_in_game->result() as $row){
			$data["players_played"][$row->player_id] = $row->nickname;
			//$data["players_name"][] = $row->nickname;
		}

		$query_players_assist = $this->db->query("
SELECT player_id
FROM assistants
WHERE game_id = ".$game_id
		);
		$data["players_assists"] = array();
		foreach ($query_players_assist->result() as $row){
			$data["players_assists"][] = $row->player_id;
		}

		$this->load->view("assistants_match_view", $data);

	}

	function update() {
		extract($_POST);

		if (!isset($players)){
			$query_delete_all_assistants = $this->db->query("
DELETE FROM assistants
WHERE game_id = ".$game_id
			);
			redirect ("matches/edit/".$game_id);
		}
		$query_get_players_assisted = $this->db->query("
SELECT player_id
FROM assistants
WHERE game_id = ".$game_id."
");
		$players_assisted = array();
		foreach ($query_get_players_assisted->result() as $row){
			$players_assisted[] = $row->player_id;
		}

		//new assistants
		$new_assistants = array_diff($players, $players_assisted);
		foreach ($new_assistants as $ip_id){
			$this->db->query("INSERT INTO assistants VALUES(".$ip_id.", ".$game_id.", 0);");
		}

		//deleted assistants
		$deleted_assistants = array_diff($players_assisted, $players);
		foreach ($deleted_assistants as $dp_id){
			$this->db->query("DELETE FROM assistants WHERE player_id = ".$dp_id.
				" AND game_id = ".$game_id.";");
		}

		redirect ("matches/edit/".$game_id);
	}
}
?>
