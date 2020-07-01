<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				
				<a class="active" href="index.php"> <span class="icon-home"></span> Home</a> 
				<a href="myaccount.php"><span class="icon-user"></span>&nbsp;<?php 
				$email=$_SESSION['login'];
				$sql ="SELECT firstname FROM users WHERE email=:email ";
				$query= $dbh -> prepare($sql);
				$query-> bindParam(':email', $email, PDO::PARAM_STR);
				$query-> execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				if ($query->rowCount() > 0) {
					foreach ($results as $result) {
						echo htmlentities($result->firstname);
					}
				}

				?></a> 
				<?php
				if (strlen($_SESSION['login'])==0) {?>
				 	<a href="registration.php"><span class="icon-edit"></span>
				<?php  } 
				?> Free Register </a> 
				<a href="contactus.php"><span class="icon-envelope"></span> Contact us</a>
				<a href="cart.php"><span class="icon-shopping-cart"></span> 0 Item(s) - <span class="badge badge-warning">&#x20b9;  0</span></a>
				
			</div>
		</div>
	</div>
</div>
<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="index.php"><span></span> 
		<h4>SNS Coins & Notes</h4>
	</a>
	</h1>
	</div>
	
	<div class="span4 alignR">
	<p><br> <strong> Support (24/7) :  8652445042 </strong><br><br></p>
	
	
	</div>
</div>
</header>