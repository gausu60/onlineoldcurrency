<?php
session_start();
require 'connection/connection.php';
if (isset($_POST['register'])) {
	$title = $_POST['title'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$address = $_POST['address'];
	$city = $_POST['city'];
	$zipcode = $_POST['zipcode'];
	$dob = $_POST['dob'];
	$contact = $_POST['contact'];
	$sql="INSERT INTO  users(title,firstname,lastname,email,password,dob,address,city,zipcode,contact) VALUES(:title,:fname,:lname,:email,:password,:dob,:address,:city,:zipcode,:contact)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':title',$title,PDO::PARAM_STR);
		$query->bindParam(':fname',$fname,PDO::PARAM_STR);
		$query->bindParam(':lname',$lname,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':password',$password,PDO::PARAM_STR);
		$query->bindParam(':address',$address,PDO::PARAM_STR);
		$query->bindParam(':city',$city,PDO::PARAM_STR);
		$query->bindParam(':zipcode',$zipcode,PDO::PARAM_STR);
		$query->bindParam(':dob',$dob,PDO::PARAM_STR);
		$query->bindParam(':contact',$contact,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		echo "<script>alert('Registration successfull. Now you can login');</script>";
	}
	else{
		echo "<script>alert('Something went wrong. Please try again');</script>";
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
    <style type="text/css">
    	sup {
    		color: red;
    	}
    </style>
    <script type="text/javascript">
    	function checkAvailabilityemail() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
    </script>
</head>
<body>
	<?php include('includes/header.php');?>
	<?php include('includes/navigation.php');?>
	
<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
    <h3> Registration</h3>
    <hr class="soft">
    <div class="well">
	<form class="form-horizontal" method="post">
		<h3>Your Personal Details</h3>
		<div class="control-group">
		<label class="control-label">Title <sup>*</sup></label>
		<div class="controls">
		<select class="span1" name="title">
			<option value="">-</option>
			<option value="Mr">Mr.</option>
			<option value="Mrs">Mrs</option>
			<option value="Miss">Miss</option>
		</select>
		</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname">First name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname" placeholder="First Name" name="firstname" required="">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLname">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputLname" placeholder="Last Name" name="lastname" required="">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" placeholder="Email" name="email" required="" onBlur="checkAvailabilityemail()" >
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" placeholder="Password" name="password" required="">
		</div>
	  </div>
	<div class="control-group">
		<label class="control-label">Date of Birth <sup>*</sup></label>
		<div class="controls">
			<input type="date" name="dob" required="">
		</div>
	 </div>
	 <div class="control-group">
		<label class="control-label">Address <sup>*</sup></label>
		<div class="controls">
			<input type="text" name="address" required="">
		</div>
	 </div>
	 <div class="control-group">
		<label class="control-label">City<sup>*</sup></label>
		<div class="controls">
			<input type="text" name="city" required="">
		</div>
	 </div>
	 <div class="control-group">
		<label class="control-label">Zipcode<sup>*</sup></label>
		<div class="controls">
			<input type="text" name="zipcode" required="">
		</div>
	 </div>
	 <div class="control-group">
		<label class="control-label">Contact No.<sup>*</sup></label>
		<div class="controls">
			<input type="text" name="contact" required="" maxlength="10">
		</div>
	 </div>

	<div class="control-group">
		<div class="controls">
		 <input type="submit" value="Register" class="exclusive shopBtn" name="register">
		</div>
	</div>
	</form>
</div>



</body>
</html>