<html>
	<head>
		<title>Add Opponent</title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
	</head>
	<body>
		<?=anchor("opponents/", "To Opponents")?><br />
		<?php $message = $this->uri->segment(3)?>
		<?=($message=="success")?"Opponent saved": ""?>
		<?=($message=="noopponent")?"You must add at least one opponent (e.g before add a match)": ""?>
		<?=form_open("opponents/do_save");?>
			<?=form_hidden("opponent_id", isset($opponent_id)?$opponent_id:"")?>
			<p>Team Name <?=form_input("team_name", (isset($team_name)?$team_name:""))?></p>
			<p>Note <?=form_input("note", (isset($note)?$note:""))?></p>
			<?php if ($this->uri->segment(2)=="edit"):?>
			<p><input type="submit" name="save" value="Update" /></p>
			<?php endif;?>
			<?php if ($this->uri->segment(2)=="add"):?>
			<p><input type="submit" value="Save" /></p>
			<?php endif;?>
		<?=form_close()?>
	</body>
</html>