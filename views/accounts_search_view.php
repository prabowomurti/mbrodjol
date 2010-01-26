<?php $this->load->view('accounts_view_header');?>
<?php if ($this->uri->segment(2) == "search")://show search page?>
        <?=form_open("accounts/do_search")?>
		Search by <br />
		<?php
		//can search any
		$players[0] = "Any Player";
		?>
		Player <?=form_dropdown('player_id', $players, '0')?><br />
		Account note <?=form_input('account_note')?><br />
		<label><?=form_checkbox('groupByNick', 'yes', false)."Group by player's nick?"?></label><br />
		<?=form_submit('submit', 'Search')?>
		<?=form_close()?>
<?php endif;//search index?>
<?php if ($this->uri->segment(2) == "do_search")://show search result?>
<?php
		$table_template = array (
					'table_open'  => '<table class="widefat" border="1px">',
					'table_close' => '</table>',
					'heading_row_start' => '<thead>',
					'heading_row_end' => '</thead>'
		);
		$this->table->set_template($table_template);
		
		if (!isset($accounts)){
			echo "Empty result";
		}elseif (empty($groupByNick)) {
			
			$this->table->set_heading(array('Edit', 'Delete', 'Time', 'From', 'Amount', 'Note'));

			$total_amount = 0;
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
				//echo total account_amount
				$total_amount += $account_amount[$key];
			}

			echo $this->table->generate();
			echo "Total amount : $total_amount";
		}else {//if user wants to group by nickname
			$this->table->set_heading(array('Nickname', 'Total Amount'));

			$total_amount = 0;
			foreach ($accounts as $key=>$account_id){
				$this->table->add_row(
					$account_nickname[$key],
					$account_total_amount[$key]
				);
				//echo total account_amount
				$total_amount += $account_total_amount[$key];
			}

			echo $this->table->generate();
			echo "Total amount : $total_amount";
		}
?>
<?php endif;//search result?>
    </body>
</html>
