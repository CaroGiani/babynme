<?php 
require_once "to_include.php";
$ObjUsersProc-> usersignout();
//$excel-> rev_reports();
$ObjUsersProc-> crt_rev($MYSQL);
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "header.php";

?>
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
                           <form method="post">
                               <h2>Create Review</h2>
                               <p>
                                  <select name="mod_rev" class="form-control">
								  <option value="">--PICK MODULE TO REVIEW--</option>
                                      <?php
											$ObjUsersProc->list_mod($MYSQL);
                                       ?>
									</select>
		                      </p>
		                      <p>
                                <label for="r_head" class="floatLabel">Review Heading</label>
			                     <input id="r_head" name="r_head" class="form-control" type="text" maxlength="20"> 
		                      </p>
                              <p>
			                     <select name="authr" class="form-control">
                                     <option name="authr" value="">--Select Account to use--</option>
                                     <option name="authr" value="<?php echo $_SESSION['u_id']?>"><?php echo $_SESSION["init_sess"]['u_name'];?></option>
                                     <option name="authr" value="Anonymous">Anonymous</option>
                                 </select>
                            </p>
                            <p>
			                     <label for="r_messg" class="floatLabel">Review Message </label>
			                     <input id="r_messg" name="r_messg" class="form-control" type="text">
                            </p>
							<p><?php echo $_SESSION['err'];?></p>
                            <p>
			                     <button type="submit" class="btn btn-danger" >Create Review </button>
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