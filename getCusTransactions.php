<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "rmj_industries_online_store";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$query = 'SELECT * FROM transaction WHERE CustomerId=' . $_SESSION['CustomerId'];
	$transactionTable = mysqli_query($conn,$query);
	if (mysqli_num_rows($transactionTable) > 0) {
		$output = "<tr><th>Product</th> <th> Quantity </th> <th>TotalPrice </th><th>date</th></tr><tr>";
		while($row = mysqli_fetch_assoc($transactionTable)) {
			$query2 = 'SELECT * FROM product WHERE ProductId = "' . $row["ProductId"]. '"';
			$customerTable = mysqli_query($conn,$query2);
			if (mysqli_num_rows($transactionTable) > 0) {
				while($row2 = mysqli_fetch_assoc($customerTable)) {
					$output .= '
					<td>' . $row2["ProductName"]. '</td>';
				}
			}
			$output .=
			'<td>' . $row["quantity"]. '</td>'.
			'<td>' . $row["TotalPrice"]. '</td>'.
			'<td>' . $row["date"]. '</td> <tr/>';
		}
	}
	else
		$output = "No Records";
	echo $output;
?>