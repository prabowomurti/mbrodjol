<html>
    <head>
        <title>Show matches</title>
    </head>
    <body>
		<?=anchor ("", "Home")?> | <?=anchor("games", "To Games")?><br />
<?php
foreach ($query_show_all_matches->result() as $row):?>
		<?=anchor("matches/edit/".$row->game_id, "Edit")?>,
		<?=anchor("matches/delete/".$row->game_id, "Delete", array('onclick'=>"if ( confirm('Are you sure to delete this match?') ) { return true;}return false;"))?>,
		<?=$row->game_id?>, play on <?=$row->time?>| at <?=$row->stadium_name?> | versus <?=$row->team_name?><br />
<?php endforeach;?>
    </body>
</html>