<html>
	<head>
		<title> RMJ - Food Item </title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
				<div id = "header">
					<div id = "Title">
						<a href = "index.php"> <img src = "img/RMJ-logo.png" style = "width: 300px; height: 112px;"/></a>
					</div>
					<ul class = "navigation">
						<li><a href = "#">About Us</a> </li>
						<li><a href = "#">About Barbados</a></li>
						<li><a href = "#">Marketing</a></li>
						<li><a href = "#">Contact Us</a></li>
						<li><a href = "report.php">Reports</a></li>
						<li><a href="logout.php"> logout</a></li>
					</ul>
				</div>
				<div id ="content">	
					<p>
						<h1>Welcome to the report section </h1>
					</p>
					<?PHP
						session_start(); 

						if($_SESSION['admin'] != 2299)
						{
							header("Location: index.html");
						} 
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "rmj_industries_online_store";
						$prodName="";
						$custFName="";
						$custLName="";
						$totalPurchased="";
						$paid="";

						// Create connection
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						// Check connection
    						if (!$conn) {
    							die("Connection failed: " . mysqli_connect_error());
    						}
						$query = "SELECT * FROM transaction WHERE paid='1'";
						$result = mysqli_query($conn,$query);
						if (mysqli_num_rows($result) > 0) 
						{
        					while($row = mysqli_fetch_assoc($result)) 
							{
								$prodId=$row["ProductId"];
								$quanity=$row["quantity"];
								$custId=$row["CustomerId"];
								$paid=$row["paid"];
								$query2="SELECT * FROM product";
						$result2= mysqli_query($conn,$query2);
						if (mysqli_num_rows($result2) > 0) 
						{
        					while($row2 = mysqli_fetch_assoc($result2)) 
							{
								if ($prodId == $row2["ProductId"])
								{
									$prodName=$row2["ProductName"];
								}
							}
						}
						
						$query3="SELECT * FROM customer";
						$result3= mysqli_query($conn,$query3);
						if (mysqli_num_rows($result2) > 0) 
						{
        					while($row3 = mysqli_fetch_assoc($result3)) 
							{
								if ($custId == $row3["CustomerId"])
								{
									$custFName=$row3["FirstName"];
									$custLName=$row3["LastName"];
									$totalPurchased=$row['TotalPrice'];
								}
								echo  "<br/>"."<br/>".
									'
										<table>
											<tr>
												<th> First Name: </th>
												<td> ' .  $custFName . ' </td>
											</tr>
											
											<tr>
												<th> Last Name </th>
												<td> ' .  $custLName . ' </td>
											</tr>

											<tr>
												<th> Product Name </th>
												<td> ' .  $prodName . ' </td>
											</tr>

											<tr>
												<th> quantity </th>
												<td> ' .  $quanity . ' </td>
											</tr>
											
											<tr>
												<th> totalprice  </th>
												<td> '  . $totalPurchased .' </td>
											</tr>

										</table> ';
										//echo $paid;
							}
						}
							}
						}
						
						
						
						
						
						
						// $custFName .$custLName .$prodName . $quanity;
						
					?>
				</div>