<?php
	session_start();
	$productid = $_POST['id'];
	$quantity = $_POST['quantity'];


	$_SESSION["cart"][$productid] = $quantity;

	echo "success";
?>