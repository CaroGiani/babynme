<?php
	session_start();
	require_once "includes/dbConnAutoload.php";
	require_once "processes/procAutoload.php";
	$ObjUsersProc->reset_pass($MYSQL);
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("header-main.php"); ?>
<body>
    <div class="container-fluid">
    <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
   
    <div class="content-wrapper">
 <!--CONTENT AREA-->
    <div id="content-area" align="center"> 
        <h1>RESET PASSWORD</h1>
       
        <div>
             <form method ="POST">
            <h2>RESET PASSWORD</h2>
            <p>
			 <label for="Pass" class="floatLabel">NEW PASSWORD</label>
			 <input  class="form-control" name="pass" type="password" required />
            </p> 
			<p>
			 <label for="Conf Pass" class="floatLabel">CONFIRM PASSWORD</label>
			 <input  class="form-control" name="c_pass" type="password" required />
            </p>
            <button type="submit" class="btn btn-danger" >SAVE </button>	
			
            </p>
            </form>
        </div>
    </div>
    </div>	     

<!--END OF CONTENT AREA-->	    
 </div>
</body>
<?php include ("includes/footer.php"); ?>
</html>