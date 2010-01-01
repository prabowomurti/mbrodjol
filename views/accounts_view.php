<?php $this->load->view('accounts_view_header');?>
	<?php
	$submenu = $this->uri->segment(2);
	$table_template = array (
					'table_open'  => '<table class="widefat" border="1px" margin="1px">',
					'table_close' => '</table>',
					'heading_row_start' => '<thead>',
					'heading_row_end' => '</thead>'
				);
	$this->table->set_template($table_template);

	switch ($submenu) {
		case "history":
//			print_r($transactions);
//			exit();
			if (!isset($transactions_date)){
				echo "Tables are empty";
			}else {
				$this->table->set_heading(array('Date', 'From/To', 'Amount'));
							
				foreach ($transactions_date as $key=>$value){
					$this->table->add_row(
						$value,
						$transactions_what[$key],
						$transactions_amount[$key]
					);
				}

				echo $this->table->generate();
			}
			
			break;

		case "payment" :
			if (!isset($accounts)){
				echo "Table accounts is empty";
			}else {
				$this->table->set_heading(array('Edit', 'Delete', 'Time', 'From', 'Amount', 'Note'));
				foreach ($accounts as $key=>$account_id){
					$this->table->add_row(
						anchor("accounts/edit/".$account_id, "Edit"),
						anchor("accounts/delete/".$account_id, "Delete", array('onclick'=>"
							if ( confirm('Are you sure to delete this account ?') ) { return true;}return false;")),
						$account_time[$key],
						$account_nickname[$key],
						$account_amount[$key],
						$account_note[$key]
					);
				}

				echo $this->table->generate();
			}
			break;

		default://shows the balance by default
			echo ($balance>=0?($balance == 0 ? "You have nothing now. But be grateful" :
					"Get rich or die trying bro, you have $$balance :)"):("You owe someone $".abs($balance)). ". Declare bankruptcy?");
			break;
	}
	?>
	</body>
</html>