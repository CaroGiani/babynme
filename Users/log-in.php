<?php
	session_start();
	require_once "includes/dbConnAutoload.php";
	require_once "processes/procAutoload.php";
	$ObjUsersProc->usersignin($MYSQL);
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
       
      
        <div>
             <form method = "POST" name="signin" id="login" autocomplete="off" >
            <h2>Log In</h2>
            <p>
			 <label for="Email" class="floatLabel">Email</label>
			 <input id="Email" name="email" type="text" required/>
            </p>
            <p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password" required/>
            </p>
			<p><?php  echo $_SESSION["errors"];?></p>
            <p>
            <button type="submit" name="signin" id="submit" class="btn btn-danger" >Login </button>	
			<a href="reset-pass.php"> FORGOT PASSORD</a>
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