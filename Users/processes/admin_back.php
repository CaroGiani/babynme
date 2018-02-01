<?php 
class admin_back{
/************************************************************************************************************************************
FETAL DEVELOPMENT MODULE
************************************************************************************************************************************/
	public function edit_fetal_dev($MYSQL){
	
			IF (($_POST["week_name"]!="")&&($_POST["f_descr"]!="")){
				$w_nm = $MYSQL->escape_values($_POST["week_name"]);
				$fetal_dts= $MYSQL->escape_values(ucwords(strtolower($_POST["f_descr"])));	
				$uploads_dir="Assets/Images/baby_img/";
					$file_name = $_FILES['f_img']['name'];
					$file_size =$_FILES['f_img']['size'];
					$file_tmp =$_FILES['f_img']['tmp_name'];
					$file_type=$_FILES['f_img']['type'];
					$file_ext=strtolower(end(explode('.',$_FILES['f_img']['name'])));
					$userpic = rand(1000,1000000).".".$file_ext;
					$keys = array("week_image", "week_descrip");
					$values = array($userpic,$fetal_dts);
					$where= array("week_name" => $w_nm);
					$data = array_combine($keys,$values);
					$expensions= array("jpeg","jpg","png");
					if(in_array($file_ext,$expensions)=== false){
					$_SESSION['errors']="extension not allowed, please choose a JPEG or PNG file.";
					}
					if($file_size > 2097152){
						$_SESSION['errors']='File size must be excately 2 MB';
					}
					$update_qry = $MYSQL->update("baby_dev",$data,$where);
				if($update_qry == TRUE){
					move_uploaded_file($file_tmp,$uploads_dir.$userpic);
				
					$_SESSION['errors']="RECORD ADDED SUCCESSFULLY";
					
				}else{
					$_SESSION['errors']="ERROR UPLOADING";
				}
			}
			else {
					$_SESSION['errors']="PLEASE FILL ALL THE FIELDS";
			}
			
			}

	public function add_fetal_dev($MYSQL){
			
			IF (($_POST["week_name"]!="")&&($_POST["f_descr"]!="")){
				$w_nm = $MYSQL->escape_values(ucwords(strtolower($_POST["week_name"])));
				$fetal_dts= $MYSQL->escape_values(ucwords(strtolower($_POST["f_descr"])));	
				$spotWeek = 'SELECT `week_id` FROM `baby_dev` WHERE `week_name` LIKE "%'.$w_nm.'%"';	
				$uploads_dir="Assets/Images/baby_img/";
				if($MYSQL->count_results($spotWeek) > 0) {
					$_SESSION['errors']="WEEK ALREADY EXISTS";
				}
					$file_name = $_FILES['f_img']['name'];
					$file_size =$_FILES['f_img']['size'];
					$file_tmp =$_FILES['f_img']['tmp_name'];
					$file_type=$_FILES['f_img']['type'];
					$file_ext=strtolower(end(explode('.',$_FILES['f_img']['name'])));
					$userpic = rand(1000,1000000).".".$file_ext;
					$keys = array("week_name", "week _image", "week_descrip");
					$values = array($w_nm, $userpic,$fetal_dts);
					$data = array_combine($keys, $values);
					$expensions= array("jpeg","jpg","png");
					if(in_array($file_ext,$expensions)=== false){
					$_SESSION['errors']="extension not allowed, please choose a JPEG or PNG file.";
					}
					if($file_size > 2097152){
						$_SESSION['errors']='File size must be excately 2 MB';
					}
						$update_qry = $MYSQL->update("baby_dev",$data,$where);
				if($update_qry == TRUE){
					move_uploaded_file($file_tmp,$uploads_dir.$userpic);
				
					$_SESSION['errors']="RECORD ADDED SUCCESSFULLY";
					exit();
				}else{
					$_SESSION['errors']="ERROR UPLOADING";
				}
			}
			else {
					$_SESSION['errors']="PLEASE FILL ALL THE FIELDS";
			}
			
			}

/************************************************************************************************************************************
MODULES
************************************************************************************************************************************/
	public function view_mod($MYSQL){
				$sql = 'SELECT * FROM `modules` WHERE `m_name` <>""';
			$count_res= $MYSQL->count_results($sql);
			
			if ($count_res>0){
				$spot_modul = $MYSQL->select_while($sql);
				
				foreach($spot_modul AS $res ){
					$_SESSION['m_nm']=$res['m_name'];
					$img=$res['m_image'];
					$_SESSION['link']=$res['href'];
					$_SESSION['m_id']=$res['m_id'];
						include ('includes/admin_modules.php');
			}
		}
		else {
			echo "No modules sets";
		}
	}
		public function add_mod($MYSQL){
		if (($_POST["m_name"]!="")&&($_POST["m_url"]!="")){
				$m_nm = $MYSQL->escape_values(ucwords(strtolower($_POST["m_name"])));
				$url= $MYSQL->escape_values(ucwords(strtolower($_POST["m_url"])));
				$fin_url="http://localhost/babynme/users/".$url;
				$uploads_dir="Assets/Images/modules_img/";
				$spotWeek = 'SELECT `m_id` FROM ` modules` WHERE `m_name` LIKE "%'.$m_nm.'%"';	
				
				if($MYSQL->count_results($spotWeek) > 0) {
						$_SESSION['errors']="MODULE ALREADY EXISTS";
					exit();
				}
					$file_name = $_FILES['m_image']['name'];
					$file_ext=strtolower(end(explode('.'.$file_name)));
					$userpic = rand(1000,1000000).".".$file_ext;
					$file_size =$_FILES['m_image']['size'];
					$file_tmp =$_FILES['m_image']['tmp_name'];
					$file_type=$_FILES['m_image']['type'];
					$keys = array("m_name","m_image","href");
					$values = array($m_nm,$userpic,$fin_url);
					$data = array_combine($keys, $values);
					
					$expensions= array("jpeg","jpg","png");
					
					if(in_array($file_ext,$expensions)=== false){
					$_SESSION['errors']="extension not allowed, please choose a JPEG or PNG file.";
					}
					if($file_size > 2097152){
						$_SESSION['errors']='File size must be excately 2 MB';
					}
					$insert_qry = $MYSQL->insert("modules",$data);
					if($insert_qry==true){
						move_uploaded_file($file_tmp,$uploads_dir.$userpic);
						
						$_SESSION['errors']="MODULE ADDED SUCCESSFULLY";
					}
			
		}
		else{
			$_SESSION['errors']="PLEASE FILL ALL FIELDS";
		}
	}
	public function dlt_mod($MYSQL){
		$where=array("m_id" =>$_GET['dlt_md']);
		$keys = array("m_name", "m_image", "href");
		$values = array("","","");
		$data = array_combine($keys,$values);
		$update_qry = $MYSQL->update("modules",$data,$where);
	
	}
/************************************************************************************************************************************
DOCTORS APPOINTMENTS MODULE
************************************************************************************************************************************/
	public function view_app($MYSQL){
				$sql = 'select * from appointments Where doc <>"" ORDER BY date ASC ';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_app = $MYSQL->select_while($sql);
					echo '
						<form><p>APPOINTMENTS RECORDS</p><table id="mytable" class="table .table-striped">';
					echo '<th>USER ID</th><th>APPOINTMENT ID</th><th>APPOINTMENT DATE</th>';

					foreach($spot_app AS $res ){
					echo '<tr><td>'.$res['user_id'].'</td><td>'.$res['app_id'].'</td><td>'.$res['date'].'</td></tr>';
					}
					echo '</table></form>';
				}
			else{
				echo "NO APPOINTMENTS HAVE BEEN SET";
			}
	}

	
/************************************************************************************************************************************
DIET TRACKING MODULE
************************************************************************************************************************************/
	public function add_meal_time($MYSQL){
		if ($_POST["me_typ"]!=""){
			$m_tim = $MYSQL->escape_values(ucwords(strtolower($_POST["me_typ"])));
			$sql = 'select * from meals WHERE meal LIKE "%'.$m_tim.'%"';
			echo $sql;
			$count_res= $MYSQL->count_results($sql);
			echo $count_res;
			if ($count_res==0){
			$keys = array("meal");
			$values = array($m_tim);
			$data = array_combine($keys,$values);	
			$insert_qry =$MYSQL->insert("meals",$data);
			if($insert_qry == TRUE){
				$_SESSION['errors']="RECORD SUCCESSFULLY ENTERED";
			}
			else{
				$_SESSION['errors']="ERROR SAVING RECORD";
			}
		}
		else{
			$_SESSION['errors']="MEAL TIME ALREADY EXISTS";
		}
		}
		else{
			$_SESSION['errors']="PLEASE FILL THE FIELD";
		}
	}
	public function view_meal($MYSQL){
			$sql = 'select * from meals WHERE meal<>"" ORDER BY meal ASC ';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_meal = $MYSQL->select_while($sql);
					include ('includes/view_meal.php');
			}
			else{
				echo "
				<form><p>NO MEALS ADDED</p></form>";
			}
		}
		public function dlt_meal($MYSQL){
			$where=array("meal_id" =>$_GET['dlt_meal']);
			$keys = array("meal");
			$values = array("");
			$data = array_combine($keys,$values);
			$update_qry = $MYSQL->update("meals",$data,$where);
		}
/************************************************************************************************************************************
USERS
************************************************************************************************************************************/
	public function view_user($MYSQL){
			$sql = 'select user_id,user_type,date_created, datediff(curdate(),dob)AS age from sign_up WHERE 	email<>"" ORDER BY user_id ASC ';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_usr = $MYSQL->select_while($sql);
					include ('includes/view_users.php');
			}
			else{
				echo "YOUR HAVE NO UPCOMING APPOINTMENTS";
			}
		}
	public function d_usr($MYSQL){
		$where=array("user_id" =>$_GET['dlt_user']);
		$keys = array("u_name", "email", "password","quest","answer");
		$values = array("","","","","");
		$data = array_combine($keys,$values);
		$update_qry = $MYSQL->update("sign_up",$data,$where);
	}
	public function user_reports($MYSQL){
		if (isset($_POST)){
			if (isset($_POST['srch_btn'])){
			$sql='select user_id,user_type,date_created,datediff(curdate(),dob)AS age from sign_up  WHERE  `user_id` LIKE "%'.$_POST['srch_btn'].'%" OR `user_type` LIKE "%'.$_POST['srch_btn'].'%" OR `date_created` LIKE "%'.$_POST['srch_btn'].'%" OR `dob` LIKE "%'.$_POST['srch_btn'].'%" ';
			$count_res= $MYSQL->count_results($sql);
				if ($count_res>0){
					$spot_usr = $MYSQL->select_while($sql);
					include ('includes/user_reports.php');
				}
				else{
					echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
				}
			}
			else if (isset($_POST['dt_filt'])){
					$sql='select user_id,user_type,date_created,datediff(curdate(),dob)AS age from sign_up WHERE dob BETWEEN "'.$_POST['f_date'].'" AND "'.$_POST['l_date'].'" ORDER BY `date_created` DESC';
				
					$count_res= $MYSQL->count_results($sql);
					if ($count_res>0){
						$spot_usr = $MYSQL->select_while($sql);
						
						include ('includes/user_reports.php');
						
					}
					else{
						echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
					}
				}
				else if (isset($_POST['us_summry'])){
					$sql='select count(user_id) AS total_users,user_type,date_created,sum(datediff(curdate(),dob))AS age from sign_up ORDER BY `date_created` DESC';
				
					$count_res= $MYSQL->count_results($sql);
					if ($count_res>0){
						$spot_usr = $MYSQL->select_while($sql);
						echo '
							<form><p><u>SUMMARISED REPORT</u></p>';
							foreach($spot_usr AS $res ){
								//$new_age=round($res['age']/"365");
							//	$x_ag=array_sum(($res['age']/"365")/$res['total_users']);
								$x_ag=round($res['age']/"365");
								echo
									'<p><b>TOTAL USERS:</b>'.$res['total_users'].'</p><p><b>AVERAGE USER AGE:</b>'.$x_ag.'</p>';
							}
							echo '</form>';
						
					}
					else{
						echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
					}
				}
				else if ($_POST['date_cret']){
					if($_POST['date_cret']=="7"){
				$sql='SELECT  user_id,user_type,date_created,datediff(curdate(),dob)AS age  FROM `sign_up` WHERE datediff(date_created,curdate())<"7" ORDER BY `date_created` DESC';
				$count_res= $MYSQL->count_results($sql);
				if ($count_res>0){
					$spot_usr = $MYSQL->select_while($sql);
				
							include ('includes/user_reports.php');
						}
					
					}
					else{
						echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
					}
				}
				else if ($_POST['date_cret']=="1"){
				$sql='SELECT  user_id,user_type,date_created,datediff(curdate(),dob)AS age  FROM `sign_up` WHERE  datediff(date_created,curdate())>"7" ORDER BY `date_created` DESC';
				$count_res= $MYSQL->count_results($sql);
				if ($count_res>0){
					$spot_usr = $MYSQL->select_while($sql);
					
						include ('includes/user_reports.php');
						}
					
					}
						else{
						echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
						}
					}
		else{
			echo "
				<form>
					<p>SET REPORT PARAMETERS</p>
				</form>";
		}
}
/************************************************************************************************************************************
REPORTS
************************************************************************************************************************************/	
	public function revs_reports($MYSQL){
		if (isset($_POST)){
			if (isset($_POST['srch_btn'])){
			$sql='SELECT * FROM `revs_data` WHERE  `rev_mess` LIKE "%'.$_POST['srch_btn'].'%" OR `rev_sub` LIKE "%'.$_POST['srch_btn'].'%" OR `m_name` LIKE "%'.$_POST['srch_btn'].'%" ';
			$count_res= $MYSQL->count_results($sql);
		
				if ($count_res>0){
					$spot_rev = $MYSQL->select_while($sql);
					include ('includes/reviews_report.php');
				}
				else{
					echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
				}
			}
			else if (ISSET($_POST['mod_rev'])){
			$sql='SELECT  * FROM `revs_data` WHERE `m_id`="'.$_POST['mod_rev'].'"';
			$count_res= $MYSQL->count_results($sql);
			if ($count_res>0){
				$spot_rev = $MYSQL->select_while($sql);
				
					include ('includes/reviews_report.php');
				
			}
			else {
			echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
			}
		}
				else if (isset($_POST['rev_sum'])){
					$sql='select count(rev_id) AS total_revs,date from revs_data ORDER BY `date` DESC';
					$count_res= $MYSQL->count_results($sql);
					if ($count_res>0){
						$spot_usr = $MYSQL->select_while($sql);
						echo '
							<form><p><u>SUMMARISED REPORT</u></p>';
							foreach($spot_usr AS $res ){
								echo
									'<p><b>TOTAL REVIEWS:</b>'.$res['total_revs'].'</p><p><b>MOST REVIEWED MODULE:</b></p>';
							}
							echo '</form>';
						
					}
					else{
						echo "<form><p>NO RECORDS MATCH THOSE PARAMETERS</p></form>";
					}
				}
				else if (isset($_POST['rev_per'])){
				if ($_POST['rev_per']=="1"){
					$sql='SELECT * FROM `revs_data` WHERE datediff(date,curdate()) NOT BETWEEN "0" AND "7" ORDER BY `date` DESC';
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
				$sql='SELECT * FROM `revs_data` WHERE  datediff(date,curdate())>"7" ORDER BY `date` DESC';
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
		else{
			echo "
				<form>
					<p>SET REPORT PARAMETERS</p>
				</form>";
		}
	}

	}
	public function app_repts($MYSQL){	
		if (isset($_POST)){
		if (isset($_POST['dt_filt'])){
					$sql='select * from appointments WHERE date BETWEEN "'.$_POST['f_date'].'" AND "'.$_POST['l_date'].'" ORDER BY `date` DESC';
				
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
					$sql='select count(app_id) AS total_app,date from appointments ORDER BY `date` DESC';
				
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
				$sql='SELECT  * FROM `appointments` WHERE datediff(date,curdate())>"7" ORDER BY `date` DESC';
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
				$sql='SELECT  * FROM `appointments` WHERE  datediff(date,curdate())<"7" ORDER BY `date` DESC';
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
}
	
	
	
	




?>