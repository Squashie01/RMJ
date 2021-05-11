<?php
	session_start();
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "rmj_industries_online_store";
						//Get category
						$product = $_GET["product"];
						// Create connection
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						// Check connection
    						if (!$conn) {
    							die("Connection failed: " . mysqli_connect_error());
    						}
						//$update = 
						$result = mysqli_query($conn,$update);
?>