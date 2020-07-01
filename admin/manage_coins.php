<?php
session_start();
require 'includes/connection.php';
if (strlen($_SESSION['alogin'])==0) {
	header('location:index.php');
}
else{
	if (isset($_REQUEST['del'])) {
		$delid=intval($_GET['del']);
		$sql = "DELETE FROM coins_notes WHERE  id = $delid";
		$result1 = mysqli_query($conn,$sql);
		if ($result1) {
			echo '<script>
			alert("Product has been Deleted Successfull");

			</script>';
			header("location: manage_coins.php");
		}
		else{
			echo "<script>
			alert('something wrongs');

			</script>";
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Coins</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
</head>
<body>
	<?php include 'includes/adminheader.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div id="managecoins" style="text-align: center;">
		<div class="contents">
			<div id="Page_title">
				Manage Coins & Paper Note Currency
				
			</div>
		</div>

	</div>
	<div class="panel panel-default">
		<div class="panel-heading">Coins/Notes Details</div>
		<div class="panel-body">
			<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Sr No.</th>
						<th>Category</th>
						<th>Product Id</th>
						<th>Product Title</th>
						<th>Description</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Status</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM coins_notes";
					$result = mysqli_query($conn,$sql);
					$cnt = 1;
					while ($row = mysqli_fetch_array($result)) {
						?>
						<tr>
							<td><?php echo "$cnt"; ?></td>
							<td><?php echo $row['category'] ; ?></td>
							<td><?php echo $row['product_id'] ; ?></td>
							<td><?php echo $row['product_title'] ; ?></td>
							<td><?php echo $row['description'] ; ?></td>
							<td><?php echo $row['price'] ; ?></td>
							<td><?php echo $row['stock'] ; ?></td>
							<td><?php echo $row['status'] ; ?></td>
							<td>
								<a href="edit-coins.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp;&nbsp;
								<a href="manage_coins.php?del=<?php echo $row['id'];?>" onclick="return confirm('Do you want to delete');">Delete</a>
							</td>

						</tr>
					<?php $cnt=$cnt+1; }
					?>
				</tbody>
			</table>
		</div>
	</div>

			</div>
		</div>
	</div>
	
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>