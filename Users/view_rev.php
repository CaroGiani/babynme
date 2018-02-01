<?php 
require_once "to_include.php";
//$excel-> rev_reports();
$ObjUsersProc-> usersignout();
$ObjUsersProc-> chg_review($MYSQL);
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("header.php"); ?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" data-target="#side-menu" data-offset="15">
    <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
        <div class="main-wrapper" >
            <div class="main-body">
                <div class="row">
                    <div class="col-sm-3">
                       <!--SIDE AREA-->
                        <div  id="side-menu" >
                          <?php
                          include ("includes/side_menus/reviews_side_menu.php");
                          ?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <nav class="col-sm-9" id="land-img">
                       <div class="forms"> 
							<form method="POST">
								<h2><?php echo $_SESSION['mod']?></h2>
								<b><p><?php echo $_SESSION['sub']?></p></b>
								<p><?php echo $_SESSION['mesg']?></p>
									<input type="hidden"  value="<?php echo $_SESSION['id']?>">
									<button style="float:left" class="btn btn-danger" name="dlt_rev" type="submit">DELETE REVIEW</button>
									<button  style="float:right" class="btn btn-danger"  type="submit"><a style="text-decoration:none;color:white;"	href="edit_rev.php" >EDIT REVIEW</a> </button>
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