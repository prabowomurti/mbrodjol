<html>
	<head>
		<title>Add Income</title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
	</head>
	<body>
		<?=anchor("incomes/", "To Incomes")?><br />
		<?php $message = $this->uri->segment(3)?>
		<?=($message=="success")?"Income saved": ""?>
		<?=form_open("incomes/do_save");?>
			<?=form_hidden("income_id", isset($income_id)?$income_id:"")?>
			<p>Source <?=form_input("source", (isset($source)?$source:""))?></p>
			<p>Amount (in $) <?=form_input("income_amount", (isset($income_amount)?$income_amount:""))?></p>
			<p>Date <?=form_input("income_date", (isset($income_date)?$income_date:date("Y-m-d")))?></p>
			<?php if ($this->uri->segment(2)=="edit"):?>
			<p><input type="submit" name="save" value="Update" /></p>
			<?php endif;?>
			<?php if ($this->uri->segment(2)=="add"):?>
			<p><input type="submit" value="Save" /></p>
			<?php endif;?>
		<?=form_close()?>
	</body>
</html>