<html>
	<head>
		<title>Opponents</title>
		<style type="text/css"><?php $this->load->view('styles/general-style.css')?></style>
	</head>
	<body>
		<?=anchor("", "Home")?> | <?=anchor("opponents/add", "Add New Opponent")?><br />
		<?php
		if (!isset($opponents)){
			echo "Opponents table is empty";
		}else {
			$table_template = array (
				'table_open'  => '<table class="widefat" border="1px" margin="1px">',
				'table_close' => '</table>',
				'heading_row_start' => '<thead>',
				'heading_row_end' => '</thead>'
			);
			$this->table->set_heading(array('Edit', 'Delete', 'Team Name', 'Note'));
			$this->table->set_template($table_template);

			foreach ($opponents as $key=>$opponent_id){
				$this->table->add_row(
					anchor("opponents/edit/".$opponent_id, "Edit"),
					anchor("opponents/delete/".$opponent_id, "Delete", array('onclick'=>"if ( confirm('Are you sure to delete this opponent?') ) { return true;}return false;")),
					$team_name[$key],
					$note[$key]
				);
			}
			echo $this->table->generate();
		}

		?>

	</body>
</html>