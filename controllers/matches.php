<?php
class Matches extends Controller {

	function Matches () {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('form');
	}

	function index() {
		$query_get_all_matches = $this->db->query("
SELECT game_id, `time`, stadium_name, team_name, our_goals, their_goals
FROM (games NATURAL JOIN matches NATURAL JOIN places) LEFT JOIN opponents
	ON matches.opponent_id = opponents.opponent_id
ORDER BY `time`"
		);

		foreach ($query_get_all_matches->result() as $row){
			$data["game_ids"][] = $row->game_id;
			$data["time"][] = $row->time;
			$data["stadium_name"][] = $row->stadium_name;
			$data["team_name"][] = $row->team_name;
			$data["our_goals"][] = $row->our_goals;
			$data["their_goals"][] = $row->their_goals;
		}

		$this->load->view('matches_view', $data);
	}

	function edit() {

		//you can not add match without an opponent
		$data["query2"] = $this->db->get("opponents");
		if ($this->db->get("opponents")->num_rows() == 0)
			redirect ("opponents/add/noopponent");

		$game_id = $this->uri->segment(3);
		if (empty($game_id)){
			redirect ("matches");
		}
		$sql_all = "
SELECT game_id, opponent_id, game_note, our_goals, their_goals
FROM games NATURAL JOIN matches NATURAL JOIN places
WHERE game_id = ".$game_id;

		//add a match if it doesn't exist
		if ($this->db->query($sql_all)->num_rows() == 0)
			$this->db->query("INSERT INTO matches(game_id) VALUES ($game_id)");

		//what the fuck, this code is a mesh... Going to sleep!
		$data["query1"] = $this->db->query($sql_all);

		

		$sql_scorers = "
SELECT players.player_id as player_id, players.nickname AS nick, total_goals
FROM players NATURAL JOIN scorers
WHERE game_id = ".$game_id;
		$data["query3"] = $this->db->query($sql_scorers);

		$sql_assistants = "
SELECT players.player_id as player_id, players.nickname AS nick, total_assists
FROM players NATURAL JOIN assistants
WHERE game_id = ".$game_id;
		$data["query4"] = $this->db->query($sql_assistants);

	    $this->load->view('matches_edit_view', $data);
	}

	function update () {
		
		extract($_POST);
		//impossible: total_assists > total_goals
		settype($assistants, 'array');
		settype($scorers, 'array');
		if (array_sum($assistants) > array_sum($scorers)){
			echo "Total assists is more than total goals. ";
			echo anchor('matches/edit/'.$game_id, 'Back');
			exit();
		}
		
		/**
		 * UPDATE table scorers
		 */
		$our_goals = 0;
		if (isset($scorers)){
			foreach ($scorers as $player_id=>$goals){
				$this->db->query("
UPDATE scorers SET
total_goals = ".(isset($goals)?$goals:"0")."
WHERE player_id = ".$player_id."
AND game_id = ".$game_id."
");
				$our_goals += $goals;
			}
		}

		//in case there is an own goal
		$our_goals += (!empty($own_goal)?$own_goal:0);

		/**
		 * UPDATE table assistats
		 */
		if (isset($assistants)){
			foreach ($assistants as $player_id=>$total_assists){
				$this->db->query("
UPDATE assistants SET
total_assists = ".(isset($total_assists)?$total_assists:"0")."
WHERE player_id = ".$player_id."
AND game_id = ".$game_id.";
				");
			}
		}
		
		/**
		 * UPDATE table matches
		 */
		$sql_update_matches = "
UPDATE matches SET
opponent_id = ".$opponent_id.",
our_goals = ".(isset($our_goals)?$our_goals:"0").",
their_goals = ".(!empty($their_goals)?$their_goals:"0").",
game_note = '".$game_note."'
WHERE game_id = ".$game_id."
";
		$this->db->query($sql_update_matches);
		redirect ("matches/edit/".$game_id."/updated");
	}

	function delete() {
		$match_id = $this->uri->segment(3);
		$this->db->query("
DELETE FROM matches
WHERE game_id = $match_id
		");

		//there is no match, there is no scorer
		$this->db->query("
DELETE FROM scorers
WHERE game_id = $match_id
		");

		redirect ("matches");
	}


}
?>
