<?php
	require_once "to_include.php";
	$ObjUsersProc-> usersignout();
	$ObjUsersProc-> set_app($MYSQL);
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("header.php"); ?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" style="padding-top:150px;">
    <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
	<div class="main-body">
		<div class="forms"> 
			<div class="row">
				<div class="col-sm-2">
               <!--SIDE AREA-->
					<div  id="side-menu" >
						<?php include ("includes/side_menus/doc_side.php");?>
	                </div>
                        <!--END OF SIDE AREA-->  
                    </div>
				<div class="col-sm-5" >
					<form method = "POST" autocomplete="off" >
						<h2>ADD APPOINTMENT</h2>
						<p>
							<label for="Email" class="floatLabel">Doctors Name</label>
							<input  name="d_name" type="text" required />
							<input  value="<?php echo $_SESSION['u_id'];?>" name="user" type="hidden" required />
						</p>
						<p>
							<label for="Email" class="floatLabel">Appointment Date</label>
							<input id="u_name" name="app_date" type="date" required />
						</p>
						<p><?php echo $_SESSION['errors'];?></p>
						<button type="submit" class="btn btn-danger">Create </button>
		          </p>
					</form>
				</div>
				<div class="col-sm-5">
					<form>
						<p><?php $ObjUsersProc-> next_appoint($MYSQL);?> </b></p>
					</form>
			
 </div>
 </div>
    </div>
	
	</div>
	</div>
</body>
<?php include ("includes/footer.php"); ?>
</html>