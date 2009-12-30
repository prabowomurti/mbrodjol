<html>
	<head>
		<title>Add Place</title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
	</head>
	<body>
		<?=anchor("places/", "Back")?><br />
		<?=($message=="success")?"Place saved": ""?>
		<?=($message=="noplace")?"You must add at least one place (e.g: before add a game)": ""?>
		<?=form_open("places/do_save");?>
			<?=form_hidden("place_id", isset($place_id)?$place_id:"")?>
			<p>Stadium Name <?=form_input("stadium_name", (isset($stadium_name)?$stadium_name:""))?></p>
			<?php if ($this->uri->segment(2)=="edit"):?>
			<p><input type="submit" name="save" value="Update" /></p>
			<?php endif;?>
			<?php if ($this->uri->segment(2)=="add"):?>
			<p><input type="submit" value="Save" /></p>
			<?php endif;?>
		<?=form_close()?>
	</body>
</html>