
<?php session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Book</title>
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

	


  <h2>Add Book</h2>
  
  
	  <div class="row">
	  <div class="col-sm-3">
	<img src="src/image/No_available_image.jpg" id='display_image' class="img-thumbnail">
	<form name="add_book" class="form-horizontal" action="upload_book_image.php" method="post" enctype="multipart/form-data" onSubmit="return confirm('are you sure you want to submit ? ')">
    
    <input type="file" accept='image/*' id="upload_image" name="file_img" onchange="openFile(this)"/>
   
</div>

	<div class="col-sm-9" >
	
	
     <div class="form-group">
      <label for="product_name">Product name:</label>
      <input type="product_name" class="form-control" id="product_name" placeholder="Enter product name" name="product_name">
    </div>
	
    <div class="form-group">
      <label for="product_price">Product price:</label>
      <input type="product_price" class="form-control" id="product_price" placeholder="Enter product price (without RM)" name="product_price" onblur="check_price()" >
    </div>
	
	<div class="form-group">
      <label for="unit">Unit:</label>
      <input type="unit" class="form-control" id="unit" placeholder="Enter number of unit" name="unit" onblur="check_unit()"/>
	  
	  
    </div>
	
	<div class="form-group">
      <label for="author">Author:</label>
      <input type="author" class="form-control" id="author" placeholder="Enter author name" name="author" onblur="check_author_name()"/>
	  
	  
    </div>
	
	<div class="form-group">
      <label for="description">Description:</label>
	  <br/>
      <textarea name="description" rows="8" style="width:600px;margin:0px auto;"></textarea>
	  <br/>  
	  <button id="upload_btn" type="submit" class="btn btn-success" name="upload_btn">Submit</button>
    </div>  
	
    </div>
    </div>
  </div>
   
</form>
</div>

</body>
</html>






























