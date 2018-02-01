<?php
	require_once "to_include.php";
	$ObjUsersProc-> usersignout();
	//$ObjUsersProc-> diet_track();
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
                          <?php //include ("includes/side_menus/food_side.php");?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <nav class="col-sm-9" id="land-img">
                 	<form method="POST" enctype="mutltipart/form"> 
						<p><b>Enter How Do You Feel</b></p></b>
						   <p>
			         <label for="Email" class="floatLabel">Symptom 1</label>
			         <input id="Email" name="email" type="text" required />
		          </p>
		          <p>
			         <label for="Email" class="floatLabel">Symptom 2</label>
			         <input id="u_name" name="u_name" type="text" required />
		          </p>
		          <p>
			 <p>
			         <button type="submit" class="btn btn-danger" >SEND </button>
		          </p>
				
					</form>
					<form>
					<p>POSSIBLE ILLNESS AND VERDICT</p>
					<?php ?>
					
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