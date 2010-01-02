<html>
	<head>
		<title>Add Outcome</title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
	</head>
	<body>
		<?=anchor("outcomes/", "To Outcomes")?><br />
		<?php $message = $this->uri->segment(3)?>
		<?=($message=="success")?"Outcome saved": ""?>
		<?=form_open("outcomes/do_save");?>
			<?=form_hidden("outcome_id", isset($outcome_id)?$outcome_id:"")?>
			<p>Spent For <?=form_input("spent_for", (isset($spent_for)?$spent_for:""))?></p>
			<p>Amount (in $) <?=form_input("outcome_amount", (isset($outcome_amount)?$outcome_amount:""))?></p>
			<p>Date <?=form_input("outcome_date", (isset($outcome_date)?$outcome_date:date("Y-m-d")))?></p>
			<?php if ($this->uri->segment(2)=="edit"):?>
			<p><input type="submit" name="save" value="Update" /></p>
			<?php endif;?>
			<?php if ($this->uri->segment(2)=="add"):?>
			<p><input type="submit" value="Save" /></p>
			<?php endif;?>
		<?=form_close()?>
	</body>
</html>