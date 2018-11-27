<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$pw = "";
	$dbname = "demoStoreNew";
	// echo $_SESSION["item_count"];
	foreach ($_SESSION["cart"] as $key => $value) {
		echo "<span>$key</span><input id='' type='number' value=$value><br>";
	}	
?>
<script>
	
</script>