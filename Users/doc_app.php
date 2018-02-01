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
				<div class="col-sm-3">
               <!--SIDE AREA-->
					<div  id="side-menu">
						<?php include ("includes/side_menus/doc_side.php");?>
	                </div>
                        <!--END OF SIDE AREA-->  
                    </div>
				<div class="col-sm-9">
				<form ><b><p>UPCOMING APPOINTMENTS</p></b></form>
				
					<?php $ObjUsersProc-> com_app($MYSQL);?>
				
				</div>
			
 </div>
    </div>
	
	</div>
	</div>
</body>
<?php include ("includes/footer.php"); ?>
</html>