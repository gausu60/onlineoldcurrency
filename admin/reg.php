<?php
session_start();
require 'includes/connection.php';
if (strlen($_SESSION['alogin'])==0) {
	header('location:index.php');
}
else{

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Users</title>
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
				View Users
				
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
						<th>Firstname</th>
						<th>lastname Id</th>
						<th>Emails</th>
						<th>Contact</th>
						<th>Address</th>
						<th>City</th>
						<th>Zipcode</th>
						<th>register date</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM users";
					$result = mysqli_query($conn,$sql);
					$cnt = 1;
					while ($row = mysqli_fetch_array($result)) {
						?>
						<tr>
							<td><?php echo "$cnt"; ?></td>
							<td><?php echo $row['firstname'] ; ?></td>
							<td><?php echo $row['lastname'] ; ?></td>
							<td><?php echo $row['email'] ; ?></td>
							<td><?php echo $row['contact'] ; ?></td>
							<td><?php echo $row['address'] ; ?></td>
							<td><?php echo $row['city'] ; ?></td>
							<td><?php echo $row['zipcode'] ; ?></td>
							<td>
								<?php echo $row['regdate'] ; ?>
							</td>

						</tr>
					<?php $cnt=$cnt+1; }
					?>
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>