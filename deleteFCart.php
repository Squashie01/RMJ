<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "rmj_industries_online_store";
	//Get category
	$product = $_GET["product"];
	
	$custId=$_SESSION['CustomerId'];
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
    if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
    }
	$quantity2=0;
	$query = "SELECT * FROM transaction WHERE ProductId= '$product' AND paid=0 AND CustomerId='$custId'";
	$result = mysqli_query($conn,$query);
		if (mysqli_num_rows($result) > 0) 
		{
        	while($row = mysqli_fetch_assoc($result)) 
			{
				echo $row['ProductId'] . $row['CustomerId'];
				$deleteq="DELETE FROM transaction WHERE ProductId='$product' AND CustomerId='$custId' ";
							$result = mysqli_query($conn,$deleteq);
			}
		}
?>