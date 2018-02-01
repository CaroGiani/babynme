<?php 
require_once "to_include.php";
$ObjUsersProc-> usersignout();
//$excel-> rev_reports();

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
                    <div class="col-sm-2">
                       <!--SIDE AREA-->
                        <div  id="side-menu" >
                          <?php
                            include ("includes/side_menus/reviews_side_menu.php");
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
		<script language="javascript">
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
}
</script>
<div class="row">
					<div class="col-sm-4">
						<div  id="side-menu"> 
							<li><a href="javascript:Visionprintreceipt()">Print</a></li></div></div>
								<div class="col-sm-8">
							<div id="print_content" style="width: 1000px;"><br><br>
							
									<?php  $ObjUsersProc->rev_reports($MYSQL);?>
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