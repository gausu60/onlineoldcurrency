<?php
session_start();
include('connection/connection.php');
if (isset($_POST['createAccount'])) {
	header('location: registration.php');
}
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$sql ="SELECT * FROM users WHERE email=:email and password=:password";
$query= $dbh->prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['users_id']=$results->id;
$_SESSION['login']=$_POST['email'];
$_SESSION['fname']=$results->firstname;
$_SESSION['lname']=$results->lastname;
$_SESSION['address']=$results->address;
$_SESSION['city']=$results->city;
$_SESSION['zipcode']=$results->zipcode;
$currentpage=$_SERVER['REQUEST_URI'];
echo "<script type='text/javascript'> document.location = '$currentpage';
alert('Login successfull'); </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

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
		<li class="active">Login</li>
    </ul>
    <h3> Login</h3>
    <hr class="soft">
    <div class="row">
		
		<div class="span4">
			<div class="well">
			<h5>ALREADY REGISTERED ?</h5>
			<form method="post" action="login.php">
			  <div class="control-group">
				<label class="control-label" for="inputEmail" >Email</label>
				<div class="controls">
				  <input class="span3" type="text" placeholder="Email" name="email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				  <input type="password" class="span3" placeholder="Password" name="password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="defaultBtn" name="login">Sign in</button> <a href="forgetpsw.php">Forget password?</a>
				</div>
			  </div>
			</form>
		</div>
		</div>
	</div>


<script src="assets/js/shop.js"></script>
</body>
</html>