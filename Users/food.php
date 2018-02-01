<?php
	require_once "to_include.php";
	$ObjUsersProc-> usersignout();
	$ObjUsersProc-> diet_track($MYSQL);
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
                    <nav class="col-sm-9" >
                 	<form method="POST" enctype="multipart/form-data"> 
						<p><b>ADD MEALS TO TRACK</b></p></br>
						<select name="mel_type" class="form-control">
						<option>WHAT MEAL WAS THIS?</option>
						 <?php 	$ObjUsersProc-> view_meal($MYSQL);?>
						</select>
					<p>
			         <label class="floatLabel">DATE</label>
			         <input  name="dt" class="form-control" type="date" required />
		          </p><p>
			         <label class="floatLabel">Protein</label>
			         <input  name="prot" class="form-control"  type="text" required />
		          </p>
				  <p>  <input name="ml_img" type="file" required />
		          <p>
			         <label class="floatLabel">Vegetable</label>
			         <input name="vg" class="form-control" type="text" required />
		          </p><p>
			         <label class="floatLabel">Carbs</label>
			         <input name="starch" class="form-control" type="text" required />
		          </p>
				  <p>
			         <label  class="floatLabel">Friut</label>
			         <input  name="frt" class="form-control" type="text" required />
		          </p><p>
			         <label class="floatLabel">Drink</label>
			         <input name="drink" class="form-control" type="text" required />
		          </p>
		          <p><?php echo $_SESSION['errors'];?></p>
			 <p>
			         <button type="submit" class="btn btn-danger">ADD </button>
		          </p>
				
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