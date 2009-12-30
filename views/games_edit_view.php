<html>
    <head>
        <title>Edit Game <?=$this->uri->segment(3)?></title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
    </head>
    <body>
		<p><?=anchor("games", "Back to Games")?></p>
<?php
echo form_open('games/update');
$game_id = $this->uri->segment(3);
echo form_hidden('game_id', $game_id);
$query1 = $this->db->query("SELECT * FROM games WHERE game_id = ".$game_id);

foreach ($query1->result() as $row1) : ?>
	<p>Game ID : <?=$game_id;?></p>
	<p>Time : <?=form_input('time', $row1->time);?></p>
	<p>Note : <br /><?=form_textarea(array('name'=>'note', 'value'=>$row1->note, 'rows'=>4, 'cols'=>50))?></p>
<?php $query3 = $this->db->get('places');

foreach ($query3->result() as $row3){
	$stadium[$row3->place_id] = $row3->stadium_name;
}
?>
	<p>Place <?=form_dropdown('place_id', $stadium, $row1->place_id)?></p>

<?php
$query4 = $this->db->query("SELECT player_id, nickname FROM players ORDER BY nickname;");
foreach ($query4->result() as $row4){
	$players_data[$row4->player_id] = $row4->nickname;
}

	$query2 = $this->db->query("SELECT player_id
							FROM attendances WHERE game_id = ".$game_id);
	$players_played = array();
	foreach ($query2->result() as $row2){
		$players_played[] = $row2->player_id;
	}
	echo "Players<br />";
	foreach ($players_data as $player_id=>$player_name){
		echo "<label>";
		echo form_checkbox("players[]", $player_id, in_array($player_id, $players_played));
		echo $player_name;
		echo "</label><br />\n";
	}

	echo form_submit("save", "Save Changes");

?>
	
	<p><?=anchor("matches/edit/".$game_id, "Edit this game as a match")?></p>
<?php
endforeach;//query1
echo "</form>";
?>
    </body>
</html>