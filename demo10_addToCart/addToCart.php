<?php
	session_start();
	$productid = $_POST['productid'];
	$quantity = $_POST['quantity'];


	$_SESSION["cart"][$productid] = $quantity;
	$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

	echo "<span></span> Cart<span>".$_SESSION['item_count']."</span>";
?>