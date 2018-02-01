<?php
 session_start();
        include ("function.php");   
        $userObj = new USER();
        $data =  USER::logout($_SESSION['U_id']);
        
?>