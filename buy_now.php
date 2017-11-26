<?php
ob_start();
require "connection.php";	

$product_id = $_GET['product_id'];
$user_id = $_GET['user_id'];

$sql_product = "SELECT * FROM `products` WHERE `id` = $product_id";
$sql_product_result = mysqli_query($conn,$sql_product);

$row = mysqli_fetch_array($sql_product_result,MYSQLI_ASSOC);

$current_unit = $row['unit'];

$current_unit = $current_unit-1;


$sql_product_after_buy = "UPDATE `products` SET `unit` = $current_unit WHERE `id`=$product_id";

mysqli_query($conn, $sql_product_after_buy);

if($current_unit == 0)
{
	$sql_product_after_buy = "UPDATE `products` SET `status` = 'out of stock' WHERE `id`=$product_id";

	mysqli_query($conn, $sql_product_after_buy);
}
$sql = "INSERT INTO customer_order (`product_id`, `user_id`) VALUES ('$product_id', '$user_id')";

if (mysqli_query($conn, $sql)) {
	
	echo '<script language="javascript">';
	echo 'console.log("New record created successfully")';
	echo '</script>';
	header( "refresh:0; url= customer_order.php" );
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>