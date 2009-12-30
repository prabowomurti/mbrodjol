<html>
	<head><title>List of Players Who Attend Match <?=$game_id?></title></head>
	<body>
		<p>
			<?=form_open("scorers/update")?>
			<?=form_hidden("game_id", $game_id)?>
			Check players who make score or <?=anchor("matches/edit/".$game_id, "Cancel and back to Edit Match")?><br />
			(or <?=anchor("games/edit/".$game_id, "edit the attendances first")?>)<br />
			<?php
			foreach ($players_played as $player_id=>$player_name):
			?>
			<label><?=form_checkbox("players[]", $player_id, in_array($player_id, $players_scoring));?><?=$player_name?>
			</label><br />
			<?php endforeach;?>
			<?=form_submit("save", "Save Changes");?>
			</form>
		</p>
	</body>
</html>