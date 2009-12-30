<?php
class Scorers extends Controller {
	function Scorers () {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	function index() {
		$data["scorers"] = $this->db->query("
SELECT players.nickname AS nick, SUM(total_goals) AS total_goals
FROM players NATURAL JOIN scorers
GROUP BY nick
ORDER BY total_goals DESC")->result();

		$this->load->view('scorers_view', $data);

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

		$query_players_scoring = $this->db->query("
SELECT player_id
FROM scorers
WHERE game_id = ".$game_id
		);
		$data["players_scoring"] = array();
		foreach ($query_players_scoring->result() as $row){
			$data["players_scoring"][] = $row->player_id;
		}

		$this->load->view("scorers_match_view", $data);
		
	}

	function update() {
		
		extract($_POST);
		
		if (!isset($players)){
			$query_delete_all_scorers = $this->db->query("
DELETE FROM scorers
WHERE game_id = ".$game_id
			);
			redirect ("matches/edit/".$game_id);
		}
		$query_get_players_scored = $this->db->query("
SELECT player_id
FROM scorers
WHERE game_id = ".$game_id."
");
		$players_scored = array();
		foreach ($query_get_players_scored->result() as $row){
			$players_scored[] = $row->player_id;
		}

		//new scorers
		$new_scorers = array_diff($players, $players_scored);
		foreach ($new_scorers as $ip_id){
			$this->db->query("INSERT INTO scorers VALUES(".$ip_id.", ".$game_id.", 0);");
		}

		//deleted scorers
		$deleted_scorers = array_diff($players_scored, $players);
		foreach ($deleted_scorers as $dp_id){
			$this->db->query("DELETE FROM scorers WHERE player_id = ".$dp_id.
				" AND game_id = ".$game_id.";");
		}

		redirect ("matches/edit/".$game_id);

	}
}
?>