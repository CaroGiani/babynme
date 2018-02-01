<?php echo '
<form method="GET"><table id="mytable" class="table .table-striped">';
					echo '<th>USER ID</th><th>USER TYPE</th><th>AGE </th><th>LAST ACTIVE </th><th>ACTION </th>';

				foreach($spot_usr AS $res ){
					$new_age=$res['age']%"365";
					echo
				'<tr><td>'.$res['user_id'].'</td><td>'.$res['user_type'].'</td><td>'.$new_age.'</td><td>'.$res['date_created'].'</td><td><input type="hidden" name="dlt_user" value='.$res['user_id'].'><button class="btn btn-danger" type="submit">DELETE</button></td></tr>';
				}
		echo '</table></form>';
				
				?>