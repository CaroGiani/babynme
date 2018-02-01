<?php
	require_once "to_include.php";
	$ObjUsersProc-> usersignout();
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
                          <?php include ("includes/side_menus/admin_side-menu.php"); ?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <nav class="col-sm-9" id="land-img">
                        <div class="left_forms" > 
								 
							 <div class="index_links">
								<ul>
									<i> <p style="text-align:center"><strong>PICK FUNCTION TO EDIT!!</strong></p> </i>
									<li><a href="admin_fet.php">FETAL DEVELOPMENT</a></li>
									<li><a href="admin_reviews.php">REVIEWS</a></li>
									<li><a href="">SYMPTOMS TRACKING</a></li>
									<li><a href="admin_app.php">DOCTORS APPOINTMENT</a></li>
									<li><a href="admin_food_app.php">DIET TRACKING</a></li>
									<li><a href="admin_process.php">MODULES</a></li>
									<li><a href="admin_view_user.php">USERS</a></li>
								
									</li>
								</ul>
								</div>
						
						</div>    
                    </nav>
                </div>
            </div>
            
       
    </div>
</body>
<?php
    include ("includes/footer.php")
?>

</html>