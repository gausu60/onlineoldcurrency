<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class="active"><a href="index.php">Home</a></li>
			  <li class=""><a href="coins.php">coins</a></li>
			  <li class=""><a href="notes.php">Notes</a></li>
			</ul>
			
				<ul class="nav pull-right">
			
			 	<li>
			 	<?php
			 	if (strlen($_SESSION['login'])==0) {?>
			 		<a href="login.php"><span class="icon-lock"></span> Login</a>
			 	 </li><li>
			 	 <?php }
			 	 else{?>
			 	 	<li> <span>Welcome To SNS</span></li>
			 	 	<a href="logout.php"> Logout</a>
			 	 <?php } 
			 	?>						
			</li>
			</ul>
				
			
			

			
			
		  </div>
		</div>
	  </div>
	</div>