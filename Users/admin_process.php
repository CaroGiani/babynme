<?php
	require_once "to_include.php";
	//$ObjUsersProc->  usersignup($MYSQL);
	$ObjAdminProc-> add_mod($MYSQL);
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
                          <?php include ("includes/side_menus/admin_proc_side.php"); ?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <nav class="col-sm-9" id="land-img">
                        <div class="left_forms" > 
            <form method="POST" enctype="multipart/form-data">
                <h2>Add Modules</h2> 
		          <p>
			         <label for="m_name" class="floatLabel">Module Name</label>
			         <input  name="m_name" type="text" maxlength="20" required/>
		          </p>
		          <p>
			         <label for="m_url" class="floatLabel">url</label>
			         <input  name="m_url" type="text"  maxlength="10" required/>
			         <span>Should be the file name</span>
		          </p>
		          <p>
			         <input  name="m_image" type="file" required/>
			         <span>Upload Module Image</span>
		          </p>
		          <p><?php echo $_SESSION['errors'];?></p>
				  <p>
			         <button type="submit" class="btn btn-danger">Add Module</button>
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