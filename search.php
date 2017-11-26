<?php
	session_start(); 
	require "connection.php";	


	
		$term = mysqli_real_escape_string($conn,$_GET['term']);     
		$sql = "SELECT * FROM products WHERE product_name LIKE '%".$term."%'"; 
		$r_query = mysqli_query($conn,$sql); 

        

?>