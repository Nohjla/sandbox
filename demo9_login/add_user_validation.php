<?php
	$email = $_POST['email'];
	$password = sha1($_POST['password']);


	//Database info
	$host = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_name = "demoStoreNew";

	//create connection
	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	//check connection
	if (!$conn) {
		die("Connection failed:".mysqli_error($conn));
	}

	$sql = "INSERT INTO tbl_users(email,psword) VALUES('$email','$password')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("Location: login.php");
	}
	else
	{
		echo "error";
	}

?>