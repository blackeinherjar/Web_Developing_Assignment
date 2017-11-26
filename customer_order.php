<?php session_start();


require "connection.php";	

$id = $_SESSION['user_id'];
$login_role = $_SESSION['login_role'];

if($login_role == "user")
{
$sql_pending_order = "SELECT customer_order.id,customer_order.product_id,customer_order.user_id,customer_order.status,customer_order.date,products.product_name,products.author FROM customer_order JOIN products on products.id = customer_order.product_id AND customer_order.user_id = $id WHERE customer_order.status='pending' AND customer_order.is_deleted = 0 ORDER BY customer_order.date ASC" ;
$sql_close_order = "SELECT customer_order.id,customer_order.product_id,customer_order.user_id,customer_order.status,customer_order.date,customer_order.complete_date,products.product_name,products.author FROM customer_order JOIN products on products.id = customer_order.product_id  AND customer_order.user_id = $id WHERE customer_order.status='close' AND customer_order.is_deleted = 0 ORDER BY customer_order.date ASC" ;

}
else
{
$sql_pending_order = "SELECT customer_order.id,customer_order.product_id,customer_order.user_id,customer_order.status,customer_order.date,products.product_name,products.author FROM customer_order JOIN products on products.id = customer_order.product_id WHERE customer_order.status='pending' AND customer_order.is_deleted = 0 ORDER BY customer_order.date ASC" ;
$sql_close_order = "SELECT customer_order.id,customer_order.product_id,customer_order.user_id,customer_order.status,customer_order.date,customer_order.complete_date,products.product_name,products.author FROM customer_order JOIN products on products.id = customer_order.product_id WHERE customer_order.status='close' AND customer_order.is_deleted = 0 ORDER BY customer_order.date ASC" ;
}

$result_pending_order = mysqli_query($conn,$sql_pending_order);
$result_close_order = mysqli_query($conn,$sql_close_order);

date_default_timezone_set("Asia/Kuala_Lumpur");
$current_time = date("Y-m-d H:i:s");

$check = date("H:i:s");

echo $check;



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HanHan Bookstore</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<?php include "navbar.php";?>	
<br/><br/>
<div class="container">
  <h2>Purchase Status</h2>
   <h4><i>Pending Order</i></h4>
  <table class="table">
    <thead>
      <tr>
	   <th>ID</th>
		<th>User ID</th>
        <th>Status</th>
		
        <th>Book Name</th>
        <th>Author</th>
		<th>Date Created</th>
      </tr>
    </thead>
    <tbody>
	
	<?php while ($row = mysqli_fetch_assoc($result_pending_order)){   ?>
	
      <tr>
		<?php 
		$product_id = $row['product_id'];
		$customer_order_id = $row['id'];	
		?>
	   <td><?php echo $row['id']?></td>
	   <td><?php echo $row['user_id']?></td>
		<td><?php echo $row['status']?></td>
        <td><?php echo $row['product_name']?></td>
        <td><?php echo $row['author']?></td>
		 <td><?php echo $row['date']?></td>
		
		<td><a href="Contact_Sales.php?product_id=<?php echo $product_id?>&customer_order_id=<?php echo $customer_order_id?>&login_role=<?php echo $login_role?>"><font color="orange">Contact Sales Admin</font></a></td>
		 
		</tr>
	   <?php }?>

    </tbody>
  </table>
 
   <h4><i>Close Order</i></h4>
   
    <button type="button" class="btn btn-warning btn-xs" data-toggle="collapse" data-target="#show_close_order">Show Completed</button>
  <div id="show_close_order" class="collapse">
   

   
  <table class="table">
    <thead>
      <tr>
	   <th>ID</th>
	<th>User ID</th>
        <th>Status</th>
        <th>Book Name</th>
        <th>Author</th>
		<th>Date Created</th>
		<th>Date Completed</th>
      </tr>
    </thead>
    <tbody>
	
	<?php while ($row = mysqli_fetch_assoc($result_close_order)){   ?>
	
      <tr>
		<?php 
		$product_id = $row['product_id'];
		$customer_order_id = $row['id'];
		
		?>
	   <td><?php echo $row['id']?></td>
	   <td><?php echo $row['user_id']?></td>
			<td><?php echo $row['status']?></td>
	
        <td><?php echo $row['product_name']?></td>
        <td><?php echo $row['author']?></td>
		 <td><?php echo $row['date']?></td>
		  <td><?php echo $row['complete_date']?></td>

		 <td></td>
		<td><a href="Contact_Sales.php?product_id=<?php echo $product_id?>&customer_order_id=<?php echo $customer_order_id?>&login_role=<?php echo $login_role?>"><font color="orange">View History</font></a></td>	
		
	  </tr>
	  <?php }?>
	  
	   
     
    </tbody>
  </table>
    </div>
  
</div>

</body>
</html>
