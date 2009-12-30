<html>
	<head>
		<title>Players</title>
		<style type="text/css"><?php $this->load->view('styles/general-style.css')?></style>
	</head>
	<body>
		<?=anchor("", "Home")?> | <?=anchor("places/add", "Add New Place")?><br />
		<?php if (isset($places)){
			$table_template = array (
				'table_open'  => '<table class="widefat" border="1px" margin="1px">',
				'table_close' => '</table>',
				'heading_row_start' => '<thead>',
				'heading_row_end' => '</thead>',

			);
			$this->table->set_heading(array('Edit', 'Delete', 'Stadium Name'));
			$this->table->set_template($table_template);

			foreach ($places as $key=>$place_id){
				$this->table->add_row(
					anchor("places/edit/".$place_id, "Edit"),
					anchor("places/delete/".$place_id, "Delete", array('onclick'=>"
						if ( confirm('Are you sure to delete place \'$stadium_names[$key]\' ?') ) { return true;}return false;")),
					$stadium_names[$key]
				);
			}
			echo $this->table->generate();
		}else {
			echo "Place table is empty";
		}
		?>

	</body>
</html>