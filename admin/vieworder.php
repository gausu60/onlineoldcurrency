<?php
session_start();
require 'includes/connection.php';
if (strlen($_SESSION['alogin'])==0) {
	header('location:index.php');
}
?>