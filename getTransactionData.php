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
		$output = "<tr>";
		while($row = mysqli_fetch_assoc($transactionTable)) {
			$query2 = 'SELECT * FROM customer WHERE CustomerId =' . $row["CustomerId"];
			$customerTable = mysqli_query($conn,$query2);
			if (mysqli_num_rows($transactionTable) > 0) {
				while($row2 = mysqli_fetch_assoc($customerTable)) {
					$output .= '
					<td>' . $row2["CustomerId"]. '</td>'.
					'<td>' . $row2["FirstName"]. '</td>'.
					'<td>' . $row2["LastName"]. '</td>';
				}
			}
				    $output .=

					'<td>' . $row["quantity"]. '</td>'.
					'<td>' . $row["ProductId"]. '</td>'.
					'<td>' . $row["TotalPrice"]. '</td>'.
					'<td>' . $row["Date"]. '</td>'.
					'<td>' . $row["Paid"]. '</td>
				</tr>';
        	}
	}
	echo $output;
?>