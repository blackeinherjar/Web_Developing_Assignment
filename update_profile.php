<?php
session_start();
$user_id = $_SESSION['user_id'];
require "connection.php";	

if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['birthday'])&& isset($_POST['contact_number'])&& isset($_POST['email'])&& isset($_POST['address'])&& isset($_POST['pass']))
{
					
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$birthday = $_POST['birthday'];
		$contact_number = $_POST['contact_number'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$pass = $_POST['pass'];
		
		$sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`birthday`='$birthday',`contact_number`='$contact_number',`email`='$email',`address`='$address',`pass`='$pass' WHERE `id`='$user_id'";
		
		if (mysqli_query($conn, $sql)) {
		
			header( "refresh:0; url= profile.php" );
			
			
			echo '<script language="javascript">';
			echo 'alert("Update Successful")';
			echo '</script>';
		
		
		
		} else {
			header( "refresh:0; url= profile.php" );
			echo '<script language="javascript">';
			echo 'alert("Update Failed,please try again")';
			echo '</script>';
		}

		mysqli_close($conn);
}














?>