<?php
	require_once "to_include.php";
	$ObjUsersProc-> usersignout();
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("header.php"); ?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" style="padding-top:150px;">
    <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
    <div class="main-body">
	  <div class="row">
        <div class="col-sm-4">
                       <!--SIDE AREA-->
		<form method="POST" class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="none"> 
			   <?php include("includes/select_week.php");?>
			   <button type="submit" class="btn btn-danger">SEARCH</button>
		</form>
		</div>
		<div class="col-sm-8">
			<div >
				<?php $ObjUsersProc-> baby_dets($MYSQL);?>
			</div>
		</div>
	</div>
	</div>
</body>
<?php include ("includes/footer.php"); ?>
</html>