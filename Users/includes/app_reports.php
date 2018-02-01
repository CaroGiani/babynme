

<?php echo '
<form><p>APPOINTMENT REPORTS</p><table id="mytable" class="table .table-striped">';
					echo '<th>USER ID</th><th>APPOINTMENT DATE </th>';

				foreach($spot_usr AS $res ){
				
					echo
				'<tr><td>'.$res['user_id'].'</td><td>'.$res['date'].'</td></tr>';
				}
		echo '</table></form>';
				
				?>