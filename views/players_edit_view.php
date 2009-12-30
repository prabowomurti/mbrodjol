<html>
	<head>
		<title>Edit Player</title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
	</head>
	<body>
		<?=anchor("players/", "Back")?><br />
		<?php
		$player_id = $this->uri->segment(3);
		$message = $this->uri->segment(4);?>
		<?=($message == "success")?"Player succesfully edited": ""?>
		<?=form_open("players/do_save");?>
			<?=form_hidden("player_id", $player_id)?>
			<p>Full Name <?=form_input("fullname", $fullname)?></p>
			<p>Nickname <?=form_input("nickname", $nickname)?></p>
			<p>Birthday <?=form_input("birthday", $birthday)?></p>
			<p><input type="submit" name="save" value="Update" /></p>
		<?="</form>"?>
	</body>
</html>