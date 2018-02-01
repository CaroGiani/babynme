<?php 
require_once "to_include.php";
$ObjUsersProc-> usersignout();
$ObjAdminProc-> dlt_mod($MYSQL); 
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "admin_header.php";

?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" data-target="#side-menu" data-offset="15">
    <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
        <div class="main-wrapper" >
            <div class="main-body">
                <div class="row">
                    <div class="col-sm-4">
                       <!--SIDE AREA-->
                        <div  id="side-menu">
                         
                           <?php include ("includes/side_menus/admin_proc_side.php"); ?>
                          ?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <div class="col-sm-8">
					<?php  $ObjAdminProc-> view_mod($MYSQL);?>
								</div>
							</div>
						</div>
				</div>
         
    </div>
</body>
<?php
   // include ("includes/footer.php")
?>

</html>