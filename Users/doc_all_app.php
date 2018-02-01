<?php
	require_once "to_include.php";
	$ObjUsersProc-> usersignout();
	$ObjUsersProc-> dlt_app($MYSQL);
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("header.php"); ?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" style="padding-top:200px;">
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
				<div class="col-sm-10">
				<form>ALL YOUR APPOINTMENTS</form>
				
						<p><?php $ObjUsersProc-> all_app($MYSQL);?> </b></p>
					
				</div>
			</div>
		</div>
	
	</div>
	</div>
</body>
<?php include ("includes/footer.php"); ?>
</html>