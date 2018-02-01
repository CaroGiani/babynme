<?php
	require_once "to_include.php";
	$ObjUsersProc-> usersignout();
	$ObjUsersProc-> get_diff($MYSQL);
?>
<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" data-target="#side-menu" data-offset="15">
    <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
        <div class="main-wrapper" >
            <div class="main-body">
                <div class="row">
                    <div class="col-sm-4">
                        <p>So glad that you are here <b><?php echo $_SESSION["init_sess"]['u_name']; ?>!</b></p>
                       <!--SIDE AREA-->
                        <div  id="side-menu" >
                          <?php include ("includes/side_menus/side-menu.php"); ?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <div class="col-sm-5" id="land-img">
                       <table class="table">
                            <tr>
                                <td><a href="food.php"><img src="Assets/Images/maxresdefault%20(1).jpg" alt="What you eat?" ></a></td>
                                <td><a href="baby.php"><img src="Assets/Images/maxresdefault.jpg" alt="How your baby is doing?"></a></td>
                           </tr>
                         
                           <tr> 
                                <td><a href="reviews.php"><img src="Assets/Images/Review.jpg" alt="Let us know what your think"></a></td>
                                <td><a href="doc.php"><img src="Assets/Images/Schedule-Your-Appointment-Sidebar.jpg" alt="When is your next appointment?"></a></td>
                           </tr>
                         
                          <tr> 
                               
                                <td><a href="due.php"><img src="Assets/Images/thinglass.jpg" alt="When are you having your baby?"></a></td>
                           </tr>
                        </table>
					
                    </div>
					<div class="col-sm-3">
					<form id="due_date">
					<p> <b><?php echo $_SESSION['due'];?></b></p>
						
					</form>
					</div>
                </div>
            </div>
            
       
    </div>
</body>
<?php
    include ("includes/footer.php")
?>

</html>