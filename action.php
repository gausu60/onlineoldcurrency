<?php
session_start();
require 'connection/connection.php';
if (isset($_POST['id'])) {
 	$id = $_POST['id'];
 	$pname = $_POST['pname'];
 	$pprice = $_POST['pprice'];
 	$pimage = $_POST['pimage'];
 	$pcode = $_POST['pcode'];
 	$pqty = 1;
 	$sql = "SELECT product_id from cart WHERE product_id = :pcode";

 	$query = $dbh -> prepare($sql);
 	$query->bindParam(':pcode',$pcode,PDO::PARAM_STR);
	$query->execute();
 	$res = $stmt->get_result();
 	$r=$query->fetch(PDO::FETCH_ASSOC);
 	$code = $r['product_id'];
 	if (!$code) {
 		$sql="INSERT INTO  cart(product_name,product_price,product_image,qty,total_price,product_id) VALUES(:pname,:pprice,:pimage,:pqty,:pprice,:pcode)";
 		$query = $dbh->prepare($sql);
 		$query->bindParam(':pname',$pname,PDO::PARAM_STR);
		$query->bindParam(':pprice',$pprice,PDO::PARAM_STR);
		$query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
		$query->bindParam(':pqty',$pqty,PDO::PARAM_STR);
		$query->bindParam(':pprice',$pprice,PDO::PARAM_STR);
		$query->bindParam(':pcode',$pcode,PDO::PARAM_STR);
 		$query->execute();
 		echo "<div><strong>Item Added To your cart!</strong></div>";
 	}
 	else{
 		echo "<div><strong>Item already added To your cart!</strong></div>";
 	}
 } 
?>
