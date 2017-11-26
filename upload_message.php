<?php
ob_start();
session_start();
require "connection.php";	

//if(isset($_POST['post_message']))
//{
	
//}

$customer_order_id = $_POST['customer_order_id'];
//$post_message = htmlspecialchars($_POST['post_message']);


$post_message = $_POST['post_message'];
$product_id = $_POST['product_id'];

if(isset($_POST['login_role']))
{
    $login_role = $_POST['login_role'];
}



$full_name = $_SESSION['full_name'];

$is_readed = 0;
if($login_role == 'admin')
{
	$is_readed = 1;
}


$sql = "INSERT INTO message (`customer_order_id`, `post_message`,`role`,`full_name`,`is_readed`) VALUES ('$customer_order_id','$post_message','$login_role','$full_name','$is_readed')";

if (mysqli_query($conn, $sql)) {
	
	echo '<script language="javascript">';
	echo 'console.log("New record created successfully")';
	echo '</script>';
	header( "refresh:0; url= Contact_Sales.php?product_id=$product_id&customer_order_id=$customer_order_id&login_role=$login_role" );
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>