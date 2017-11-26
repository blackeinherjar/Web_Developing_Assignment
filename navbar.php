<nav class="navbar navbar-inverse navbar-fixed-top">

<div class="container-fluid">
    <div class="navbar-header">
     	 <a href="index.php" class="navbar-brand">Home</a> 
     	  <a href="products.php" class="navbar-brand">Store</a> 
    </div>

	<?php 
	$url_check = $_SERVER['REQUEST_URI'];
	?>
 
  
	<?php if (strpos($url_check,"products.php") === false):?>	
	<ul class="nav navbar-nav navbar-left" style="visibility: hidden">	
	
	<?php else:?>
	<ul class="nav navbar-nav navbar-left">
	<?php endif; ?>
	

<li> 
<form action="" method="get" class="form-inline my-2 my-lg-0" style="margin-top:8px">
      <input class="form-control mr-sm-2" name="term" type="text" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
</li>
</ul>

<ul class="nav navbar-nav navbar-right">


<?php if (isset($_SESSION['user_id'])):?>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		
		   <?php if($_SESSION['login_role'] == "admin"):?>
		    <li><a href="customer_order.php">Customer Order</a></li>
		   <?php else:?>
          <li><a href="customer_order.php">Your Order</a></li>
		  <?php endif;?>
		  
		  
          <li><a href="profile.php">Your Profile</a></li>
          <li>

          	<a href="log_out.php">Sign Out</a>

          </li>
        </ul>
      </li>  
    

	
	
<?php else:?>

    

	
	


<form method="post" action="login.php" class="navbar-form navbar-right" name="login">
	 <div class="form-group">
		<input type="text" class="form-control" id="email" placeholder="Enter email" name="email" onblur="check_email_format()" >
      </div>
	  <div class="form-group">
		<input type="text" class="form-control" id="pass" placeholder="Enter password" name="pass">
      </div>
	 <button type="submit" class="btn btn-primary" name="submit_btn">Login</button>
	</form>



<?php endif; ?>	
</ul>

	
	
	</div>
	
	
</nav>
