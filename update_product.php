<?php

	require "connection.php";
	$id = $_POST['id'];

	if(isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['unit']) && isset($_POST['author']) && isset($_POST['description']))
	{
		$product_name = $_POST['product_name'];
		$product_price = $_POST['product_price'];
		$unit = $_POST['unit'];	
		$author = $_POST['author'];	
		$description = $_POST['description'];	
		if(!isset($_FILES['file_img']) || $_FILES['file_img']['error'] == UPLOAD_ERR_NO_FILE)
		{
		$sql = "UPDATE `products` SET `product_name`='$product_name',`product_price`='$product_price',`unit`='$unit',`author`='$author',`description`='$description' WHERE `id`='$id'";
		}
		else
		{
		$filetmp = $_FILES["file_img"]["tmp_name"];
		$filename = $_FILES["file_img"]["name"];
		$filetype = $_FILES["file_img"]["type"];
		$tmp   = explode('.', $filename);
		$extension = end($tmp);
		
		$new_file_name = $id.".".$extension;
		$filepath = "src/image/".$id.".".$extension;
		move_uploaded_file($filetmp,$filepath);
		
		
		$sql = "UPDATE `products` SET `product_name`='$product_name',`image_name`='$new_file_name',`product_price`='$product_price',`unit`='$unit',`author`='$author',`description`='$description' WHERE `id`='$id'";	
		}
		
		
		if (mysqli_query($conn, $sql)) {
		
			header( "refresh:0; url= products.php" );	
			echo '<script language="javascript">';
			echo 'alert("Update Successful")';
			echo '</script>';
		
		
		
		} else {
			header( "refresh:0; url= edit_product.php" );
			echo '<script language="javascript">';
			echo 'alert("Update Failed,please try again")';
			echo '</script>';
		}

		
		
		
	}


?>