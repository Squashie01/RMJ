<!DOCTYPE html>
<html>
	<head>
		<title>RMJ</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src = "js/script.js"></script>
	</head>
	<body>
	<!--
		<div id = "header">
			<div id = "Title">
				<a href = index.html> <img src = "img/RMJ-logo.png" style = "width: 300px; height: 112px;"/></a>
			</div>
			<ul class = "navigation">
				<li><a href="Login.html">Login</a></li>
				<li><a href = "register.html">Register</a></li>
				<li><a href = "#">About Us</a> </li>
				<li><a href = "#">About Barbados</a></li>
				<li><a href = "#">Marketing</a></li>
				<li><a href = "#">Contact Us</a></li>
			</ul>
		</div> -->
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "rmj_industries_online_store";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
	
			/*$fname=$_POST['Fname'];
			$lname=$_POST['Lname'];
			$passWord=$_POST['Password'];
			$email=$_POST['EmailAddress'];
			$address=$_POST['address'];
			$phoneNumber=$_POST['PNumber'];
			$idN=rand(1, 10000);
			*/
			$test1=$_POST['name'];
			
			echo test1;//$fname + $lname + $passWord + $email + $address + $phoneNumber;
			/**
			$SameU="";
			$qry="SELECT MailAddress FROM customer";
			$result=mysqli_query ($conn, $qry);
			
			echo $fname. "<br/>". $lname . "<br/>" . $passWord . "<br/>" . $email . "<br/>" . $address . "<br/>" . $phoneNumber;
			
			if ($result->num_rows> 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					if()
				}
			}
			if ($result->num_rows> 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					//echo $row["Username"];
					//echo "<br />";
					if ($row["MailAddress"] == $email)
					{
						//echo "there are the same" . "<br/>";
						//echo $row["Username"] . $userName;
						$SameU="True";
					}
					else 
					{
						//echo "congrates its not the same";
					}
				}
				if($SameU =="True")
				{
					echo "<br/>"."<br/>"."<br/>"."<br/>"."<br/>"."<br/>"."<br/>".
					"this username is already taken please go back and try again";
				}
				else
				{
					if($idN == $row["CustomerId"])
					{
						while($idN == $row["CustomerId"])
						{
							$idN=rand(1, 10000);
						}
					}
					$log="INSERT INTO customer(MailAddress, Password, FirstName, LastName, Address, PhoneNumber, CustomerId)
							  VALUES ('$email', '$passWord',  '$fname', '$lname', '$address', '$phoneNumber', '$idN');";
						mysqli_query($conn, $log);
					
					echo "<br/>"."<br/>"."<br/>"."<br/>"."<br/>"."<br/>"."<br/>".
					"you can know go to the login in page and sighn in";
					echo "//does it work";
				}
			} 
			else
			{
				echo "0 results";
				$log="INSERT INTO customer(MailAddress, Password, FirstName, LastName, Address, PhoneNumber)
							  VALUES ('$email', '$passWord',  '$fname', '$lname', '$address', '$phoneNumber');";
						mysqli_query($conn, $log);
					
					echo "<br/>"."<br/>"."<br/>"."<br/>"."<br/>"."<br/>"."<br/>".
					"you can know go to the login in page and sighn in";
			}
			
			mysqli_close($conn);
		?>
		<div id="r">
				<p> <a href="register.html"> Click here to go back </a> </p>
			</div>
		**/
		?>
	</body>
</html>