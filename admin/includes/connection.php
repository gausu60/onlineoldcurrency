<?php
$conn = mysqli_connect("localhost","mrgausuo_sns","sns123","mrgausuo_sns");
if ($conn) {
 	//echo "connected";
 }
 else{
 	echo "failed".mysqli_error();
 }
?>