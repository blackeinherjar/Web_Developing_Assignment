<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "bookstore";
	
	
	$conn = mysqli_connect($servername, $username, $password,$database);
	
	
	if(!$conn)
	{
		die("connection error ".mysqli_connect_error);
	}
	//else
	//{
	//	echo '<script language="javascript">';
	//	echo 'console.log("connection successful")';
	//	echo '</script>';
		
	//}
	
	
	
	



?>