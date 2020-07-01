<?php
session_start();
require 'connection/connection.php';
if (strlen($_SESSION['login']==1)) {
	$user_id = $_SESSION['user_id'];
	$email = $_SESSION['email'];
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$contact = $_SESSION['contact'];
	$address = $_SESSION['address'];
	$zipcode = $_SESSION['zipcode'];
	$city =  $_SESSION['zipcode'];
	$order_id = 'SNSId'.rand();
	$orderstatus =  'pending';
	$sql = "INSERT INTO Orders (user_id,order_id,qty,total_price,orderstatus) VALUES (:user_id,:)";


	
}
else{
	echo "<script>
	alert('First please You must Login');

	</script>";
	header('location: login.php');
}
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
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
	
<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
</body>
</html>