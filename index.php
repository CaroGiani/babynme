<?php
	header("Location: ./Users/");
	exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--Mobile-first styles are part of the core framework--> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="Assets/Images/favicon.PNG" >
    <link rel="stylesheet" href="Assets/Style/Style.css">
    <link rel="stylesheet" href="Assets/Style/index_style.css">
    <link rel="stylesheet" href="Assets/Style/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="Assets/Style/jquery-3.1.1.min.js"></script>
    <script src="Assets/Style/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script> 
    
      <script  src="Assets/Style/validate.js"></script>
     <div class="header-wrapper" id="nav-1">
                <script>
                //    document.getElementById("nav-1").style.backgroundImage = "url('Assets/Images/nav-bar-img.jpg')";
                    document.getElementById("nav-1").style.backgroundRepeat = "repeat";
                    document.getElementById("nav-1").style.backgroundSize = "cover";
                   document.getElementsByClassName("header-wrapper").style.backgroundImage=" url('Assets/Images/nav-bar-img.jpg')";
                </script>
            <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="197" >
                <div class="container-fluid" id="head_nav">
                    <div class="navbar-header">
	    <!--LOGO-->
	                   <a href="Index.php"><img id="Logo" class="img-rounded" src="assets/images/logo-bow.jpg"/></a>
                    </div>
                    
                </div>
            </nav>
            </div>
</head>  
   
<body >
     <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
   <div class="index_links">
       
       <ul>
          <i> <p style="text-align:center"><strong>Welcome to Baby and Me!!</strong></p> </i>
           <li>
           <a href="Users/">User Account</a> 
            <a href="Admin/">Admin Account</a>
           </li>
       </ul>
    </div>
   
</body>
<?php
  //  include ("footer.php")
?>

</html>