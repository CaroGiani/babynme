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
                <div class="container-fluid">
                    <div class="navbar-header">
	    <!--LOGO-->
	                   <a href="Index.php"><img id="Logo" class="img-rounded" src="assets/images/logo-bow.jpg"/></a>
                    </div>
	 <!--MENU BAR-->
                    <div id="menu" style=" background-color:black;">
                     <ul class="nav navbar-nav" >
                            <li><a class="active" href="Landing-Page.php">HOME</a></li>
                           
			                
			            </ul>
			            <ul class="nav navbar-nav navbar-right">
                        <li><a href="sign-up.php"><span class="glyphicon glyphicon-user"></span> SIGN UP</a></li>
                        <li><a href="log-in.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
                        </ul>
                    </div>
                       
                    
    <!--MENU BAR END-->
                </div>
            </nav>
            </div>
</head>  
   
<body data-spy="scroll" data-target=".navbar" data-offset="50" data-target="#side-menu" data-offset="15">
    <section  class="demo" id="section01">
     <div id="index">
   
            <script>
                   document.getElementById("section01").style.backgroundImage = "url('Assets/Images/Bnm.001.jpeg')";
                    document.getElementById("section01").style.backgroundRepeat = "no-repeat";
                    document.getElementById("section01").style.backgroundSize = "cover";
                </script>
          <a href="#section02"><span></span>Scroll</a>
    </div>
    
    </section>
     <section class="demo1" id="section02">
     <div id="index-info">
             <script>
                document.getElementById("section02").style.backgroundImage = "url('Assets/Images/6531_378922392.jpg')";
                document.getElementById("section02").style.backgroundRepeat = "no-repeat";
                document.getElementById("section02").style.backgroundSize = "cover";
                </script>
        <b><i>Baby and Me</i></b><br> The number 1 pregnacy companion for all mothers!<br>
         We know how cluttered the internet can be with info about your pregnancy. <br>
        Thats why we bring you Your number one site on all your baby related  questions!<br>
         Stay upto date with all the key fact you need on!
         Let us take this journey with you!
        <div class="sec02list">
          <ul >
                <li> <i>How your baby is doing.</i> </li> 
                <li><i> Are your eating the right  foods!</i> </li>
                <li> <i>Feeling sick lately? Find out what to do </i> </li>
                <li> <i> Download reports on how things have been going.</i> </li>
                <li> <i> Let us know what your think about us. </i>  </li>
            </ul> 
        </div>
        
        <a href="#section01"><span></span>Scroll</a>
    </div>
    </section>  
   
</body>
<?php
    include ("includes/footer.php")
?>

</html>