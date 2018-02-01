<?php echo"
			<form method='GET'>	<p><b>VIEW WHAT YOU HAVE BEEN EATING</b></p>
				<h3><b>Date:".$res['date']."</b></h3>
				<p>What you ate:".$res['proteins'].", ".$res['vegetable'].", ".$res['starch'].". </p>
				<p>What you drank:".$res['drink']."</p>
		<img src='http://localhost/babynme/Users/Assets/Images/meals/$img' width='180' height='180'/>
				<input type='hidden' value=".$res['meal_id']." name='dlt_diet'>
				<button type='submit' class='btn btn-danger'>DELETE</button>
	
			</form>
			";?>