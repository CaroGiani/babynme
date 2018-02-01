<?php
	require_once "to_include.php";
	$ObjUsersProc-> usersignout();
	$ObjAdminProc->add_meal_time($MYSQL);
?>
<!DOCTYPE html>
<html lang="en">
<?php include "admin_header.php"; ?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" data-target="#side-menu" data-offset="15">
    <script>
        document.body.style.backgroundImage="url('admin_Assets/Images/newback.jpg')";
    </script>
        <div class="main-wrapper" >
            <div class="main-body">
                <div class="row">
                    <div class="col-sm-3">
                       <!--SIDE AREA-->
                        <div  id="side-menu" >
                          <?php include ("includes/side_menus/admin_meal_side.php"); ?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <nav class="col-sm-9">
                 	<form method="POST" > 
						<b>Enter the meal times  </b></br>
						<input type="text" name="me_typ" class ="form-control" maxlength="20"  required/>
						<p><?php echo $_SESSION['errors'] ?></p>
						<button type="submit"  class="btn btn-danger">ENTER </button>
					</form>
					  
                    </nav>
                </div>
            </div>
            
       
    </div>
</body>
<?php
 include ("includes/footer.php")
?>

</html>