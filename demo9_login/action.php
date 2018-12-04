<?php 
	session_start();
	//Get values from login form
	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	// Check if we are getting the correct values
	// echo $email. " - " .$password;



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

	$sql = "SELECT * FROM tbl_users WHERE email = '$email' && psword = '$password'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			// echo $row['lname'];
			// echo "<br>";
			// echo $row['fname'];

			$_SESSION['email'] = $row['email'];
		}
		header("Location: home.php");
	}


?>