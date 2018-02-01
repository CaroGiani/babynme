<?php 
require_once "to_include.php";
$ObjUsersProc-> usersignout();
$ObjUsersProc-> d_rv($MYSQL);

//$excel-> rev_reports();
?>
<!DOCTYPE html>
<html lang="en">
<?php

 include ("header.php"); ?>
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
                           <form method="post" >
						   <p>SORT RESULTS</p>
								<select name="rev" class="form-control">
                                    <option value="" >SORT RESULTS</option>
									<option value="subj" name="rev">MODULE</option>
									<option value="rev_dt" name="rev" >DATE MADE </option>
								</select>
								<button type="submit" class="btn btn-danger">SORT</button>
							</form>
								<?php	
								$ObjUsersProc-> get_reviews($MYSQL); 
							
								?>
                    </nav>
                </div>
            </div>
            
       
    </div>
</body>
<?php
    include ("includes/footer.php")
?>

</html>