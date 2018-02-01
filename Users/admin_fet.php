<?php
	require_once "to_include.php";
	$ObjAdminProc-> add_fetal_dev($MYSQL);
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
                          <?php include ("includes/side_menus/fet_dev_side.php"); ?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <nav class="col-sm-9" id="land-img">
        <div >
            <form method = "POST" autocomplete="off" enctype="multipart/form-data">
                <h2>ADD WEEKLY FETAL DEVELOPMENT</h2>
		          <p>
			         <?php include("includes/select_week.php");?>
		          </p>
		          <p>
			         <input id="f_img" name="f_img" type="file" required />
		          </p>
		          <p>
			         <label for="f_descr" class="floatLabel">Fetal Description</label>
			         <input id="f_descr" name="f_descr" type="text" required />
		          </p>
		       <p><?php echo $_SESSION['errors']?></p>
		          <p>
			         <button type="submit" name = "fet_prog" class="btn btn-danger" id="submit">ADD FETALS PROGRESS</button>
		          </p>
            </form>
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