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
				echo "it already has a transation" . "<br/>";
				if($product == $row['ProductId'] && $custId == $row['CustomerId'])
				{
					echo $product. "<br/>". "<br/>";
					echo $custId. "<br/>". "<br/>";
					echo $row['transactionId'].$row['CustomerId']. $row['ProductId']."<br/>";
					
					$quantity=$row['quantity'];
					$quantity+=1;
					$prodId=$row['ProductId'];
					echo $quantity;
					$update="UPDATE transaction SET quantity='$quantity' WHERE ProductId='$product' AND paid=0 AND CustomerId='$custId' ";
							$result = mysqli_query($conn,$update);
					
					$query2 = "SELECT * FROM product WHERE ProductId='$prodId'";
					$result2 = mysqli_query($conn,$query2);
					if (mysqli_num_rows($result2) > 0)
					{
						while($row2 = mysqli_fetch_assoc($result2))
						{
							$total=$quantity * $row2["ProductCost"];
							echo $total;
							$update="UPDATE transaction SET  TotalPrice='$total' WHERE ProductId='$product' AND paid=0 AND CustomerId='$custId' ";
							$result = mysqli_query($conn,$update);
						}
					}
				}
				else
				{
					echo $product. "<br/>". "<br/>";
					echo $custId. "<br/>". "<br/>";
					echo $row['transactionId'].$row['CustomerId']. $row['ProductId']."<br/>";
					$insert = "INSERT INTO transaction( CustomerId, ProductId, quantity, paid, TotalPrice)
					 VALUES ('$custId', '$product', '1', false, '0');";
					$result = mysqli_query($conn,$insert);
				} 
			}
		}
		else
		{
			echo "it doesent already have a transaction"."<br/>";
				$insert = "INSERT INTO transaction(CustomerId, ProductId, quantity, paid)
					 VALUES ('$custId', '$product', '1', false );";
					$result = mysqli_query($conn,$insert);
				
				$query3 = "SELECT * FROM product WHERE ProductId='$product'";
					$result3 = mysqli_query($conn,$query3);
					if (mysqli_num_rows($result3) > 0)
					{
						while($row3 = mysqli_fetch_assoc($result3))
						{
							$quantity2+=1;
							$total2=$quantity2 * $row3["ProductCost"];
							echo $total2;
							$update="UPDATE transaction SET  TotalPrice='$total2' WHERE ProductId='$product'  AND CustomerId='$custId'";
							$result = mysqli_query($conn,$update);
						}
					}
		} 
	
        
?>