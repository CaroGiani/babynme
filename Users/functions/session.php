<?php
session_start();
ini_set('display_errors','0');
// Storing Session
	// set timeout period in seconds (600 = 10 minutes)
	$inactive = 60;
	if (!isset($_SESSION["init_sess"]) || !is_array($_SESSION["init_sess"])) {
		header("Location: index.php?not_set"); // Redirecting To Login Page 
		exit();
	} else{
// check to see if $_SESSION['timeout'] is set    
	if(isset($_SESSION['timeout'])) {
      $session_life = time() - $_SESSION['timeout'];
    if($session_life > $inactive){
        session_destroy(); 
        header("Location:index.php"); 
		}
	}
   }
?>
