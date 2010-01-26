<html>
	<head><title>Assistants</title>
		<style type="text/css"><?php $this->load->view('styles/general-style.css')?></style>
	</head>
	<body>
		<?=anchor("", "Home");?> | <?=anchor("players", "To Players")?><br />
		<strong>List of assistants</strong><br />
		<?php
		if (empty($assistants)){
			echo "No assistants yet.. Pass more accurately";
		}else {
			foreach ($assistants as $assistant):?>
		<?=$assistant->nick?> : <?=$assistant->total_assists?> <?=($assistant->total_assists>1?"assists":"assist")?><br />
		<?php endforeach;?>
		<?php }?>

	</body>
</html>