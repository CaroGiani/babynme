<?php
	class user_back{
	
		public function bcrypt($pass_input){
			$crypt_options = array(
				'cost' => 10,
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
			);
			return password_hash($pass_input, PASSWORD_BCRYPT, $crypt_options);
		}

		public function usersignup($MYSQL){
			
			if(isset($_POST["signup"])){
				$_SESSION["u_name"] = $MYSQL->escape_values(ucwords(strtolower($_POST["u_name"])));
				$_SESSION["email"] = $MYSQL->escape_values(strtolower($_POST["email"]));
				$ques=$_POST["sec_ques"];
				$anw=$_POST["sec_answ"];
				$userpass = addslashes($_POST["password"]);
				$confirm_password = addslashes($_POST["confirm_password"]);
				
						if ($_SESSION["init_sess"]["user_type"] == 1){
							$user_type = $MYSQL->escape_values($_POST["user_type"]);
						}else if ($_SESSION["init_sess"]["user_type"] == 2){
							$user_type = $MYSQL->escape_values($_POST["user_type"]);
						}else{
							$user_type = 3; //mums user_type
						}

				$spotEmail = 'SELECT `email` FROM `sign_up` WHERE `email` LIKE "%'.$_SESSION["email"].'%"';				
				if($MYSQL->count_results($spotEmail) > 0) {
					$_SESSION["EmailExist"] = " ";
					header('Location: ' . basename($_SERVER['PHP_SELF']) . '?EmailExist');
					exit();
				}
				if($confirm_password !== $userpass) {
					$_SESSION["NotMatch"] = " ";
					header('Location: ' . basename($_SERVER['PHP_SELF']) . '?NotMatch');
					exit();
				}
				$hash_password = $this->bcrypt($confirm_password);
				$keys = array("u_name", "email", "password", "user_type","quest","answer");
				$values = array($_SESSION["u_name"],$_SESSION["email"], $hash_password, $user_type,$ques,$anw);
				$data = array_combine($keys, $values);
				$_SESSION['u_mail']=$_SESSION["email"];
				$insert_qry = $MYSQL->insert("sign_up", $data);
				if($insert_qry == TRUE){
					?>
					<script type="text/javascript">
					setTimeout("location.href = 'log-in.php';",0)
					</script>
				<?php
					exit();
				}else{
					print $insert_qry;
				}
			}
		}
		public function set_sec($MYSQL){
			$umail=$_POST["mail"];
			
			if (!empty($ques)&&!empty($anw)){
				$keys = array("email",);
				$values = array($_SESSION["email"],);
				$data = array_combine($keys,$values);	
				$insert_qry= $MYSQL->insert("recover_pass",$data);
				if ($insert_qry == TRUE){
					?>
					<script type="text/javascript">
					setTimeout("location.href = 'log-in.php';",0)
					</script>
				<?php
					exit();
				}else{
					print $insert_qry;
				}
			}
			else{
				print "blank values";
			}
	}
		public function usersignin($MYSQL){
			if(isset($_POST["signin"])){
				$username = $MYSQL->escape_values(strtolower($_POST["email"]));
				$userpass = addslashes($_POST["password"]);
				$timenow = time();
				$spotUsername = 'SELECT * FROM `sign_up` WHERE `email` = "'.$username.'"';
				if(($MYSQL->count_results($spotUsername)) < 1) {
					
					$_SESSION["errors"] = "EMAIL NOT FOUND";
					
				}
				else{
						$_SESSION=array();
						session_regenerate_id(TRUE);
					$_SESSION["init_sess"] = $MYSQL->select($spotUsername);
						
					if(password_verify($userpass, $_SESSION["init_sess"]["password"])){
						if ($_SESSION["init_sess"]["user_type"] == 1){
							header('Location: bashboard.php');
							exit();
						}else if ($_SESSION["init_sess"]["user_type"] == 2){
							header('Location: bashboard.php');
							exit();
						}else if ($_SESSION["init_sess"]["user_type"] == 3){
							$_SESSION['u_id']=$_SESSION["init_sess"]["user_id"];
							header('Location: Landing-Page.php');
							exit();
						}
					}
					else{
						$_SESSION["usernuserp"] = " ";
						unset($_SESSION["init_sess"]);
						$_SESSION["errors"] = "PASSWORD NOT FOUND";
					
					}
				
				}
				
				
			}
			else{
					$_SESSION["errors"] = "ENTER EMAIL AND PASSWORD TO LOGIN";
				
			}
		}
		
		public function usersignout(){
			if(isset($_GET["action"])){
				if($_GET["action"] == "signout"){
					session_start();
					session_destroy();
					unset($_SESSION);
					$_SESSION=array();
					session_regenerate_id(TRUE);
					
					header('Location: ./');
					exit();
					
				}else{
					header('Location: Landing-Page.php');
					exit();
				}
			}
		}
/************************************************************************************************************************************
DUE DATE  MODULE
************************************************************************************************************************************/
		public function set_due_date($MYSQL){
		$set_due=$_POST['due_date'];
		$date_send=$_POST['d_send'];
		if ($set_due=="cons"){
			$date_int = date($date_send,$integerformat);
			$date_nine = strtotime($date_int) + 23328000;
			$fin_date = date("Y-m-d", $date_nine);
			$keys = array("u_id","due");
			$values = array($_SESSION['u_id'],$fin_date);
			$data = array_combine($keys,$values);		
			$set_due=$MYSQL->insert("due_date",$data);
			if ($set_due==	TRUE){
				$_SESSION['errors']="DUE DATE SET SUCCESSFULLY";
			}
		}
		else if($set_due=="due"){
		$keys = array("u_id","due");
		$values = array($_SESSION['u_id'],$date_send);
		$data = array_combine($keys,$values);		
		$set_due=$MYSQL->insert("due_date",$data);
		if ($set_due==	TRUE){
			$_SESSION['errors']="DUE DATE SET SUCCESSFULLY";
		}
		}
	}
		public function get_diff($MYSQL){
			$spotDate = 'select datediff(due,curdate()) AS difre from due_date Where u_id="'.$_SESSION['u_id'].'" ';
			$row= $MYSQL->select($spotDate);
			$_SESSION['date_diff']=$row['difre'];
			if ($_SESSION['date_diff']>="1"){
				$_SESSION['due']= "YOUR BABY WILL BE HERE IN"." ".$_SESSION['date_diff']." "."DAYS";
			} 
			else {
				$_SESSION['due']= "YOU HAVENT SET ANY DUE DATE YET";
			}
		
		}
		public function get_due_date($MYSQL){
			$spotDate = 'SELECT * FROM `due_date` WHERE `u_id` = "'.$_SESSION['u_id'].'" AND datediff(due,curdate())>"0" ';
			$row= $MYSQL->select($spotDate);
			$_SESSION['pick_date']=$row['due'];
			if ($_SESSION['pick_date']!=""){
				$_SESSION['due']= "YOUR DUE DATE IS"." ".$_SESSION['pick_date'];
			}
			else {
				$_SESSION['due']= "YOU HAVENT SET ANY DUE DATE YET";
			}
			
		}
		public function upd_due_date($MYSQL){
			$set_due=$_POST['due_date'];
			$date_send=$_POST['d_send'];
			if ($set_due=="cons"){
				$date_int = date($date_send,$integerformat);
				$date_nine = strtotime($date_int) + 23328000;
				$fin_date = date("Y-m-d", $date_nine);
				$where = array("u_id"=>$_SESSION['u_id']);
				$keys = array("u_id","due");
				$values = array($_SESSION['u_id'],$fin_date);
				$data = array_combine($keys,$values);		
				$MYSQL->update("due_date",$data,$where);
			}
			else if($set_due=="due"){
				$keys = array("due");
				$values = array($date_send);
				$where = array("u_id"=>$_SESSION['u_id']);
				echo $where;
				$data = array_combine($keys,$values);	
				$MYSQL->update("due_date",$data,$where);
			}
		}
		public function dummy_date($MYSQL){
		//	$dum_id=$MYSQL->escape_values($_POST["email"]);
			$spotDate = ' select datediff(curdate(),due) AS difre from due_date ';
			$row= $MYSQL->select($spotDate);
			echo $row['difre'];
		}
/************************************************************************************************************************************
DIET TRACKING MODULE
************************************************************************************************************************************/
	public function diet_track($MYSQL){
		if (($_POST['prot']!="")&&($_POST['mel_type']!="")&&($_POST['vg']!="")&&($_POST['mel_type']!="")&&($_POST['starch']!="")&&($_POST['frt']!="")&&($_POST['drink']!="")&&($_POST['dt']!="")){	
			$uploads_dir="Assets/images/meals/";
			$file_name =$_FILES['ml_img']['name'];
			$file_tmp =$_FILES['ml_img']['tmp_name'];
			$file_type=$_FILES['ml_img']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['ml_img']['name'])));
			$userpic = rand(1000,1000000).".".$file_ext;
			$file_size =$_FILES['ml_img']['size'];
			$expensions= array("jpeg","jpg","png");
				if(in_array($file_ext,$expensions)=== false){
				$_SESSION['errors']="extension not allowed, please choose a JPEG or PNG file.";
				}
				if($file_size > 2097152){
					$_SESSION['errors']='File size must be excately 2 MB';
				}	
				$keys = array("u_id","proteins","meal","starch","vegetable","fruit","food_img","drink","date");
				$values = array($_SESSION['u_id'],$_POST['prot'],$_POST['mel_type'],$_POST['starch'],$_POST['vg'],$_POST['frt'],$userpic,$_POST['drink'],$_POST['dt']);
				$data = array_combine($keys,$values);
				$row = $MYSQL->insert("diet_track",$data);
				
				if($row==true){
					move_uploaded_file($file_tmp,$uploads_dir.$userpic);
					$_SESSION['errors']="MEAL ADDED SUCCESSFULLY";
				}
			
		}
					else{
						$_SESSION['errors']="PLEASE FILL ALL FIELDS";
					}
		}
	public function view_meal($MYSQL){
			$sql = 'select * from meals WHERE meal<>"" ORDER BY meal ASC ';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_meal = $MYSQL->select_while($sql);
		
				foreach($spot_meal AS $res ){
			
echo"
	<option value=".$res['meal_id'].">".$res['meal']."</option>
		";
				}
			}
			else{
				$_SESSION['errors']= "<p>NO MEALS ADDED</p>";
			}
		}
		public function view_diet($MYSQL){
			$sql = 'select * from diet_track WHERE meal<>"" AND u_id="'.$_SESSION['u_id'].'" GROUP BY date DESC ';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_meal = $MYSQL->select_while($sql);
				foreach($spot_meal AS $res ){
					$img=$res['food_img'];
				include ('includes/user_track.php');
				}
			}
			else{
				echo "<form><p>NO MEALS ADDED</p></form>";
			}
		}
	public function dlt_meal($MYSQL){
		$dt=$_GET['dlt_diet'];
		$where=array("meal_id" =>$dt);
		$keys = array("proteins","meal","starch","vegetable","fruit","food_img","drink","date");
		$values = array("","","","","","","","");
		$data = array_combine($keys,$values);
		$update_qry = $MYSQL->update("diet_track",$data,$where);
		
		}
/************************************************************************************************************************************
DOCTORS APPOINTMENT MODULE
************************************************************************************************************************************/
		public function set_app($MYSQL){
			$doc=$_POST['d_name'];
			$app=$_POST['app_date'];
			$usr=$_POST['user'];
			if (($doc!="")&& ($app!="") && ($usr!="")){
				$keys = array("user_id","date","doc");
				$values = array($usr,$app,$doc);
				$data = array_combine($keys,$values);	
				$row= $MYSQL->insert("appointments",$data);
				if ($row==TRUE){
					$_SESSION['errors']= "APPOINTMENT ADDED SUCCESSFULLY";
				}
				else{
					$_SESSION['errors']= "ERROR SAVING APPOINTMENT";
				}
			}
		}
		public function next_appoint($MYSQL){
			$spotDate = 'select datediff(date,curdate()) AS difre from appointments Where user_id="'.$_SESSION['u_id'].'" AND datediff(date,curdate()) >"0" ORDER BY difre ASC  ';
			$row= $MYSQL->select($spotDate);
			if ($row['difre']>"0"){
				$_SESSION['nex_app']=$row['difre'];
				echo "
					Your Next doctors appointment is in  <b>".$_SESSION['nex_app']."days";
			}
			else{
				echo "YOUR HAVE NO UPCOMING APPOINTMENTS";
			}
		
		}
		public function com_app($MYSQL){
			$sql = 'select * from appointments Where user_id="'.$_SESSION['u_id'].'"  AND datediff(date,curdate()) >"0" ORDER BY date ASC ';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_app = $MYSQL->select_while($sql);
			
				foreach($spot_app AS $res ){
// print_r ($bby_values);
					print '<br />';
					$dc=$res['doc'];
					$dat=$res['date'];
					$id=$res['app_id'];
					include ('includes/get_app_form.php');
				}
			}
			else{
				echo "YOUR HAVE NO UPCOMING APPOINTMENTS";
			}
		}
		
		public function all_app($MYSQL){
			$sql = 'select * from appointments Where user_id="'.$_SESSION['u_id'].'" ORDER BY date ASC ';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_app = $MYSQL->select_while($sql);
			
				foreach($spot_app AS $res ){
// print_r ($bby_values);
					print '<br />';
					$dc=$res['doc'];
					$id=$res['app_id'];
					$dat=$res['date'];
					include ('includes/get_app_form.php');
				}
			}
			else{
				echo "YOUR HAVE NO UPCOMING APPOINTMENTS";
			}
		}
	public function dlt_app($MYSQL){
		$ap_id=$_GET['app_dlt'];
		$where=array("app_id" =>$ap_id);
		$keys = array("date","doc","user_id");
		$values = array("","","");
		$data = array_combine($keys,$values);
		$update_qry = $MYSQL->update("appointments",$data,$where);
		
	}
	public function app_repts($MYSQL){	
		if (isset($_POST)){
		if (isset($_POST['dt_filt'])){
					$sql='select * from appointments WHERE date BETWEEN "'.$_POST['f_date'].'" AND "'.$_POST['l_date'].'" AND user_id="'.$_SESSION['u_id'].'" ORDER BY `date` DESC';
				
					$count_res= $MYSQL->count_results($sql);
					if ($count_res>0){
						$spot_usr = $MYSQL->select_while($sql);
						include ('includes/app_reports.php');
					}
					else{
						echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
					}
				}
				else if (isset($_POST['app_sum'])){
					$sql='select count(app_id) AS total_app,date from appointments WHERE user_id="'.$_SESSION['u_id'].'" ORDER BY `date` DESC';
				
					$count_res= $MYSQL->count_results($sql);
					if ($count_res>0){
						$spot_usr = $MYSQL->select_while($sql);
						echo '
							<form><p><u>SUMMARISED REPORT</u></p>';
							foreach($spot_usr AS $res ){
								echo
									'<p><b>TOTAL APPOINTMENT MADE:</b>'.$res['total_app'].'</p>';
							}
							echo '</form>';
						
					}
					else{
						echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
					}
				}
				else if ($_POST['date_cret']){
					if($_POST['date_cret']=="7"){
				$sql='SELECT  * FROM `appointments` WHERE datediff(date,curdate())>"7" AND user_id="'.$_SESSION['u_id'].'" ORDER BY `date` DESC';
				$count_res= $MYSQL->count_results($sql);
				if ($count_res>0){
					$spot_usr = $MYSQL->select_while($sql);
				
							include ('includes/app_reports.php');
						}
					
					else{
						echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
					}
				}
				else if ($_POST['date_cret']=="1"){
				$sql='SELECT  * FROM `appointments` WHERE  datediff(date,curdate())<"7" AND user_id="'.$_SESSION['u_id'].'" ORDER BY `date` DESC';
				$count_res= $MYSQL->count_results($sql);
					if ($count_res>0){
						$spot_usr = $MYSQL->select_while($sql);
						include ('includes/app_reports.php');
						}
					else{
						echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
					}
				}
			}
		else{
			echo "
				<form>
					<p>SET REPORT PARAMETERS</p>
				</form>";
		}
		
		}
	}

		
/************************************************************************************************************************************
REVIEWS MODULE
************************************************************************************************************************************/
	public function crt_rev($MYSQL){
		$md_id=$_POST['mod_rev'];
		$sub=$_POST['r_head'];
		$arth=$_POST['authr'];
		$mes=$_POST['r_messg'];
		if (($md_id!="")&&($sub!="")&&($arth!="")&&($mes!="")){
			$keys = array("mod_id","rev_sub","author","rev_mess");
			$values = array($md_id,$sub,$arth,$mes);
			$data = array_combine($keys,$values);	
			$row=$MYSQL->insert("review",$data);
			if ($row==TRUE){
				$_SESSION['err']="REVIEW POSTED SUCCESSFULLY";
			}
			else{
				$_SESSION['err']="ERROR POSTING REVIEW";
			}
		}
		else{
			$_SESSION['err']="PLEASE FILL ALL FIELDS";
			}
		}
	public function get_reviews($MYSQL){
		if (isset($_POST['rev'])){
			if ($_POST['rev']=="subj"){
				$sql='SELECT * FROM `revs_data` WHERE `author` ="'.$_SESSION['u_id'].'"   ORDER BY `m_name` ASC';
				$count_res= $MYSQL->count_results($sql);
				if ($count_res>0){
					$spot_rev = $MYSQL->select_while($sql);
					foreach($spot_rev AS $res ){
						$dt=$res['date'];
						$sub=$res['rev_sub'];
						$mesg=$res['rev_mess'];
						$id=$res['rev_id'];
						$mod=$res['m_name'];
						include ('includes/get_rev_form.php');
					}
				}
				else{
					echo
						"<form>
							<p>YOU HAVE NOT MADE ANY REVIEWS YET </p>
						</form>";
				}
			}
			else if ($_POST['rev']=="rev_dt"){
			 $sql='SELECT * FROM `revs_data` WHERE  `author` ="'.$_SESSION['u_id'].'" ORDER BY `date` DESC';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_rev = $MYSQL->select_while($sql);
				foreach($spot_rev AS $res ){
					$dt=$res['date'];
					$sub=$res['rev_sub'];
					$mesg=$res['rev_mess'];
					$id=$res['rev_id'];
					$mod=$res['m_name'];
					include ('includes/get_rev_form.php');
				}
			}
			else{
				echo"<form>
					<p>YOU HAVE NOT MADE ANY REVIEWS YET </p>
				</form>";
				}
			}
		}
		else{
		 $sql='SELECT * FROM `revs_data` WHERE  `author` = "'.$_SESSION['u_id'].'" 
		 ';
		
		 $count_res= $MYSQL->count_results($sql);
		if ($count_res>0){
			$spot_rev = $MYSQL->select_while($sql);
			foreach($spot_rev AS $res ){
				$sub=$res['rev_sub'];
				$dt=$res['date'];
				$mesg=$res['rev_mess'];
				$id=$res['rev_id'];
				$mod=$res['m_name'];
				include ('includes/get_rev_form.php');
			}
		}
		else{
			echo "
				<form>
					<p>YOU HAVE NOT MADE ANY REVIEWS YET </p>
				</form>";
		}
			}
		}
		public function rev_reports($MYSQL){
			if (isset($_POST['srch_btn'])){
			$sql='SELECT * FROM `revs_data` WHERE  `rev_mess` LIKE "%'.$_POST['srch_btn'].'%" OR `rev_sub` LIKE "%'.$_POST['srch_btn'].'%" OR `m_name` LIKE "%'.$_POST['srch_btn'].'%" AND `author` ="'.$_SESSION['u_id'].'" ';
			$count_res= $MYSQL->count_results($sql);
		
				if ($count_res>0){
					$spot_rev = $MYSQL->select_while($sql);
				
					include ('includes/reviews_report.php');
				
				}
				else{
					echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
				}
			}
			else if (isset($_POST['rev_per'])){
				if ($_POST['rev_per']=="1"){
					$sql='SELECT * FROM `revs_data` WHERE `author` ="'.$_SESSION['u_id'].'"  AND datediff(date,curdate()) NOT BETWEEN "0" AND "7" ORDER BY `date` DESC';
					$count_res= $MYSQL->count_results($sql);
					if ($count_res>0){
						$spot_rev = $MYSQL->select_while($sql);
					
						include ('includes/reviews_report.php');
					
					}
					else{
						echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
					}
				}
				else if ($_POST['rev_per']=="7"){
				$sql='SELECT * FROM `revs_data` WHERE `author` ="'.$_SESSION['u_id'].'"  AND  datediff(date,curdate())>"7" ORDER BY `date` DESC';
				$count_res= $MYSQL->count_results($sql);
				if ($count_res>0){
					$spot_rev = $MYSQL->select_while($sql);
					
						include ('includes/reviews_report.php');
					
					
					}
					else{
					echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
					}
				}
			}
		else if (ISSET($_POST['mod_rev'])){
			
			$sql='SELECT  * FROM `revs_data` WHERE `author` = "'.$_SESSION['u_id'].'" AND `m_id`="'.$_POST['mod_rev'].'"';
			
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_rev = $MYSQL->select_while($sql);
				
					include ('includes/reviews_report.php');
				
			}
			else {
			echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
			}
		}
	else{
			echo "
				<form>
					<p>ENTER PARAMETERS FOR THE REPORT </p>
				</form>";
		}
			
		}
	
		
	public function d_rv($MYSQL){
		$v_id=$_GET['d_rev'];
		$where=array("rev_id" =>$v_id);
		$keys = array("rev_mess","rev_sub","mod_id");
		$values = array("","","");
		$data = array_combine($keys,$values);
		$update_qry = $MYSQL->update("review",$data,$where);
	}

/************************************************************************************************************************************
FETAL DEVELOPMENT MODULE
************************************************************************************************************************************/
	public function baby_dets($MYSQL){
	
		if (isset($_POST['week_name'])){
			$filt=$_POST['week_name'];
				$sql = 'SELECT * FROM `baby_dev` where week_name="'.$filt.'"';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_bby = $MYSQL->select_while($sql);
				foreach($spot_bby AS $res ){
// print_r ($bby_values);
					print '<br />';
					$_SESSION['w_id']=$res['week_id'];
					$w_name=$res['week_name'];
					$img=$res['week_image'];
					$descrip=$res['week_descrip'];
					echo"
					<section id='".$_SESSION['w_id']."'>
						<div id='single_week'>
							<form method='GET' action=''>
							<h3>$w_name</h3>
							<img src='http://localhost/babynme/Users/Assets/Images/baby_img/$img' width='180' height='180'/>
							<p>$descrip</p>
								<input type='hidden' name='w_id' id='w_id' value='".$_SESSION['w_id']."'/>
								<button type='submit' name='DETAILS' class='btn btn-info''>Details</button>
							</form>
						</div>
						</section>";
					}
				}
			}
		
		else{
			$sql = 'SELECT * FROM `baby_dev`';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_bby = $MYSQL->select_while($sql);
				foreach($spot_bby AS $res ){
// print_r ($bby_values);
					print '<br />';
					$_SESSION['w_id']=$res['week_id'];
					$w_name=$res['week_name'];
					$img=$res['week_image'];
					$descrip=$res['week_descrip'];
					echo"
					<section id='".$_SESSION['w_id']."'>
						<div id='single_week'>
							<form method='GET' action=''>
							<h3>$w_name</h3>
							<img src='http://localhost/babynme/Users/Assets/Images/baby_img/$img' width='180' height='180'/>
							<p>$descrip</p>
								<input type='hidden' name='w_id' id='w_id' value='".$_SESSION['w_id']."'/>
								<button type='submit' name='DETAILS' class='btn btn-info''>Details</button>
							</form>
						</div>
						</section>";
			}
			}
		}
	}	
/*************************************************************************************************************************
RECOVER PASSWORD MODULE
*************************************************************************************************************************/
	public function get_mod($MYSQL){
			$sql = 'SELECT * FROM `modules`';
			$count_res= $MYSQL->count_results($sql);
			
			if ($count_res>0){
				$spot_modul = $MYSQL->select_while($sql);
				
foreach($spot_modul AS $res ){
					$_SESSION['m_nm']=$res['m_name'];
					$img=$res['m_image'];
					$_SESSION['link']=$res['href'];
					$_SESSION['m_id']=$res['m_id'];
					echo"
						<div id='single_week'>
							
								<h3>".$_SESSION['m_nm']."</h3>
								<a href='".$_SESSION['link']."'>
								<img src='http://localhost/babynme/Users/Assets/Images/modules_img/$img' width='180' height='180'/>
								</a>
						
						</div>";
			}
		}
		else {
			echo "No modules sets";
		}
	}
	public function list_mod($MYSQL){
			$sql = 'SELECT * FROM `modules` where m_name <>""';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_mod = $MYSQL->select_while($sql);
				foreach($spot_mod AS $res ){
					$_SESSION['m_nm']=$res['m_name'];
					$img=$res['m_image'];
					$_SESSION['link']=$res['href'];
					$_SESSION['m_id']=$res['m_id'];
					echo"
					
						<option name='mod_rev' value=".$_SESSION['m_id'].">".$_SESSION['m_nm']."</option>
						";
			}
		}
			else {
			echo "No modules sets";
			}
		}	
		// $_SESSION["init_sess"] = $MYSQL->select($spotUsername);
/************************************************************************************************************************************
RECOVER PASSWORD MODULE
************************************************************************************************************************************/
	public function recov_pas($MYSQL){    
			$umail=$_POST['mail'];
			$sql ='SELECT * FROM `sign_up` WHERE `email` ="'.$umail.'"';				
			$count_res=$MYSQL->count_results($sql);
			if($count_res>0) {
				$_SESSION["rec_sess"]= $MYSQL->select($sql);
				//$_SESSION["sec_q"]=$_SESSION["rec_sess"]["quest"];
				// $_SESSION["sec_a"]=	$_SESSION["rec_sess"]["answer"];
			
				?>
				<script type="text/javascript">
					setTimeout("location.href = 'ans_quest.php';",1)
				</script>
				<?php
			}
			$err[]= "Email Doesnt Exists";
	//	}
	//	$err[]="PLEASE FILL ALL THE FIELDS";
	}
	
	public function ans_qes($MYSQL){
		$resp=$_POST['ans'];
		if ($resp==$_SESSION["rec_sess"]["answer"])
		{
			?>
				<script type="text/javascript">
					setTimeout("location.href = 'chang_pass.php';",1)
				</script>
				<?php
		}
	
	}
	public function reset_pass($MYSQL){
		
		$userpass = addslashes($_POST["pass"]);
		$confirm_password = addslashes($_POST["c_pass"]);
		if (($userpass!=="")&&($confirm_password)){
		if($confirm_password !== $userpass) {
		//	$_SESSION["NotMatch"] = " ";
			$err[]="Passwords Dont Match";
			exit();
		}
			$hash_password = $this->bcrypt($confirm_password);
			$where=array("email" =>$_SESSION["rec_sess"]["email"]);
			$keys = array("password");
			$values = array($hash_password);
			$data = array_combine($keys,$values);
			$update_qry = $MYSQL->update("sign_up",$data,$where);
			if ($update_qry==TRUE){
			?>
				<script type="text/javascript">
					setTimeout("location.href = 'log-in.php';",1)
				</script>
				<?php
			}
		}
		$err[]="FILL IN ALL FIELDS";
	}
 
	}
?>