<?php session_start();

	$product_id = $_GET['id'];
	require "connection.php";	
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
	
	
	if (isset($_SESSION['login_role']))
	{
		$login_role = $_SESSION['login_role'];
	}
	
	
	
	
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
	<h2><label>Stock Available : </label><span><?php echo $unit; ?></span></h2>
	<h2><label>Author : </label><span><?php echo $author; ?></span></h2>
	
	
	<?php if (isset($user_id)):?>
	
	<form action="buy_now.php" name="buy_book" method="GET"  onSubmit="return confirm('are you sure you want to purchase this item?')" >
	
	<input type="hidden" name="product_id" value="<?php echo $product_id ?>" >
	<input type="hidden" name="user_id" value="<?php echo $user_id ?>" >
	
		
		
		<?php if($login_role == "user"):?>
			<?php if ($status == "In Stock"):?>
				<button type="submit"class="btn btn-warning">Buy Now</button>
			<?php else:?>
				<button type="button" disabled="true" class="btn btn-warning">out of stock</button>
			<?php endif; ?>	
		<?php endif; ?>	
		
	</form>

	
	<?php else:?>
	Please login to purchase the item
	<?php endif; ?>	
	
	
	
	</div>
  </div>
  
  <h2>Book Description</h2>
  <hr style="border: 1px solid #000000">
   <div style="font-size:20px;">
   <?php echo $description?>
   </div>

</div>







<script>

	
	
	
	


	
	
	
	
	
	
</script>

</body>
</html>