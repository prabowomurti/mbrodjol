<html>
	<head>
		<title>Player Pays</title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
	</head>
	<body>
		<?=anchor("accounts/payment", "Back to All Payments")?><br />
		<?php
		$message = $this->uri->segment(3);?>
		<?=($message=="success")?"New payment has succesfully inserted": ""?>
		<?=form_open("accounts/do_save")?>
		<?=form_hidden("account_id", isset($account_id)?$account_id:"")?>
			<p>Player Name <?=form_dropdown('player_id', $players, isset($player_id)?$player_id:'')?></p>
			<p>Amount (in $) <?=form_input("amount", isset($amount)?$amount:"")?></p>
			<p>Time <?=form_input("time", isset($time)?$time:date("Y-m-d 16:30:00"))?></p>
			<p>Note <?=form_textarea(array('name'=>'account_note', 'value'=>isset($account_note)?$account_note:'', 'rows'=>4, 'cols'=>50))?></p>
			<?php if ($this->uri->segment(2)=="edit"):?>
			<p><input type="submit" name="save" value="Update" /></p>
			<?php endif;?>
			<?php if ($this->uri->segment(2)=="add"):?>
			<p><input type="submit" value="Save" /></p>
			<?php endif;?>
		<?=form_close()?>
	</body>
</html>