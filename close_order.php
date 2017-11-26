<?php
session_start();

require "connection.php";	
$customer_order_id = $_GET['customer_order_id'];

date_default_timezone_set("Asia/Kuala_Lumpur");
$current_time = date("Y-m-d H:i:s");



			$sql = "UPDATE `customer_order` SET `status`='close',`complete_date`='$current_time' WHERE `id`='$customer_order_id'"; 


			if (mysqli_query($conn, $sql)) {
		
			header( "refresh:0; url= customer_order.php" );
			
			
			echo '<script language="javascript">';
			echo 'alert("Order Closed")';
			echo '</script>';
		
		
		
		} else {
			header( "refresh:0; url= customer_order.php" );
			echo '<script language="javascript">';
			echo 'alert("Error,please try again")';
			echo '</script>';
		}

		mysqli_close($conn);



?>