<?php
	session_start();
	require_once "includes/dbConnAutoload.php";
	require_once "processes/procAutoload.php";
	$ObjUsersProc->dummy_date($MYSQL);
	
?>
<!DOCTYPE html>
<html lang="en">
<?php //include ("header-main.php"); ?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" style="padding-top:150px;">
    <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
    <div class="main-body">
        <div class="forms"> 
            <form method = "POST" name="registration" id="reg" autocomplete="off" action="">
                <h2>Sign Up</h2>
		          <p>
			         <label for="Email" class="floatLabel">Email</label>
			         <input id="date" name="email" type="int" required />
		          </p>
		          <?php  echo "TODAY IS: ".$_SESSION['se_date']; echo "<br>";
							
	echo "Difference is: ".$_SESSION['dif']; echo "<br>";
				  ?>
			         <button type="submit" name = "signup" id="submit">Create My Account </button>
		          </p>
            </form>
        </div>
         
    </div>
</body>
<?php include ("includes/footer.php"); ?>
</html>