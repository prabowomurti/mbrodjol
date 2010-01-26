<html>
    <head>
        <title>Show matches</title>
		<style type="text/css"><?php $this->load->view('styles/general-style.css')?></style>
    </head>
    <body>
		<?=anchor ("", "Home")?> | <?=anchor("games", "To Games")?><br />
		<?php
		foreach ($game_ids as $key=>$game_id):?>
		<?=anchor("matches/edit/".$game_id, "Edit")?>,
		<?=anchor("matches/delete/".$game_id, "Delete", array('onclick'=>"if ( confirm('Are you sure to delete this match?') ) { return true;}return false;"))?>,
		play on <?=$time[$key]?> | at <?=$stadium_name[$key]?> | versus <?=$team_name[$key]?> |
		<?=($our_goals[$key]>$their_goals[$key])?("WIN"):($our_goals[$key]<$their_goals[$key]?"LOSE":"DRAW")?>
		<?=$our_goals[$key]."-".$their_goals[$key]?><br />
		<?php endforeach;?>
    </body>
</html>