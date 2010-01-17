<html>
    <head>
        <title>Edit Macth <?=(($this->uri->segment(3)))?$this->uri->segment(3):""?></title>
		<style type="text/css"><?php $this->load->view('styles/general-style.css')?></style>
    </head>
    <body>
		<?=anchor("matches/", "Back to Matches");?>, <?=anchor("games/", "Back to Games");?><br />
<?=form_open("matches/update")?>
<?=form_hidden("game_id", $this->uri->segment(3))?>
<?php
	foreach ($query2->result() as $rows2){
		$opponents[$rows2->opponent_id] = $rows2->team_name;
	}
foreach ($query1->result() as $rows1):
?>
	Versus : <?=form_dropdown('opponent_id', $opponents, $rows1->opponent_id)?><br />
	Scorers : <br /><?php
	$total_goals_made_by_players = 0;
	foreach ($query3->result() as $rows3){
		echo $rows3->nick." : ";
		echo form_input("players[".$rows3->player_id."]", $rows3->total_goals);
		$total_goals_made_by_players += $rows3->total_goals;
		echo "<br />";
	}
	//in case there is an own goal
	echo "Own goal(s) : ".form_input("own_goal", $rows1->our_goals-$total_goals_made_by_players);
	echo "<br />";
	echo anchor("scorers/match/".$this->uri->segment(3), "Edit scorers in this game");
?><br />
	Our goals : <?=$rows1->our_goals?><br />
	Opponent's goals : <?=form_input("their_goals", $rows1->their_goals)?><br />
	Notes<br />
	<?=form_textarea("game_note", $rows1->game_note)?><br />
<?=form_submit("save", "Save Changes")?>
<?php endforeach;?>
<?="</form>"?>
    </body>
</html>


