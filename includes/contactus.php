<?php
if (isset($_POST['send'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$msg = $_POST['msg'];
	$sql = "INSERT INTO feedback (name,email,subject,message) VALUES (:name,:email,:subject,:msg)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':name',$name,PDO::PARAM_STR);
	$query->bindParam(':email',$email,PDO::PARAM_STR);
	$query->bindParam(':subject',$subject,PDO::PARAM_STR);
	$query->bindParam(':msg',$msg,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Thanks For feedback our team Solve your problem');</script>";
}
else 
{
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
</head>
<body>
	<?php include('includes/header.php');?>
	
	<?php include('includes/navigation.php');?>
	
	<hr class="soften">
	<div class="well well-small">
	<h1>Visit us</h1>
	<hr class="soften">	
	<div class="row-fluid">
		<div class="span8 relative">
		<iframe style="width:100%; height:350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Newbury+Street,+Boston,+MA,+United+States&amp;aq=1&amp;oq=NewBoston,+MA,+United+States&amp;sll=42.347238,-71.084011&amp;sspn=0.014099,0.033023&amp;ie=UTF8&amp;hq=Newbury+Street,+Boston,+MA,+United+States&amp;t=m&amp;ll=42.348994,-71.088248&amp;spn=0.001388,0.006276&amp;z=18&amp;iwloc=A&amp;output=embed"></iframe>

		<div class="absoluteBlk">
		<div class="well wellsmall">
		<h4>Contact Details</h4>
		<h5>
			J.M Patel College<br>
			Goregaon West Mumbai<br><br>
			 
			info@mysite.com<br>
			﻿Tel 8652445042<br>
			
		</h5>
		</div>
		</div>
		</div>
		
		<div class="span4">
		<h4> FeedBack</h4>
		<form class="form-horizontal" method="post">
        <fieldset>
          <div class="control-group">
           
              <input type="text" placeholder="name" class="input-xlarge" name="name">
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="email" class="input-xlarge" name="email">
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="subject" class="input-xlarge" name="subject">
          
          </div>
          <div class="control-group">
              <textarea rows="3" id="textarea" class="input-xlarge" placeholder="Your Message" name="msg"></textarea>
           
          </div>

            <button class="shopBtn" type="submit" name="send">Send </button>

        </fieldset>
      </form>
		</div>
	</div>

	
</div>

<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
</body>
</html>