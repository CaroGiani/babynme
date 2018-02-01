

<?php echo '
<form><table id="mytable" class="table .table-striped">';
					echo '<th>USER ID</th><th>USER TYPE</th><th>AGE </th><th>LAST ACTIVE </th>';

				foreach($spot_usr AS $res ){
					$new_age=round($res['age']/"365");
					echo
				'<tr><td>'.$res['user_id'].'</td><td>'.$res['user_type'].'</td><td>'.$new_age.'</td><td>'.$res['date_created'].'</td></tr>';
				}
		echo '</table></form>';
				
				?>