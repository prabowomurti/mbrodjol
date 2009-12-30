<html>
    <head>
        <title>Show matches</title>
    </head>
    <body>
		<?=anchor ("", "Home")?> | <?=anchor("games", "To Games")?><br />
<?php
foreach ($query_show_all_matches->result() as $row):?>
		<?=anchor("matches/edit/".$row->game_id, "Edit")?>, <?=$row->game_id?>, maen tanggal <?=$row->time?>| di <?=$row->stadium_name?> | lawan <?=$row->team_name?><br />
<?php endforeach;?>
    </body>
</html>