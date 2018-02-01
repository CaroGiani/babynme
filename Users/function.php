<?php
ini_set('display_errors','1');
require ("db_connect.php");
//class user handles all user processes..signup/login/profiles
class user extends db_connect {
    public static $data;
    function __construct() {
    parent::__construct();
   }
 public function conf_pass($pass1,$pass2){
    try{ 
            if ($pass1 == $pass2){
                $u_mail = $_POST['email'];
                $pass3=$pass1;
                $data = self::enc_pass($pass3);
                $u_mail = $_POST['email'];
                $user_n=$_POST['u_name'] ;
                $data = self::checkUserValues($u_mail,$new_pas,$user_n);
            }
             die("Passwords dont match!");
        }
     catch (Exception $e) {
            $data = array('status'=>'error', 'msg'=>"Failed to validate passwords", 'result'=>'');
        } 
    finally {
            //return $new_pas;
    }
     
} 
//ENCRPT PASSWORDS
public function enc_pass($pass3){
    $new_pas=md5($pass3);
    return $new_pas;
}
  // Check if user already exist
public static function checkUserValues($u_mail,$new_pas,$user_n) {
     try {
         if (!empty ($u_mail)){
         	 
            $query = "SELECT * FROM sign_up WHERE email='$u_mail' or u_name='$user_n'";
            $result = db_connect::run($query);
            if(!$result) {
                die("Error in query!");
            }
            $count = mysqli_num_rows($result); 
            if($count>0) {
                die("Username or Password already exist.") ;
       }  
            else{    
                $data = USER::addNewUser($u_mail,$user_n,$new_pas);
                $data = array('status'=>'success', 'msg'=>"", 'result'=>''); 
        }
         }
         else {
             die("Error in query!") ;
         }
     } 
    catch (Exception $e) {
        $data = array('status'=>'error', 'msg'=>$e->getMessage()); 
     } 
    finally {
        return $data;
     }
   }

    // Create new user/signup
    public static function addNewUser($u_mail,$user_n,$new_pas) {
        try {    
            
       if($check['status'] == 'error') {
           $data = $check;
       } else {
       $query = "INSERT INTO sign_up(u_name,email,password) VALUES ('$user_n','$u_mail','$new_pas')";
       $result = db_connect::run($query);
       if($result==TRUE) {
            $u_sess=$u_mail;
            $data = self::userSessions($u_sess);
       }   
        die("Error to create new user.");
       $data = array('status'=>'success', 'msg'=>"You have been registered successfully login now.", 'result'=>'');
      }
     } catch (Exception $e) {
       $data = array('status'=>'error', 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }
 
   
// Check if username/password is incorrect
public static function checkUser($u_mail) {
     try {
        $pass3 = $_POST['password'];
       $new_pas =  USER::enc_pass($pass3);
         
        $query = "SELECT * FROM sign_up WHERE email='$u_mail' AND password='$new_pas' ";
       $result = db_connect::run($query);
       if(!$result) {
        die ("Error in query!");
       }
         else{
        $count = mysqli_num_rows($result); 
       if($count == 0) {
         // echo ("Username/Password is incorrect.");
           die( "Username/Password is incorrect.");
       } 
        else{
            $u_sess=$u_mail;
            $data = self::userSessions($u_sess);
            $data = array('status'=>'success', 'msg'=>"", 'result'=>'');
        }
         }
     } catch (Exception $e) {
         echo  $data = array('status'=>'error', 'msg'=>$e->getMessage()); 
     } finally {
        return $data;
     }
} 
public function userSessions($u_sess){
    session_start();
	$query = "SELECT * FROM sign_up WHERE email='$u_sess'";
    $result = db_connect::run($query);
       if(!$result) {
        die ("Error in query!");
       }
        else{
        $row = mysqli_fetch_array($result); 
        $_SESSION['U_nm']=$row['u_name'];
        $_SESSION['U_id']=$row['user_id'];
        $_SESSION['timeout'] = time();
        $_SESSION['valid']=true;
        header("location:Landing-Page.php");  
    }
}
  // Get user information by userid
  public static function getUserById($id) {
     try {
       $query = "SELECT * FROM users WHERE id=".$id;
       $result = db_connect::run($query);
       if(!$result) {
         throw new exception("Error in query");
       }
       $resultSet = mysqli_fetch_assoc($result); 
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"User detail fetched successfully", 'result'=>$resultSet);
     } catch (Exception $e) {
       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
  }
    
public function logout(){
    unset($_SESSION);
    session_destroy();
    $_SESSION['U_nm']=NULL;
    $_SESSION['U_id']=NULL;
    header("location:index.php");   
}


public function rev_select(){
    $query="SELECT * FROM modules";
    $select=db_connect::run($query);
	while($row=mysqli_fetch_array($select));
	{
	?>
    <option value="<?php echo $row['m_id'];?>" name="mod"> <?php echo $row['m_name'];?></option>
     <?php
      }
    }
}
      ?>

 