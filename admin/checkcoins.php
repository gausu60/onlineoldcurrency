<?php
session_start();
require 'includes/connection.php';
$sql = "SELECT product_id FROM coins_notes";
$result = mysqli_query($conn,$sql);
if ($result) {
	if ($_POST['product_id']==) {
		# code...
	}
}
?>
