<?php
class Games extends Controller {

	function Games () {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	function index() {
		$query_get_all_games = $this->db->query("
SELECT games.game_id as game_id, time, stadium_name, COUNT(attendances.player_id) AS attendances
FROM attendances RIGHT OUTER JOIN games
		ON games.game_id = attendances.game_id
	NATURAL JOIN places
GROUP BY game_id, TIME, stadium_name
ORDER BY `time`;
");
		foreach ($query_get_all_games->result() as $rows){
			$data["game_id"][] = $rows->game_id;
			$data["time"][] = $rows->time;
			$data["attendances"][] = $rows->attendances;
			$data["stadium_name"][] = $rows->stadium_name;
		}
		
		$this->load->view('games_view', isset($data)?$data:array());
	}

	function edit() {
		
	    $this->load->view('games_edit_view');
	}

	function update () {
		//update table games
		$data = $_POST;
		$query_update_game = "
UPDATE games SET \n
time = '".$data["time"]."', \n
note = '".$data["note"]."', \n
place_id = ".$data["place_id"]." \n
WHERE game_id = ".$data["game_id"];
		$this->db->query($query_update_game);
		
		//update table attendances
		if (!isset ($data["players"])){
			$this->db->query("
DELETE
FROM attendances
WHERE game_id = ".$data["game_id"]);
			redirect ("games/edit/".$data["game_id"]);
		}else {
			$new_players = $data["players"];
		}
		$old_players = array();
		$inserted_players = array();
		$deleted_players = array();
		
		$query_get_attendances_of_game = $this->db->query("
SELECT player_id
FROM attendances
WHERE game_id = ".$data["game_id"]
		);
		foreach ($query_get_attendances_of_game->result() as $oi){
			$old_players[] = $oi->player_id;
		}

		//new attendances
		$inserted_players = array_diff($new_players, $old_players);
		foreach ($inserted_players as $ip_id){
			$this->db->query("
INSERT INTO attendances
VALUES(".$ip_id.", ".$data["game_id"].");"
			);
		}

		//deleted attendances
		$deleted_players = array_diff($old_players, $new_players);
		foreach ($deleted_players as $dp_id){
			$this->db->query("
DELETE
FROM attendances
WHERE player_id = ".$dp_id.
" AND game_id = ".$data["game_id"].";");
		}

		redirect("games/edit/".$data["game_id"]);
	}

	function add() {
		if ($this->db->query("SELECT player_id FROM players LIMIT 1")->num_rows() <= 0)
			redirect ("players/add/noplayer");
		if ($this->db->query("SELECT place_id FROM places LIMIT 1")->num_rows() == 0)
			redirect ('places/add/noplace');

		$data["message"] = $this->uri->segment(3);
		$query_get_places = $this->db->get("places");
		foreach ($query_get_places->result() as $row){
			$data["places"][$row->place_id] = $row->stadium_name;
		}

		$query_get_players = $this->db->query('
SELECT player_id, nickname
FROM players
ORDER BY nickname'
		);
		foreach ($query_get_players->result() as $row){
			$data["players"][$row->player_id] = $row->nickname;
		}
		
		$this->load->view('games_add_view', $data);
	}

	function do_save() {
		extract($_POST);

		$this->db->query("
INSERT INTO games
VALUES (
'$game_id', '$time', '$game_note','$place_id')
");
		$players = isset($players)?$players:array();
		$last_insert_game_id = $this->db->insert_id();
		foreach ($players as $player_id){
			$this->db->query("
INSERT INTO attendances
VALUES ($player_id, ". $last_insert_game_id.")
");
		}

		
		redirect ("games/add/successfull");
	}

	function delete() {
		$game_id = $this->uri->segment(3);
		$this->db->query("
DELETE FROM games
WHERE game_id = $game_id;
");
		$this->db->query("
DELETE FROM matches
WHERE game_id = $game_id;
");
		$this->db->query("
DELETE FROM attendances
WHERE game_id = $game_id;
");
		$this->db->query("
DELETE FROM scorers
WHERE game_id = $game_id;
");
		redirect("games");
	}

}
?>
