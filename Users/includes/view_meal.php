<?php echo '
<form  method="GET"><table id="mytable" class="table .table-striped">';
					echo '<th>MEAL ID</th><th>MEAL TIME</th><th>ACTION</th>';

				foreach($spot_meal AS $res ){
					
					echo
				'<tr><td>'.$res['meal_id'].'</td><td>'.$res['meal'].'</td>
				<td>
				<input type="hidden" name="dlt_meal" value='.$res['meal_id'].'>
				<button class="btn btn-danger" type="submit">DELETE</button>
				</td></tr>';
				}
		echo '</table></form>';
				
				?>