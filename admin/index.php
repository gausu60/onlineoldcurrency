<?php 
session_start();
require 'includes/connection.php';
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT username,password FROM admin WHERE username ='$username' and password='$password'";
	$result = mysqli_query($conn,$sql);
	$count = mysqli_fetch_array($result);
	if ($count>0) {
		$_SESSION['alogin']=$_POST['username'];
		$_SESSION['id']=$count['id'];
		header("Location: login.php");
		exit();
	}
	else{
		header("Location: index.php");
		echo '<script type="text/javascript">
		alert("Invalid Details");
		
	</script>';


		exit();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Pannel</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	
	<div class="contents">
		<div id="admin_login">
			<h3>Welcome To Admin Pannel</h3>
			<form method="post">
				<div>
					<label>Username:</label>
					<input type="text" name="username" required="">
					
				</div>
				<div>
					<label>Password:</label>
					<input type="password" name="password" required="">
				</div>
				<div id="adminLoginBtn">
					<input type="submit" name="login" value="Login">
					<a href="#" id="Forgetpsw">Forget Password?</a>
				</div>
				
			</form>
			
		</div>
		
	</div>

</body>
</html>