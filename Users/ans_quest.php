<?php
	session_start();
	require_once "includes/dbConnAutoload.php";
	require_once "processes/procAutoload.php";
	$ObjUsersProc->ans_qes($MYSQL);
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
         <h2>RESET PASSWORD</h2>
            <p>Please answer the security question you set</p>
			<p>
			 <label for="Email" class="floatLabel">Question</label>
			 <input  class="form-control"  type="text" value="<?php echo $_SESSION["rec_sess"]["quest"]; ?>" readonly="readonly" required />
            </p>
			<p>
			 <label for="Email" class="floatLabel">Answer</label>
			 <input  class="form-control" name="ans" type="text" required />
            </p>
           
            <button type="submit"  class="btn btn-danger" >SAVE </button>	
			
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