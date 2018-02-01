<?php
	require_once "includes/dbConnAutoload.php";
	require_once "processes/procAutoload.php";
	$ObjUsersProc->usersignup($MYSQL);
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("header-main.php"); ?>
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
			         <input id="Email" name="email" type="text" required />
		          </p>
		          <p>
			         <label for="Email" class="floatLabel">User Name</label>
			         <input id="u_name" name="u_name" type="text" required />
		          </p>
		          <p>
			         <label for="password" class="floatLabel">Password</label>
			         <input id="password" name="password" type="password" required />
			         <span>Enter a password longer than 8 characters</span>
		          </p>
		          <p>
			         <label for="confirm_password" class="floatLabel">Confirm Password</label>
			         <input id="confirm_password" name="confirm_password" type="password" required />
			         <span>Your passwords do not match</span>
		          </p>
				  <p>
					<label for="Question" class="floatLabel">SET SECURITY QUESTION</label>
					<input  name="sec_ques" type="text" required />
				</p>  
				<p>
					<label for="Answer" class="floatLabel">ANSWER</label>
					<input name="sec_answ" type="text" required />
				</p>
           
		          <p>
			         <button type="submit" class="btn btn-danger" name = "signup" id="submit">Create My Account </button>
		          </p>
            </form>
        </div>
         
    </div>
</body>
<?php include ("includes/footer.php"); ?>
</html>