<?php
	session_start();
	require "connection.php";	
	$product_id = $_GET['product_id'];
	$customer_order_id = $_GET['customer_order_id'];
	$sql = "SELECT * FROM `products` WHERE `id`='$product_id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$image_name = $row['image_name'];
	$product_price = $row['product_price'];
	$status = $row['status'];
    $unit = $row['unit'];
	$product_name = $row['product_name'];
	$description = $row['description'];
	$author = $row['author'];	
	$user_id = $_SESSION['user_id'];
	$login_role = $_SESSION['login_role'];
	
?>

<!DOCTYPE html>
<html>
<head>


<title>HanHan Bookstore</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="src/css/product_detail.css">
</head>



<style>
.control_btn *{
	display: inline;
	}
	

</style>

<body>
		
<?php include "navbar.php";?>

<br/><br/>
<div class="container-fluid">
  <h1><?php echo $product_name; ?></h1>
  
  <div class="row">
    <div class="col-sm-3" style="background-color:white;">	
	<img onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/<?php echo $image_name; ?>" width="300" height="300" id="product_image" style="width:300px;height:300px;">
	</div>
    <div class="col-sm-9">	
	
	
	
	<h2><label>Price : </label><span>RM <?php echo $product_price; ?></span></h2>
	<h2><label>Paid Status: </label><span>Not yet paid</span></h2>
	<h2><label>Stock Available : </label><span><?php echo $unit; ?></span></h2>
	<h2><label>Author : </label><span><?php echo $author; ?></span></h2>
	
	
	<?php if($login_role == "admin"):?>
	
	<div class="control_btn">
	<form action="close_order.php" name="close_order" method="GET"  onSubmit="return confirm('are you sure you want to close this item ?')" >
	<input type="hidden" name="customer_order_id" value="<?php echo $customer_order_id ?>">	
	<button type="submit" class="btn btn-success">Close Order</button>
		
	</form>
	
	<form action="cancel_order.php" name="cancel_order"  method="GET"  onSubmit="return confirm('are you sure you want to cancel this order ?')">
	<input type="hidden" name="customer_order_id" value="<?php echo $customer_order_id ?>">	
	<input type="hidden" name="product_id" value="<?php echo $product_id ?>">	
	<button type="submit" class="btn btn-warning">Cancel Order</button>
	</form>
	</div>
	
	<?php endif;?>
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
  </div>
  
  <h2>Message</h2>
  <hr style="border: 1px solid #000000">
   
   
   
   <?php 
    $sql_message = "SELECT `post_message`,`post_date`,`role`,`full_name` FROM message WHERE `customer_order_id`=$customer_order_id ORDER BY `post_date` ASC";
   $sql_message_result = mysqli_query($conn,$sql_message);
   
   ?>
   
   
   <?php while ($row = mysqli_fetch_array($sql_message_result,MYSQLI_ASSOC)){   ?>
   
   
   <div class="discussion_item"  style="display:flex;margin-bottom:5px;">
	
		<div class="item_details" style="display:inline-block;margin-left:3px;flex-grow:1;vertical-align:top;">
			<div class="item_header" style="padding-bottom:1px;border-bottom:1px solid black;">
				<div class="item_date" style="float:right;font-size:12px;"><?php echo $row['post_date']?></div>
				
				<?php if($row['role'] == "user"):?>	
				<span class="member_name" style="color:green"><?php echo $row['full_name']?></span>
				<?php else:?>	
				<span class="member_name" style="color:blue"><?php echo "Sales Admin"?></span>
				<?php endif;?>
				
			</div>
			<div class="message" style="margin-top:3px;">
			
			
			<?php echo $row['post_message']?>
					
			</div>
		</div>
	</div>

<br/>
	<?php }?>
    
 
   <div style="width:610px;margin:6px auto 6px auto;">
	<a name="post-message"></a>
	<div style="margin-left:5px;margin-top:2px;"><h4 style="color:black;">New Message</h4></div>
	<form action="upload_message.php" method="post" style="text-align:center;">
				<textarea name="post_message" rows="8" style="width:600px;margin:0px auto;"></textarea>
				<input type="hidden" name="login_role" value="<?php echo $login_role ?>" >
				<input type="hidden" name="customer_order_id" value="<?php echo $customer_order_id ?>" >
				<input type="hidden" name="product_id" value="<?php echo $product_id  ?>" >
				<p ><input type="submit" name="submit" class="btn btn-success" value="post message" /></p>
							
	</form>
	</div>
   <?php 
   
   //echo "the login role is ".$login_role."<br/>";
   // echo "the product id is ".$product_id."<br/>";
  // echo "the customer order id is ".$customer_order_id."<br/>";
   
   
   ?>
  

</div>


</body>
</html>