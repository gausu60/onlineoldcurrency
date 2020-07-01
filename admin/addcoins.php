<?php
session_start();
require 'includes/connection.php';
if (strlen($_SESSION['alogin'])==0) {
	header('location:index.php');
}
else{
	if (isset($_POST['addcoins'])) 
{
	$pid = $_POST['product_id'];
	$title = $_POST['title'];
	$categories = $_POST['categories'];
	$desc = $_POST['desc'];
	$image1 = $_FILES['image1']['name'];
	$image2 = $_FILES['image2']['name'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];
	$status = 'Available';
	move_uploaded_file($_FILES["image1"]["tmp_name"], "images/coinsimages/".$_FILES["image1"]["name"]);
	move_uploaded_file($_FILES["image2"]["tmp_name"], "images/coinsimages/".$_FILES["image2"]["name"]);
	$sql = "INSERT INTO  coins_notes (product_id,category,product_title,description,	img1,img2,price,stock,status) VALUES ('$pid','$categories','$title','$desc','$image1','$image2','$price','$stock','$status')";
	$result = mysqli_query($conn,$sql);
	if ($result>0) {
		echo '<script>
		alert("ADD Coins/Notes Successfull");
		</script>';
	}
	else{
		echo '<script>
		alert("Something Wrongs");

		</script>';
	}

}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>AddCoins</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<style type="text/css">
		form div{
			margin: 10px 0px;
			padding: 5px 0px;

		}
		
	</style>

</head>
<body>
	<?php include 'includes/adminheader.php'; ?>
	<div id="addcoins" style="text-align: center;">
		<div class="contents">
			<div id="Page_title">
				ADD Coins & Note
				
			</div>
			<div id="addcoin_form">
				<form method="post" action="addcoins.php" enctype="multipart/form-data">
					<div>
						<label>Product id:</label>
						<input type="text" name="product_id" required=""><br>
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
						<input type="text" name="title" required="">
					</div>
					<div>
						<label>Short Description:</label>
						<textarea cols="20" rows="5" name="desc" style="resize: none;">
							
						</textarea>
					</div>
					<div>
						<label>Image1:</label>
						<input type="file" name="image1" required="">
					</div>
					<div>
						<label>Image2:</label>
						<input type="file" name="image2" required="">
					</div>
					<div>
						<label>Price:
						</label>
						<input type="number" name="price" required="">
						
					</div>
					<div>
						<label>Stock</label>
						<input type="number" name="stock" id="stock">
					</div>
					<div>
						<input type="submit" name="addcoins" value="Add Coin/Notes" class="btn btn-primary">
					</div>
					

					
				</form>
				
			</div>

			
		</div>
		
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>