<html>
	<head>
		<title>Outcomes</title>
		<style type="text/css"><?php $this->load->view('styles/general-style.css')?></style>
	</head>
	<body>
		<?=anchor("", "Home")?> | <?=anchor("outcomes/add", "Add New Outcome")?><br />
		<?php
		if (!isset($outcomes)){
			echo "Outcomes table is empty";
		}else {
			$table_template = array (
				'table_open'  => '<table class="widefat" border="1px" margin="1px">',
				'table_close' => '</table>',
				'heading_row_start' => '<thead>',
				'heading_row_end' => '</thead>'
			);
			$this->table->set_heading(array('Edit', 'Delete', 'Date', 'Spent For', 'Amount'));
			$this->table->set_template($table_template);

			foreach ($outcomes as $key=>$outcome_id){
				$this->table->add_row(
					anchor("outcomes/edit/".$outcome_id, "Edit"),
					anchor("outcomes/delete/".$outcome_id, "Delete", array('onclick'=>"if ( confirm('Are you sure to delete this?') ) { return true;}return false;")),
					$outcome_date[$key],
					$spent_for[$key],
					$outcome_amount[$key]
				);
			}
			echo $this->table->generate();
		}

		?>

	</body>
</html>