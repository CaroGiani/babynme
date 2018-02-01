<?php 
require_once "to_include.php";
$ObjUsersProc-> usersignout();
//$excel-> rev_reports();

?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "admin_header.php";

?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" data-target="#side-menu" data-offset="15">
    <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
        <div class="main-wrapper" >
            <div class="main-body">
                <div class="row">
                    <div class="col-sm-2">
                       <!--SIDE AREA-->
                        <div  id="side-menu" >
                          <?php
                            include ("includes/side_menus/admin_side-menu.php");
                          ?>
	                    </div>
                        <!--END OF SIDE AREA-->  
                    </div>
                    <div class="col-sm-3">
                         <div class="forms"> 
                           <form method="post">
						   <p>SEARCH</p>
                               <input type="search" name="srch_btn" class="form-control">
							   <button class="btn btn-danger" type="submit">FILTER</button>
                           </form>
						      </form>
						   <form method="post">
						   <p>DOWNLOAD REVIEW SUMMARY</p>
                             
							   <button class="btn btn-danger" name="rev_sum" type="submit">DOWNLOAD</button>
                           </form>
                    </div>    
                    </div>
                    <div class="col-sm-3" id="land-img">
                       <div class="forms"> 
                           <form method="post">
						   <p>FILTER BY DATE REVIEW WAS CREATED</p>
						  
						   <select name="rev_per" class="form-control">
						   <option>--PICK PERIOD--</option>
						   <option value="1">LESS THAN 1 WEEK AGO</option>
						   <option value="7">MORE THAN 1 WEEK AGO</option>
						   </select>
                              <button class="btn btn-danger" type="submit">FILTER</button> 
                           </form>
                    </div>    
                    </div>
                    <div class="col-sm-3" id="land-img">
                       <div class="forms"> 
                           <form method="post">
                               <p>FILTER BY MODULE NAME</p>
						   <select name="mod_rev" class="form-control">
						    <option  value="">--PICK MODULE--</option>
						    <?php
								$ObjUsersProc->list_mod($MYSQL);
                              ?>
						   </select>
                             <button class="btn btn-danger" type="submit">FILTER</button>    
                           </form>
                    </div>    
                    </div>
                </div>
		
				<div class="row">
					<div class="col-sm-4">
						<div  id="side-menu"> 
							<li><a href="javascript:Visionprintreceipt()">Print</a></li></div></div>
								<div class="col-sm-8">
							<div id="print_content" style="width: 1000px;"><br>
									<?php  $ObjAdminProc-> revs_reports($MYSQL);  ?>
								</div>
							</div>
						</div>
					</div>
				 </div>
            
       
    </div>
</body>
<?php
   // include ("includes/footer.php")
?>

</html>