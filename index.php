<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HanHan Bookstore</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="animsition/dist/js/animsition.min.js" charset="utf-8"></script>
	<link href="animsition/dist/css/animsition.min.css" rel="stylesheet">
	<link href="src/css/login_page.css" rel="stylesheet">
	<script type="text/javascript" src="src/js/check_format.js"></script>  

</head>
<body>
<?php include "navbar.php";?>


<div class="container">
		<div id="login_form">
		<div class="" id="onload_animation">
			<br/>
			
			
				<form action="sign_up.php" name="create_account" method="post">
					<div class="form-group">
						<label for="first_name">First Name:</label>
						<input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" onblur="register_check_first_name()" 
						<?php if(isset($_SESSION['user_id'])):?>
						disabled
						<?php else:?>
						<?php endif;?>>
					</div>
					
					<div class="form-group">
						<label for="last_name">Last Name:</label>
						<input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" onblur="register_check_last_name()"
						<?php if(isset($_SESSION['user_id'])):?>
						disabled
						<?php else:?>
						<?php endif;?>>
					</div>
					
					<div class="form-group">
						<label for="address">Birthday:</label>
						<input type="date" class="form-control" id="birthday" placeholder="Enter Birthday" name="birthday" 
						<?php if(isset($_SESSION['user_id'])):?>
						disabled
						<?php else:?>
						<?php endif;?>>
					</div>
					
					<div class="form-group">
						<label for="contact_number">Contact Number:</label>
						<input type="text" class="form-control" id="contact_number" placeholder="Enter contact number" name="contact_number" maxlength="10" onblur="check_register_contact_number()" 
						<?php if(isset($_SESSION['user_id'])):?>
						disabled
						<?php else:?>
						<?php endif;?>>
					</div>
				
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" class="form-control" id="email" placeholder="Enter email" name="email" onblur="check_register_email()" 
						<?php if(isset($_SESSION['user_id'])):?>
						disabled
						<?php else:?>
						<?php endif;?>>
						
					</div>
					
					<div class="form-group">
						<label for="address">Address:</label>
						<input type="text" class="form-control" id="address" placeholder="Enter shipping address" name="address" onblur="" 
						<?php if(isset($_SESSION['user_id'])):?>
						disabled
						<?php else:?>
						<?php endif;?>>
						
					</div>
					
					<div class="form-group">
						<label for="pass">Password:</label>
						<input type="password" onkeyup="validate_pass_strength()" class="form-control" id="pass" placeholder="Enter password" name="pass"
						<?php if(isset($_SESSION['user_id'])):?>
						disabled
						<?php else:?>
						<?php endif;?>>Strength : <span id="pass_location">no strength</span>  
						
					</div>
					
					
					<button type="submit" class="btn btn-success" name="create_account_btn"
					<?php if(isset($_SESSION['user_id'])):?>
						disabled
						<?php else:?>
						<?php endif;?>>Create Account</button>
					
				</form>
				
				
				
				
				
				
				
		</div>		
		</div> 
	</div>
  
<?php 

//echo "<br/>";
//echo "<br/>";
//echo "</br></br></br></br></br>".$_SESSION['user_id'];
//echo $_SESSION['login_role'];
//echo $_SESSION['full_name'];



?>
  
  
<script>
var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

$(document).ready(function() {
	
	if(isChrome == true)
	{
	document.getElementById("onload_animation").className = "animsition";
	}
   
  $(".animsition").animsition({
    inClass: 'flip-in-y',
    outClass: 'flip-out-y',
    inDuration: 1500,
    outDuration: 800,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: true,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 5000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : false,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
  });
});

 function validate_pass_strength()
 {  

	var msg;
	if((hasNumber.test(document.create_account.pass.value) == true) && (document.create_account.pass.value.length>5))
	{
		msg = "strong";
	}else if(document.create_account.pass.value.length>5)
	{
		msg = "good";
	}
	else{  
		msg="poor";  
	}  
	document.getElementById('pass_location').innerText = msg;  
 }  


  

  
  

  
  

 </script>
	
	

</body>
</html>
