<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "rmj_industries_online_store";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
    	}
	//Get Data
	$limit = $_POST["Limit"];
	$query = 'SELECT * FROM transaction LIMIT ' . $limit ;
	$transactionTable = mysqli_query($conn,$query);
	if (mysqli_num_rows($transactionTable) > 0) {
		$output = "<tr><th>First Name</th> <th>Last Name</th> <th>Product Name</th> <th>quantity</th> <th>Total Price </th> <th> date </th></tr><tr>";
		while($row = mysqli_fetch_assoc($transactionTable)) {
			$query2 = 'SELECT * FROM customer WHERE CustomerId =' . $row["CustomerId"];
			$customerTable = mysqli_query($conn,$query2);
			if (mysqli_num_rows($transactionTable) > 0) {
				while($row2 = mysqli_fetch_assoc($customerTable)) {
					$output .= 
					'<td>' . $row2["FirstName"]. '</td>'.
					'<td>' . $row2["LastName"]. '</td>';
				}
			}
					$query3 = 'SELECT * FROM product WHERE ProductId ="' . $row["ProductId"].'"';
					$customerTable = mysqli_query($conn,$query3);
					if (mysqli_num_rows($transactionTable) > 0) {
						while($row3 = mysqli_fetch_assoc($customerTable)) {
							$output .= 
							'<td>' . $row3["ProductName"]. '</td>';
						}
					}
				    $output .=
					'<td>' . $row["quantity"]. '</td>'.
					'<td>' . $row["TotalPrice"]. '</td>'.
					'<td>' . $row["date"]. '</td>
				</tr>';
        	}
	}
	echo $output;
?>