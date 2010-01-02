<html>
	<head>
		<title>Incomes</title>
		<style type="text/css"><?php $this->load->view('styles/general-style.css')?></style>
	</head>
	<body>
		<?=anchor("", "Home")?> | <?=anchor("incomes/add", "Add New Income")?><br />
		<?php
		if (!isset($incomes)){
			echo "Incomes table is empty";
		}else {
			$table_template = array (
				'table_open'  => '<table class="widefat" border="1px" margin="1px">',
				'table_close' => '</table>',
				'heading_row_start' => '<thead>',
				'heading_row_end' => '</thead>'
			);
			$this->table->set_heading(array('Edit', 'Delete', 'Date', 'Source', 'Amount'));
			$this->table->set_template($table_template);

			foreach ($incomes as $key=>$income_id){
				$this->table->add_row(
					anchor("incomes/edit/".$income_id, "Edit"),
					anchor("incomes/delete/".$income_id, "Delete", array('onclick'=>"if ( confirm('Are you sure to delete this?') ) { return true;}return false;")),
					$income_date[$key],
					$source[$key],
					$income_amount[$key]
				);
			}
			echo $this->table->generate();
		}

		?>

	</body>
</html>