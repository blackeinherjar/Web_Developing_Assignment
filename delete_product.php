<?php 

require "connection.php";

$id = $_GET['id'];
$is_deleted = $_GET['is_deleted'];

$sql = "UPDATE `products` SET `is_deleted`='1' WHERE `id`='$id'";

if (mysqli_query($conn,$sql)) 
{
		header( "refresh:0; url= products.php" );	
		echo '<script language="javascript">';
		echo 'alert("Delete Successful")';
		echo '</script>';
			
}
else
{
		header( "refresh:0; url= products.php" );
		echo '<script language="javascript">';
		echo 'alert("Delete Failed,please try again")';			
		echo '</script>';
}

?>