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
							<form method="POST" >
								<input type="text" class="form-control" value="<?php echo $_SESSION['mod']?>" readonly="readonly">
								<input type="text"  class="form-control"  name="sub" value="<?php echo $_SESSION['sub']?>">
								<input type="text"  class="form-control"  name="msg" value="<?php echo $_SESSION['mesg']?>">
								<input type="hidden" name="rev_d" value="<?php echo $_SESSION['id']?>"></br>
								<button class="btn btn-danger" name="ed_rev" type="submit">UPDATE REVIEW</button>
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