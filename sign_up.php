<?php
	session_start(); 
	require "connection.php";

	
	if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['birthday']) && !empty($_POST['contact_number']) && !empty($_POST['email']) && !empty($_POST['address'])&& !empty($_POST['pass']))
	{
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];	
			$birthday_not_convert = $_POST['birthday'];
			
			$birthday = mysqli_real_escape_string($conn,$birthday_not_convert);
			
			
			$contact_number = $_POST['contact_number'];	
			$email = $_POST['email'];
			$address = $_POST['address'];	
			$pass = $_POST['pass'];	
			
			
			
			
			$query_email = "SELECT `email` FROM `users` WHERE `email`='$email'";
			$query_run_email = mysqli_query($conn,$query_email);

			if(!filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
			{
				if (mysqli_num_rows($query_run_email))
				{
					header( "refresh:0; url= index.php" );
					echo '<script language="javascript">';
					echo 'alert("try again,email already exists")';
					echo '</script>';
				}
				else
				{
					$sql = "INSERT INTO users(`email`, `first_name`,`last_name`,`pass`,`birthday`,`contact_number`,`address`)VALUES ('$email', '$first_name','$last_name', '$pass', '$birthday', '$contact_number', '$address')";		
					mysqli_query($conn, $sql);
					
					header( "refresh:0; url= index.php" );
					echo '<script language="javascript">';
					echo 'alert("Account created successful")';
					echo '</script>';
				}
			}else
			{			
				header( "refresh:0; url= index.php" );
				echo '<script language="javascript">';
				echo 'alert("email format wrong,example : test@example.c")';
				echo '</script>';
			}
			
			
	}else
	{
				header( "refresh:0; url= index.php" );
				echo '<script language="javascript">';
				echo 'alert("account created failed,please fill in the require information")';
				echo '</script>';
	}		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
		
?>