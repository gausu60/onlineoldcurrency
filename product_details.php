<?php
session_start();
require 'connection/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sns
	</title>
	<!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
</head>
<body>
	<?php include('includes/header.php');?>
	<?php include('includes/navigation.php');?>
	
	<ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li class="active">Preview</li>
    </ul>
    <?php
    if (isset($_GET['id'])) {
    	$id = $_GET['id'];
    	$sql = "SELECT * from coins_notes where id='$id'  ";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0){
		foreach ($results as $result) {?>
			<div class="row-fluid">
			<div class="span5">
			<div id="myCarousel" class="carousel slide cntr">
                <div class="carousel-inner">
                  <div class="item">
                   <a href="#"> <img src="admin/images/coinsimages/<?php echo htmlentities($result->img1);?>" alt="" style="width:100%"></a>
                  </div>
                  <div class="item active">
                     <a href="#"> <img src="admin/images/coinsimages/<?php echo htmlentities($result->img1);?>" alt="" style="width:100%"></a>
                  </div>
                  
                </div>
            </div>
			</div>
			<div class="span7">
				<h3><?php echo htmlentities($result->product_title); ?> [&#x20b9;  <?php echo htmlentities($result->price); ?>]</h3>
				<hr class="soft">
				
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>&#x20b9;  <?php echo htmlentities($result->price); ?></span></label>
					<div class="controls">
					<input type="number" class="span6" placeholder="Qty." min="1" max="10">
					</div>
				  </div>
				
				  <div class="control-group">
					<label class="control-label"><span></span></label>
					
				  </div>
				  <h4>&#x20b9;  <?php echo htmlentities($result->stock); ?> items in stock</h4>
				  <p><?php echo htmlentities($result->description); ?>
				  </p>
		<?php }
		
	}?>
    <p>
    
				  <button type="submit" class="shopBtn"><a href="cart.php?id=<?php echo htmlentities($result->id); ?>"><span class=" icon-shopping-cart"></span> Add to cart </a></button>
				</p></form>
			</div>
			</div>
     	
     <?php }?> 
    



</body>
</html>