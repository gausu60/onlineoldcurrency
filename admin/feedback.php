<?php
session_start();
require 'includes/connection.php';
if (strlen($_SESSION['alogin'])==0) {
	header('location:index.php');
}
else{
	if (isset($_REQUEST['del'])) {
		$delid= intval($_GET['del']);
		$sql = "DELETE FROM feedback WHERE  id = $delid";
		$result1 = mysqli_query($conn,$sql);
		if ($result1) {
			echo '<script>
			alert(" Deleted Successfull");

			</script>';
			header("location: feedback.php");
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
	<title>feedback</title>
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
				View Feedback
				
			</div>
		</div>

	</div>
	<div class="panel panel-default">
		<div class="panel-heading">View Feedback</div>
		<div class="panel-body">
			<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Sr No.</th>
						<th>Name</th>
						<th>Email Id</th>
						<th>Subjects</th>
						<th>Messages</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT * FROM feedback";
					$result = mysqli_query($conn,$sql);
					$cnt = 1;
					while ($row = mysqli_fetch_array($result)) {
						?>
						<tr>
							<td><?php echo "$cnt"; ?></td>
							<td><?php echo $row['name'] ; ?></td>
							<td><?php echo $row['email'] ; ?></td>
							<td><?php echo $row['subject'] ; ?></td>
							<td><?php echo $row['message'] ; ?></td>
							<td><a href="feedback.php?del=<?php echo $row['id'];?>" onclick="return confirm('Do you want to delete');">Delete</a></td>
							

						</tr>
					<?php $cnt=$cnt+1; }
					?>
				</tbody>
			</table>
		</div>
	</div>
	


</body>
</html>