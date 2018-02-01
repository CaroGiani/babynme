<?php
require_once "to_include.php";
	$ObjUsersProc->  usersignup($MYSQL);
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
                          <?php include ("includes/side_menus/admin_users_side.php"); ?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <nav class="col-sm-9" >
             
        <div >
            <form method = "POST"  enctype="multipart/form-data">
                <h2>Register new user</h2>
		          <p>
			         <label for="Email" class="floatLabel">Email</label>
			         <input id="Email" class="form-control" name="email" type="email" required />
		          </p>
		          <p>
			         <label for="Email" class="floatLabel">User Name</label>
			         <input id="u_name"  class="form-control" name="u_name" type="text" maxlength="200" required />
		          </p>
		          <p>
			         <label for="password" class="floatLabel">Password</label>
			         <input id="password" class="form-control" name="password" type="password" required />
		          </p>
		          <p>
			         <label for="confirm_password" class="floatLabel">Confirm Password</label>
			         <input id="confirm_password" class="form-control" name="confirm_password" type="password" required />
		          </p>
		          <p>
			         <select name = "user_type" class="form-control" required>
						<option value = "">--Please select user type--</option>
						<option value = "2">New Admin</option>
						<option value = "3">New Mum</option>
			         </select>
		          </p>
				    <p>
					<label for="Question" class="floatLabel">SET SECURITY QUESTION</label>
					<input  name="sec_ques" class="form-control" type="text" required />
				</p>  
				<p>
					<label for="Answer" class="floatLabel">ANSWER</label>
					<input name="sec_answ" class="form-control" type="text" required />
				</p>
		          <p>
			         <button class="btn btn-danger" >Create Account </button>
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