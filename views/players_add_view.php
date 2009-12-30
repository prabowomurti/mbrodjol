<html>
	<head>
		<title>Add Player</title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
	</head>
	<body>
		<?=anchor("players/", "Back")?><br />
		<?php
		$message = $this->uri->segment(3);?>
		<?=($message=="success")?"New Players succesfully inserted": ""?>
		<?=($message=="noplayer")?"You must add at least one player": ""?>
		<?=form_open("players/do_save");?>
			<?=form_hidden("player_id", "")?>
			<p>Full Name <?=form_input("fullname")?></p>
			<p>Nickname <?=form_input("nickname")?></p>
			<p>Birthday <?=form_input("birthday", "1970-01-01")?></p>
			<p><input type="submit" value="Save" /></p>
		<?="</form>"?>
	</body>
</html>