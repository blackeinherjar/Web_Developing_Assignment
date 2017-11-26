<?php session_start();?>
<!DOCTYPE html>
<html>

<?php 
		require "connection.php";	
		
		if(isset($_SESSION['login_role']))
		{
			
		$login_role = $_SESSION['login_role'];
		}
		$sql = "SELECT * FROM `products` WHERE `status`='In Stock'  ORDER BY `product_name` ASC";
		$result = mysqli_query($conn,$sql);
		
		
		
		
		
		$sql_out_of_stock = "SELECT * FROM `products` WHERE `status`='out of stock'  ORDER BY `product_name` ASC";
		$result_out_of_stock = mysqli_query($conn,$sql_out_of_stock);
		
		
		
		
		
		
?>

<head>

<title>HanHan Bookstore</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="animsition/dist/js/animsition.min.js" charset="utf-8"></script>
	<link href="animsition/dist/css/animsition.min.css" rel="stylesheet">
	<link href="src/css/login_page.css" rel="stylesheet">
	<script type="text/javascript" src="src/js/check_format.js"></script>  
	<link href="src/css/hover_effect.css" rel="stylesheet">
	<link href="src/css/products_layout.css" rel="stylesheet">
	<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
	
	
	<style>
		
		.status_title
		{
		
		font-weight:bold;
		}
		
		hr
		{
			height:1px;
			border:none;
			color:#333;
			background-color:#333;
		}
	
	</style>
	
	
</head>

<body>

<?php include "navbar.php";?>
<br/><br/><br/>
<h4 class="status_title">In Stock</h4>
<hr/>
<section class="products">

		<?php if(!isset($_GET['term'])): ?>
		<?php while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){   ?>
		<?php
		$id = $row['id'];
		$is_deleted = $row['is_deleted'];
		?>
		
		<?php if($is_deleted == 0):?>
		
		
		
		<div class="product-card" >
			<div class="product-image hovereffect"  style="height:auto;width:auto">
				<?php 
				$id = $row['id'];
				?>
	
				<img class="img-thumbnail" onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/<?php echo $row['image_name']; ?>">
				<div class="overlay">
					<h2 class="product-name"><?php echo $row['product_name'];?></h2>
					<a class="info" href="product_detail.php?id=<?php echo $id?>">Detail</a>
				</div>
			</div>
			
		    <div class="product-info" style="width: 200px;">
		      <h5 class="product-name"><?php echo $row['product_name'];?></h5>	  
		      <h6>
			  <?php echo $row['author'];?>
			  
			  
			  <?php if(isset($_SESSION['login_role'])):?>
			  <?php if($login_role == "admin"):?>
			  <form id="delete_btn" action="delete_product.php" method="get" onSubmit="return confirm('are you sure you want to delete this item?')">
			  <input type="hidden" name="id" value="<?php echo $id ?>">
			  <input type="hidden" name="is_deleted" value="<?php echo $is_deleted ?>">
			  
			  <button class="btn btn-danger btn-xs" type="submit">Delete</button>
			  </form>
			
			  <form id="edit_btn" action="edit_product.php" method="get">
			   <input type="hidden" name="id" value="<?php echo $id ?>">
			  <button class="btn btn-info btn-xs" type="submit">Edit</button>
			  </form>
			  
			  <?php endif; ?>	
			  <?php endif; ?>	
			  </h6>    
		    </div>
		 </div>
		 
		 
		 
		 <?php endif;?>
		 
		<?php }?>


<?php else:?>

	<?php 
		$term = mysqli_real_escape_string($conn,$_GET['term']);     
		$term_sql = "SELECT * FROM products WHERE product_name LIKE '%".$term."%' AND `status`='In Stock'"; 
		$term_query = mysqli_query($conn,$term_sql); 
	?>

	<?php while ($row = mysqli_fetch_array($term_query,MYSQLI_ASSOC)){   ?>

<div class="product-card" >
			<div class="product-image hovereffect"  style="height:200px;width:200px">
				<?php 
				$id = $row['id'];
				?>
	
				<img class="img-thumbnail" onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/<?php echo $row['image_name']; ?>">
				<div class="overlay">
					<h2 class="product-name"><?php echo $row['product_name'];?></h2>
					<a class="info" href="product_detail.php?id=<?php echo $id?>">Detail</a>
				</div>
			</div>
			
		    <div class="product-info" style="width: 200px;">
		      <h5 class="product-name"><?php echo $row['product_name'];?></h5>
			  
		      <h6>
			  <?php echo $row['author'];?>	
				  <?php if(isset($_SESSION['login_role'])):?>		
			  <?php if($login_role == "admin"):?>
			  <form id="delete_btn" action="delete_product.php" method="get" onSubmit="return confirm('are you sure you want to delete this item?')">
			  <input type="hidden" name="id" value="<?php echo $id ?>">
			  <input type="hidden" name="is_deleted" value="<?php echo $is_deleted ?>">
			  
			  <button type="submit">Delete</button>
			  </form>
			
			  <form id="edit_btn" action="edit_product.php" method="get">
			   <input type="hidden" name="id" value="<?php echo $id ?>">
			  <button type="submit">Edit</button>
			  </form>
			  
			  <?php endif; ?>	
			    <?php endif; ?>	
			  </h6>    
		    </div>
		 </div>
		<?php }?>
		
<?php endif;?>


</section>


<h4 class="status_title">Out Of Stock</h4>
<hr/>














<section class="products">

		<?php if(!isset($_GET['term'])): ?>
		<?php while ($row = mysqli_fetch_array($result_out_of_stock,MYSQLI_ASSOC)){   ?>
		<?php
		$id = $row['id'];
		$is_deleted = $row['is_deleted'];
		?>
		
		<?php if($is_deleted == 0):?>
		
		
		
		<div class="product-card" >
			<div class="product-image hovereffect"  style="height:auto;width:auto">
				<?php 
				$id = $row['id'];
				?>
	
				<img class="img-thumbnail" onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/<?php echo $row['image_name']; ?>">
				<div class="overlay">
					<h2 class="product-name"><?php echo $row['product_name'];?></h2>
					<a class="info" href="product_detail.php?id=<?php echo $id?>">Detail</a>
				</div>
			</div>
			
		    <div class="product-info" style="width: 200px;">
		      <h5 class="product-name"><?php echo $row['product_name'];?></h5>	  
		      <h6>
			  <?php echo $row['author'];?>
			  
			  
			  <?php if(isset($_SESSION['login_role'])):?>
			  <?php if($login_role == "admin"):?>
			  <form id="delete_btn" action="delete_product.php" method="get" onSubmit="return confirm('are you sure you want to delete this item?')">
			  <input type="hidden" name="id" value="<?php echo $id ?>">
			  <input type="hidden" name="is_deleted" value="<?php echo $is_deleted ?>">
			  
			  <button class="btn btn-danger btn-xs" type="submit">Delete</button>
			  </form>
			
			  <form id="edit_btn" action="edit_product.php" method="get">
			   <input type="hidden" name="id" value="<?php echo $id ?>">
			  <button class="btn btn-info btn-xs" type="submit">Edit</button>
			  </form>
			  
			  <?php endif; ?>	
			  <?php endif; ?>	
			  </h6>    
		    </div>
		 </div>
		 
		 
		 
		 <?php endif;?>
		 
		<?php }?>


<?php else:?>

	<?php 
		$term = mysqli_real_escape_string($conn,$_GET['term']);     
		$term_sql = "SELECT * FROM products WHERE product_name LIKE '%".$term."%' AND `status`='out of stock'"; 
		$term_query = mysqli_query($conn,$term_sql); 
	?>

	<?php while ($row = mysqli_fetch_array($term_query,MYSQLI_ASSOC)){   ?>

<div class="product-card" >
			<div class="product-image hovereffect"  style="height:200px;width:200px">
				<?php 
				$id = $row['id'];
				?>
	
				<img class="img-thumbnail" onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/<?php echo $row['image_name']; ?>">
				<div class="overlay">
					<h2 class="product-name"><?php echo $row['product_name'];?></h2>
					<a class="info" href="product_detail.php?id=<?php echo $id?>">Detail</a>
				</div>
			</div>
			
		    <div class="product-info" style="width: 200px;">
		      <h5 class="product-name"><?php echo $row['product_name'];?></h5>
			  
		      <h6>
			  <?php echo $row['author'];?>	
				  <?php if(isset($_SESSION['login_role'])):?>		
			  <?php if($login_role == "admin"):?>
			  <form id="delete_btn" action="delete_product.php" method="get" onSubmit="return confirm('are you sure you want to delete this item?')">
			  <input type="hidden" name="id" value="<?php echo $id ?>">
			  <input type="hidden" name="is_deleted" value="<?php echo $is_deleted ?>">
			  
			  <button type="submit">Delete</button>
			  </form>
			
			  <form id="edit_btn" action="edit_product.php" method="get">
			   <input type="hidden" name="id" value="<?php echo $id ?>">
			  <button type="submit">Edit</button>
			  </form>
			  
			  <?php endif; ?>	
			    <?php endif; ?>	
			  </h6>    
		    </div>
		 </div>
		<?php }?>
		
<?php endif;?>


</section>
















































<?php if(isset($_SESSION['login_role'])):?>
<?php if($login_role == "admin"):?>
<div id="Add_product_btn">
<a href="add_new_book.php"><button type="button" class="btn btn-warning btn-md">
      <span class="glyphicon glyphicon-upload"></span> Add Book
</button></a>
</div>
<?php endif;?>
<?php endif;?>
</body>

<script>


window.sr = ScrollReveal({ duration: 200 });
sr.reveal('.product-card', 200);

</script>




</html>