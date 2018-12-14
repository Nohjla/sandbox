<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="sample2.php" method="post">
	<?php session_start(); $_SESSION['cart'] = "sample";?>
	<button type="submit">submit</button>
</form>
</body>
</html>