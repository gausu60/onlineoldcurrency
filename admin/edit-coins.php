<?php
session_start();
require 'includes/connection.php';
if (strlen($_SESSION['alogin'])==0) {
	header('location:index.php');
}
else{
	if (isset($_POST['submit'])) {
		$pid = $_POST['product_id'];
		$title = $_POST['title'];
		$categories = $_POST['categories'];
		$desc = $_POST['desc'];
		$image1 = $_FILES['image1']['name'];
		$image2 = $_FILES['image2']['name'];
		$price = $_POST['price'];
		$stock = $_POST['stock'];
		$status = 'Available';
		$id=intval($_GET['id']);
		move_uploaded_file($_FILES["image1"]["tmp_name"], "images/coinsimages/".$_FILES["image1"]["name"]);
		move_uploaded_file($_FILES["image2"]["tmp_name"], "images/coinsimages/".$_FILES["image2"]["name"]);
		$sql="UPDATE coins_notes SET product_id = '$pid',product_title='$title',category='$categories',description='$desc',img1 = '$image1' ,img2='$image2',price='$price',stock='$stock'  WHERE id = $id ";
		$result = mysqli_query($conn,$sql);
		if ($result) {
			echo '<script>
			alert("update successfull");

			</script>';
			header("location: manage_coins.php");
		}
		else{
			echo '<script>
			alert("Something  Failed");

			</script>';
		}
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Coins</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<?php include 'includes/adminheader.php'; ?>
	<div style="text-align: center;">
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h2 class="page-title">Edit Coins/Notes</h2>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Basic Info</div>
							<div class="panel-body">
								<?php 
								$id=intval($_GET['id']);
								$sql ="SELECT * FROM coins_notes where id= $id";
								$result = mysqli_query($conn,$sql);
								$cnt = 1;
								while ($row = mysqli_fetch_array($result)){ ?>
									<form method="post" class="form-horizontal" enctype="multipart/form-data">
									<div>
						<label>Product id:</label>
						<input type="text" name="product_id" required="" value="<?php echo($row['product_id']);  ?>">
					</div>
					<div>
						<label>Categories:</label>
						<select name="categories">
							<option value="coins">Coins</option>
							<option value="notes">Notes</option>
						</select>
					</div>
					<div>
						<label>Products Title</label>
						<input type="text" name="title" required="" value="<?php echo($row['product_title']);  ?>">
					</div>
					<div>
						<label>Short Description:</label>
						<textarea cols="20" rows="5" name="desc" style="resize: none;" value="<?php echo($row['description']);  ?>">
							
						</textarea>
					</div>
					<div>
						<label>Image1:</label>
						<input type="file" name="image1" value="<?php echo($row['img1']);  ?>">
					</div>
					<div>
						<label>Image2:</label>
						<input type="file" name="image2" value="<?php echo($row['img2']);  ?>">
					</div>
					<div>
						<label>Price:
						</label>
						<input type="number" name="price" required="" value="<?php echo($row['price']);  ?>">
						
					</div>
					<div>
						<label>Stock</label>
						<input type="number" name="stock" id="stock" value="<?php echo($row['stock']);  ?>">
					</div>


								<?php  }

								?>
								
					<div>
						<input type="submit" name="submit" value="Save Coin/Notes" class="btn btn-primary">
					</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>