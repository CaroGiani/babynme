<?php
	
	require_once "includes/dbConnAutoload.php";
	require_once "processes/procAutoload.php";
	$mail=$_SESSION["u_mail"];
	$ObjUsersProc->set_sec($MYSQL);
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

        <div>
             <form method="POST">
          
		<h2>PASSWORD RECOVERY OPTIONS</h2>
			<input type="text" name="mail" value="<?php echo $mail;?>">
            <p>
			
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