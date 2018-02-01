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
	<script>
function Visionprintreceipt()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>DECREMENTA SYSTEM REPORT</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:12px; font-family:arial Narrow;text-shadow:0 1px 1px rgba(0,0,0,.1); border: 1px solid black;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}</script>
        <div class="main-wrapper" >
            <div class="main-body">
                <div class="row">
                    <div class="col-sm-2">
                       <!--SIDE AREA-->
                        <div  id="side-menu" >
                         
                           <?php include ("includes/side_menus/admin_users_side.php"); ?>
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
						   <form method="post">
						   <p>DOWNLOAD USER SUMMARY</p>
                             
							   <button class="btn btn-danger" name="us_summry" type="submit">DOWNLOAD</button>
                           </form>
                    </div>    
                    </div>
                    <div class="col-sm-4" id="land-img">
                       <div class="forms"> 
                           <form method="post">
						   <p>FILTER BY DATE OF BIRTH</p>
						 
						Start Date: <input type="date" class="form-control" name="f_date">
						
						End Date:  <input type="date" class="form-control" name="l_date">
				
                              <button class="btn btn-danger" name="dt_filt" type="submit">FILTER</button> 
                           </form>
                    </div>    
                    </div>
                    <div class="col-sm-3" id="land-img">
                       <div class="forms"> 
                           <form method="post">
                               <p>FILTER BY ACCOUNT ACTIVITY</p>
						   <select name="date_cret" class="form-control">
						    <option  value="">--PICK PERIOD--</option>   
							<option  value="1">MORE THAN 1 WEEK AG0</option> 
							<option  value="7">LAST 7 DAYS</option>
						   
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
									<?php  $ObjAdminProc-> user_reports($MYSQL);  ?>
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