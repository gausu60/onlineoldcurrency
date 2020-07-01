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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
	<div id="message"></div>
	<form class="product-form form-submit" method="post" action="action.php">
		<ul class="thumbnails">
	<?php
	$sql = $sql = "SELECT * from coins_notes where stock>0";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ); 
	if($query->rowCount() > 0){
		foreach($results as $result){ ?>
			<li class="span4">
			  <div class="thumbnail" style="width: 200px; height: 250px" >
				<a class="zoomTool" href="product_details.php?id=<?php echo htmlentities($result->id); ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<img src="admin/images/coinsimages/<?php echo htmlentities($result->img1); ?>" alt="">
				<div class="caption cntr">
					<span><?php echo htmlentities($result->product_id); ?></span>
					<h4><?php echo htmlentities($result->product_title); ?></h4>
					<p><?php echo htmlentities($result->description); ?></p>
					<p><strong> &#x20b9;  <?php echo htmlentities(number_format($result->price)); ?></strong></p>
						<input type="hidden" class="cid" name="" value="<?php echo htmlentities($result->id);   ?>">

						<input type="hidden" class="pname" name="" value="<?php  echo htmlentities($result->product_title);  ?>">

						<input type="hidden" class="pprice" name="" value="<?php  echo htmlentities($result->price);  ?>">

						<input type="hidden" class="pimage" name="" value="<?php  echo htmlentities($result->img1);  ?>">

						<input type="hidden" class="pcode" name="" value="<?php  echo htmlentities($result->product_id);  ?>">
						<h4><a class="shopBtn addItemBtn" href="action.php?id=<?php echo htmlentities($result->id); ?>" title="add to cart"> Add to cart </a></h4>
					 
					<br class="clr">
				</div>
			  </div>
			</li>

		<?php }
	}
	?>
	
		
		
			</ul>
		
	</form>
	
		
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
<script type="text/javascript" src="ajaxcart.js"></script>
</body>
</html>