<html>
	<head>
		<title>List All Games</title>
		<style type="text/css"><?php $this->load->view("styles/general-style.css")?></style>
	</head>
	<body>
	<?=anchor("", "Home")?> | <?=anchor("games/add", "Add New Game")?><br />
	<?php
	if (isset($game_id)){
		
		$table_template = array (
				'table_open'  => '<table class="widefat" border="1px" margin="1px">',
				'table_close' => '</table>',
				'heading_row_start' => '<thead>',
				'heading_row_end' => '</thead>',

			);
			$this->table->set_heading(array('Edit', 'Delete', 'When', 'At', 'Attendances'));
			$this->table->set_template($table_template);

			foreach ($game_id as $key=>$g_id){
				$this->table->add_row(
					anchor("games/edit/".$g_id, "Edit"),
					anchor("games/delete/".$g_id, "Delete", array('onclick'=>"
						if ( confirm('Are you sure to delete game \'$g_id\' ? All associated data (attendances, scorers, matches) will be LOST!') ) { return true;}return false;")),
					$time[$key],
					$stadium_name[$key],
					($attendances[$key]>0?($attendances[$key]>1?$attendances[$key]." people":"Only 1 person"):"nobody")
				);
			}
			echo $this->table->generate();
	}else { ?>
		Games table is empty
	<?php }?>
	</body>
</html>