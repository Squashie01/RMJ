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
	echo "Limit: " . $limit; 
	$query = 'SELECT * FROM customer LIMIT ' . $limit ;
	//echo $query;
	$result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) > 0) {
		$output = "<tr><th>CustomerId</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Address</th><th>Phone Number</th></tr>";
		while($row = mysqli_fetch_assoc($result)) {
			$output .= '<tr>
					<td>' . $row["CustomerId"]. '</td>'.
					'<td>' . $row["FirstName"]. '</td>'.
					'<td>' . $row["LastName"]. '</td>'.
					'<td>' . $row["MailAddress"]. '</td>'.
					'<td>' . $row["Address"]. '</td>'.
					'<td>' . $row["PhoneNumber"]. '</td>'.'
				</tr>';
        	}
	}
	echo $output
?>