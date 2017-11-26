<?php
	session_start(); 
	require "connection.php";	
	
	

	if(!empty($_POST['email']) && !empty($_POST['pass']) )
	{
		$res = array();
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$sql = "SELECT `id`,`email`,`role`,`pass`,`first_name`,`last_name` FROM `users` WHERE `email`='$email' && `pass`='$pass' ";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		
		$id = $row['id'];
		$login_role = $row['role'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		
		
		if($row['email'] == $email && $row['pass'] == $pass)
		{		
			
			$full_name = $first_name." ".$last_name;
			$_SESSION['user_id'] = $id;
			$_SESSION['login_role'] = $login_role;
			$_SESSION['full_name'] = $full_name;
			
			if($row['role'] == "user")
			{
				//header('location:products.php');
				header( "refresh:0; url= products.php" );	
				echo '<script language="javascript">';
				echo 'alert("Login Successful")';
				echo '</script>';
		
				//$res['msg']    = 'login successful';	
				//$res['name'] = $full_name;
				//$res['id'] = $id;
			}
			
			if($row['role'] == "admin")
			{
				header( "refresh:0; url= products.php" );	
				echo '<script language="javascript">';
				echo 'alert("Login Successful")';
				echo '</script>';
			
			}
			
			
			
			
		}
		else
		{
			//header('location:index.php');
			
			header( "refresh:0; url= index.php" );
			echo '<script language="javascript">';
			echo 'alert("Login Failed")';
			echo '</script>';
		}
	}
	else
	{
			//header('location:index.php');
			header( "refresh:0; url= index.php" );
			echo '<script language="javascript">';
			echo 'alert("No login data... ")';
			echo '</script>';
	}	

	//echo json_encode($res);	
	
?>