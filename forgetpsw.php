<?php
session_start();
include('connection/connection.php');
if (strlen($_SESSION['login'])==1) {
	if (isset($_POST['forgetpswd'])) {
	$email=$_POST['email'];
	$newpassword=md5($_POST['newpassword']);
	$sql ="SELECT email FROM users WHERE email=:email" or die("cannot ");
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	if ($query -> rowCount() > 0) {
		$con="UPDATE users set password=:newpassword where email=:email";
		$chngpwd1 = $dbh->prepare($con);
		$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
		$chngpwd1->execute();
		echo "<script>alert('Your Password succesfully changed');</script>";
	}
	else{
		echo "<script>alert('Email id  is invalid');</script>"; 
	}
}
}

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Forget Password</title>
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
	<form method="post">
		<div class="control-group">
		<label class="control-label" for="inputEmail">E-mail address</label>
				<div class="controls">
				  <input class="span3" type="text" placeholder="Email" name="email">
				</div>
				<div class="controls">
				  <input class="span3" type="password" placeholder="New Password" name="newpassword">
				</div>
			  </div>
			  <div class="controls">
			  <button type="submit" class="btn block" name="forgetpswd">Forget Password</button>
			  </div>
	</div>
		
	</form>

				

<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
</body>
</html>