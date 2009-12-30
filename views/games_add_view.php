<html>
	<head>
		<title>Add Game</title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
	</head>
	<body>
		<?=anchor("games/", "Back")?><br />
		<?=!empty($message)?"New Game has succesfully inserted": ""?>

		<?=form_open("games/do_save");?>
			<?=form_hidden("game_id", "")?>
			<p>Time <?=form_input("time", date("Y-m-d 00:00:00") )?></p>
			<p>Note <?=form_textarea(array('cols'=>'30', 'rows'=>'4', 'name'=>'game_note'))?></p>
			<p>Place <?=form_dropdown("place_id", $places) ?></p>

			<p>Attendances<br />
				<?php
				foreach ($players as $player_id=>$player_name):?>
				<label style="cursor:pointer"><?=form_checkbox('players[]', $player_id)?><?=$player_name?></label><br />
				<?php endforeach;?>
			</p>
			<p><input type="submit" value="Save" /></p>
		<?=form_close()?>

	</body>
</html>