<?php
echo"
	<form  method='GET'>
		<div>
			<h3>$mod</h3>
			<b><p>$sub</p></b>
			<p>$mesg</p>
			<p>POSTED ON $dt</p>

				<input type='hidden' name='d_rev' value='$id'>
				<button  class='btn btn-danger' type='submit'>DELETE REVIEW </button>
		</div
		
	</form>
					";
	?>