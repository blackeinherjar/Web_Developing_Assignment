<?php
session_start();

require "connection.php";	
$customer_order_id = $_GET['customer_order_id'];
$product_id = $_GET['product_id'];

$sql_product = "SELECT * FROM `products` WHERE `id` = $product_id";
$sql_product_result = mysqli_query($conn,$sql_product);

$row = mysqli_fetch_array($sql_product_result,MYSQLI_ASSOC);

$current_unit = $row['unit'];

$current_unit = $current_unit+1;

$status = $row['status'];

//echo $status;


		$sql = "UPDATE `customer_order` SET `is_deleted`= 1 WHERE `id`='$customer_order_id'"; 


		if (mysqli_query($conn, $sql)) {
			
			
			if($status == "out of stock")
			{
					$sql_product_status = "UPDATE `products` SET `status`= 'In Stock' WHERE `id`='$product_id'"; 
					mysqli_query($conn, $sql_product_status);
			}
			
		
			$sql_product_unit_after_cancel = "UPDATE `products` SET `unit`= '$current_unit' WHERE `id`='$product_id'"; 
			mysqli_query($conn, $sql_product_unit_after_cancel);
		
			header( "refresh:0; url= customer_order.php" );
			echo '<script language="javascript">';
			echo 'alert("Order Canceled")';
			echo '</script>';
		
		
		
		} else {
			header( "refresh:0; url= customer_order.php" );
			echo '<script language="javascript">';
			echo 'alert("Error,please try again")';
			echo '</script>';
		}

		mysqli_close($conn);



?>