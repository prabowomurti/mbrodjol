<?php $this->load->view('accounts_view_header');?>
	<?php
	$submenu = $this->uri->segment(2);
	switch ($submenu) {
		case "history":
			$table_template = array (
				'table_open'  => '<table class="widefat" border="1px" margin="1px">',
				'table_close' => '</table>',
				'heading_row_start' => '<thead>',
				'heading_row_end' => '</thead>'
			);
			$this->table->set_heading(array('Date', 'From/To', 'Amount'));
			$this->table->set_template($table_template);
			foreach ($transactions as $key->$value){
				
			}

			break;

		case "payment" :
			echo "payment goes here";
			break;

		case "income" :
			echo "income goes here";
			break;

		case "outcome" :
			echo "outcome goes here";
			break;

		default://shows the balance by default
			echo ($balance>=0?($balance == 0 ? "You have nothing now. But be grateful" :
					"Get rich or die trying bro, you have $$balance :)"):("You owe someone $".abs($balance)). ". Declare bankruptcy?");
			break;
	}
	?>
	</body>
</html>