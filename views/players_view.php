<html>
	<head>
		<title>Players</title>
		<style type="text/css"><?php $this->load->view('styles/general-style.css')?></style>
	</head>
	<body>
		<?=anchor("", "Home")?> | <?=anchor("players/add", "Add New Player")?><br />
		<?php
		if (!isset($players)){
			echo "Players table is empty";
		}else {
			$table_template = array (
				'table_open'  => '<table class="widefat" border="1px" margin="1px">',
				'table_close' => '</table>',
				'heading_row_start' => '<thead>',
				'heading_row_end' => '</thead>'
			);
			$this->table->set_heading(array('Edit', 'Delete', 'Fullname', 'Nickname', 'Birthday'));
			$this->table->set_template($table_template);

			foreach ($players as $key=>$player_id){
				$this->table->add_row(
					anchor("players/edit/".$player_id, "Edit"),
					anchor("players/delete/".$player_id, "Delete", array('onclick'=>"if ( confirm('Are you sure to delete player \'$fullnames[$key]\' ?') ) { return true;}return false;")),
					$fullnames[$key],
					$nicknames[$key],
					$birthdays[$key]
				);
			}
			echo $this->table->generate();
		}

		?>

	</body>
</html>