<?php 
		$servername = "localhost";
		$username = "root";
		$pw = "";
		$dbname = "demoStoreNew";

		// Create connection
		$conn = mysqli_connect($servername, $username, $pw, $dbname);
		// Check connection
		if (!$conn) {
		   die("Connection failed: " . mysqli_connect_error());
		}

		session_start();
      	if (isset($_SESSION['email'])) {
      		
      	echo "success";
?>
		<h1>This is checkout page</h1>

		<h3>Shipping address</h3>
		<input type="text"></input>
		<h3>Payment Method</h3>
		<select>
        <option>COD</option>
        <option>Paypal</option>
      	</select>

<?php 
	foreach($_SESSION['cart'] as $id=> $quantity) {
		$sql = "SELECT * from items WHERE id ='$id'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			echo "<table>";
			while($row = mysqli_fetch_assoc($result)){
                     $name = $row["name"];
                     $description = $row["description"];
                     $price = $row["price"];
                     echo "                    	 
                     <tr>
					    <th>$name</th>
					    <th>$description</th> 
					    <th>$price</th>
					 </tr>"; 
                 }
            echo "</table>";
		}
	}
?>      	
<?php
		}
      	else
      	{
      		header("Location: ../demo9_login/login.php");
      	}

?>