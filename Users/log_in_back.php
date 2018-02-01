<?
require ("function.php");   
$conn = new db_class();
	if(ISSET($_POST['signup'])){
		$u_mail = $_POST['email'];
		$pass1 = $_POST['password'];
        $conn->enc_pass($pass1);
        $conn->u_sess($row);
		echo '<script>alert("Login Successful")</script>';
		echo '<script>window.location= "Landing-Page.php"</script>';

           }
?>