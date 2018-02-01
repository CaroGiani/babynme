<?php echo"
<div id='single_week'>
							<form>
								<h3>".$_SESSION['m_nm']."</h3>
								<a href='".$_SESSION['link']."'>
								<img src='http://localhost/babynme/Users/Assets/Images/modules_img/$img' width='180' height='180'/>
								</a>
								<form method='GET'>
								<input type='hidden' name='dlt_md' value=".$_SESSION['m_id'].">
								<button class='btn btn-danger'>DELETE</button>
								</form>
								</form>
						
						</div>";
						?>