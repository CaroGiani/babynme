<?php
	require_once "to_include.php";
	$ObjUsersProc-> usersignout();
	$ObjUsersProc-> dlt_meal($MYSQL);
?>
<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>
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
                          <?php include ("includes/side_menus/food_side.php");?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <nav class="col-sm-9">
                 	
					
						
						<?php $ObjUsersProc-> view_diet($MYSQL);?>

			
                    </nav>
                </div>
            </div>
            
       
    </div>
</body>
<?php
  // include ("includes/footer.php")
?>

</html>