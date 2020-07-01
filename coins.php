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
	
	<!--
New Products
-->
<h3>Home>Coins</h3>
	<ul class="thumbnails">
						<?php
					    $sql = "SELECT * from coins_notes WHERE category='coins' and stock>0";
						$query = $dbh -> prepare($sql);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ); 
						if ($query->rowCount() > 0) {
							foreach ($results as $result) { ?>
								<li class="span4">
			  <div class="thumbnail">
				
				<a href="product_details.php?id=<?php echo htmlentities($result->id); ?>"><img src="admin/images/coinsimages/<?php echo htmlentities($result->img1); ?>" alt=""></a>
				<div class="caption cntr">
					<span><?php echo htmlentities($result->product_id); ?></span>
					<h4><?php echo htmlentities($result->product_title); ?></h4>
					<p><?php echo htmlentities($result->description); ?></p>
					<p><strong> &#x20b9;  <?php echo htmlentities($result->price); ?></strong></p>
					<h4><a class="shopBtn" href="cart.php?id=<?php echo htmlentities($result->id); ?>" title="add to cart"> Add to cart </a></h4> 
					<br class="clr">
				</div>
			  </div>
			</li>
								
							<?php }
						}
						?>
									
			
							
						
					</ul>




</body>
</html>