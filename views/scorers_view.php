<html>
	<head><title>Scorers</title>
		<style type="text/css"><?php $this->load->view('styles/general-style.css')?></style>
	</head>
	<body>
		<?=anchor("", "Home");?> | <?=anchor("players", "To Players")?><br />
		<strong>List of scorers</strong><br />
		<?php
		if (empty($sorers)){
			echo "No scorer yet. Just make goals first :)";
		}else {
			foreach ($scorers as $scorer):?>
		<?=$scorer->nick?> : <?=$scorer->total_goals?> <?=($scorer->total_goals>1?"goals":"goal")?><br />
		<?php endforeach;?>
		<?php }?>
		
	
	</body>
</html>