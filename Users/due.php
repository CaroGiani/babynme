<?php
	require_once "to_include.php";
	$ObjUsersProc->set_due_date($MYSQL);
	$ObjUsersProc->get_due_date($MYSQL);
?>
<!DOCTYPE html>
<html lang="en">
<?php include "header.php"; ?>
<body data-spy="scroll" data-target=".navbar" data-offset="50" style="padding-top:150px;">
    <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
		
    <div class="main-body">
		<div class="row">
		<div class="col-sm-2">
		 <div  id="side-menu" >
					<?php include "includes/side_menus/due_side.php";?>
				</div>
		</div>
		<div class="col-sm-5">
        <div class="forms"> 
		
            <form autocomplete="off" method="POST">
			<p style="align:center"> Set Due Date </p>
					<input type="radio" value="cons" class="form-control" name="due_date">Conseption Date
					<input type="radio" value="due" class="form-control" name="due_date">Due Dat
					<input type="date" name="d_send"  class ="form-control">
					<p>	If the date is corrent then submit it.
					You can change this date any time.</p> 
						<p><b><?php echo $_SESSION['errors']?></b></p>
				<button type="submit" id="submit" class="btn btn-danger">SAVE </button>
				
            </form>
			</div>
			</div>
			<div class="col-sm-5">
			<form>
			<p><b><?php echo $_SESSION['due']?></b></p>
			</form>
			
 </div>
 </div>
	</div>
    
</body>
<?php //include ("includes/footer.php"); ?>
</html>