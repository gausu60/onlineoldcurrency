<?php
session_start();
require 'includes/connection.php';
if (strlen($_SESSION['alogin'])==0) {
	header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<?php include 'includes/adminheader.php'; ?>
	<!--Dashboard-->
	
	<!--Add Coins And note--->
	


</body>
</html>