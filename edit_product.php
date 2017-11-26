
<?php 

session_start();
require "connection.php";


$id = $_GET['id'];

$sql = "SELECT * FROM `products` WHERE `id`='$id'";

$result = mysqli_query($conn,$sql);

$sql = "SELECT * FROM `products` WHERE `id`='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$product_name = $row['product_name'];
$image_name = $row['image_name'];
$product_price = $row['product_price'];
$status = $row['status'];
$unit = $row['unit'];
$author = $row['author'];
$description = $row['description'];
	

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
  <script type="text/javascript" src="src/js/add_book_format.js"></script>  
  <script type="text/javascript" src="src/css/add_book_style.css"></script>  
 

  
  
</head>
<body>
<?php include "navbar.php";?>
<br/><br/>
<div class="container">

	


  <h2>Edit Book</h2>
  
  
	  <div class="row">
	  <div class="col-sm-3">
	<img onerror="this.src = 'src/image/No_available_image.jpg'" src="src/image/<?php echo $image_name?>" id='display_image' class="img-thumbnail" style="width:250px;height:250px">
	<form name="update_book" class="form-horizontal" action="update_product.php" method="post" enctype="multipart/form-data" onSubmit="return confirm('are you sure you want to submit ? ')">
    
    <input type="file" accept='image/*' id="upload_image" name="file_img" onchange="openFile(this)"/>
   
</div>

	<div class="col-sm-9" >
	
	
     <div class="form-group">
      <label for="product_name">Product name:</label>
      <input type="product_name" class="form-control" id="product_name" value="<?php echo $product_name ?>" name="product_name">
    </div>
	
    <div class="form-group">
      <label for="product_price">Product price:</label>
      <input type="product_price" class="form-control" id="product_price" value="<?php echo $product_price ?>" name="product_price" onblur="check_price()" >
    </div>
	
	<div class="form-group">
      <label for="unit">Unit:</label>
      <input type="unit" class="form-control" id="unit" value="<?php echo $unit ?>" name="unit" onblur="check_unit()"/>
	  
	  
    </div>
	
	<div class="form-group">
      <label for="author">Author:</label>
      <input type="author" class="form-control" id="author" value="<?php echo $author ?>" name="author" onblur="check_author_name()"/>
	  
	  
    </div>
	
	<div class="form-group">
      <label for="description">Description:</label>
	  <br/>
      <textarea name="description" rows="8" style="width:600px;margin:0px auto;"><?php echo $description?></textarea>
	  <br/>  
	  <input type="hidden" name="id" value="<?php echo $id ?>">
	  <button id="update_btn" type="submit" class="btn btn-success" name="update_btn">Update</button>
	  

	 <a href="http://localhost/Web_Developing_Assignment/products.php" class="btn btn-danger" role="button">Back</a>
	 
    </div>  
	
    </div>
    </div>
  </div>
   
</form>
</div>

</body>
</html>






























