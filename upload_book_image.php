<?php

require "connection.php";

if(isset($_POST['upload_btn']))
{
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$unit = $_POST['unit'];	
	$author = $_POST['author'];	
	$description = $_POST['description'];	
		
	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	
	
	
	$tmp   = explode('.', $filename);
	$extension = end($tmp);

	
	
	$sql = "INSERT INTO products (`product_name`, `image_name`,`product_price`,`unit`,`author`,`description`)VALUES ('$product_name', '$filename','$product_price', '$unit', '$author', '$description')";		
	mysqli_query($conn, $sql);		
	$last_id = mysqli_insert_id($conn);
	
	$new_file_name = $last_id.".".$extension;
	$filepath = "src/image/".$last_id.".".$extension;
	move_uploaded_file($filetmp,$filepath);
	

	
	$sql_update = "UPDATE `products` SET `image_name` = '$new_file_name' WHERE `id` = '$last_id'";
	mysqli_query($conn, $sql_update);
	
	header( "refresh:0; url= products.php" );
	echo '<script language="javascript">';
	echo 'alert("New book added successful")';
	echo '</script>';
	
	
}
else
{
	header( "refresh:0; url= add_new_book.php" );
	echo '<script language="javascript">';
	echo 'alert("New book added failed")';
	echo '</script>';
}













?>