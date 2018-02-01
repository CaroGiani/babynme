<?php
require_once "to_include.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include ("header-main.php");
?>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <script>
        document.body.style.backgroundImage="url('Assets/Images/newback.jpg')";
    </script>
    <div class="main-body">
        <div class="forms"> 
       
         <form action="post" name="registration" id="reg">
       <h2>Get In Touch</h2>
           
		<p>
			<label for="name" class="floatLabel">And you are?</label>
			<input id="u_name" name="" type="text" placeholder="Doe, John" /required>
		</p>
		<p>
			<label for="phone" class="floatLabel">Can we call you?</label>
			<input id="tell" name="tell" type="text" placeholder="+254722xxxxxx" /required>
			
		</p>
		<p>
			<label for="email" class="floatLabel">We would love to email sometime</label>
			<input id="mail" name="mail" type="text" placeholder="john@doe.com" /required>
			
		</p>
        <p>
			<label for="email" class="floatLabel">Leave us a message</label>
			<textarea id="mesg" name="messg" /required> </textarea>
          
			
		</p>
		<p>
			<input type="submit" value="Send Message" id="submit">
		</p>
</form>
        </div>
         
        </div>
        
        
    
</body>
<?php
    include ("includes/footer.php");
?>
</html>