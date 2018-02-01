<head>
    <meta charset="utf-8">
    <!--Mobile-first styles are part of the core framework--> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="Assets/Images/favicon.PNG" >
    <link rel="stylesheet" href="Assets/Style/Style.css"> 
    <link rel="stylesheet" href="Assets/Style/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="Assets/Style/jquery-3.1.1.min.js"></script>
    <script src="Assets/Style/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="Assets/Style/sign-up.css">
    <script  src="Assets/Style/validate.js"></script>
	<!--<script src="functions/functions.js"></script>-->
	<script>
	function getDate(){
			
			var s_date=document.getElementById("d_ent").value;
			var comp=s_date.setMonth(s_date.getMonth() +9);
			if(s_date!=""){
				document.getElementById("d_send").value=comp;
			}
			else{
				var err="WHEN WAS YOUR LAST PERIOD?"
				document.getElementById("d_send").value= err;
			}	
}
</script>
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
                            <li><a href="set-personal-details.php">PROFILE</a></li>
                            
			            </ul>
			            <ul class="nav navbar-nav navbar-right">
                            <li><a href="?action=signout"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
                        </ul>
                    </div>
                       
                    
    <!--MENU BAR END-->
                </div>
            </nav>
            </div>
</head>