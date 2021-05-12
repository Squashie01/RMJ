<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "rmj_industries_online_store";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
		$userName="";
		$Password="";
		$userName=$_POST["UserName"];
		$Password=$_POST["Password"];		
		$qry="SELECT MailAddress, Password, CustomerId  FROM customer";
		$SameU="";
			$result=mysqli_query ($conn, $qry);
			
			if ($result->num_rows> 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					//echo $row["Username"];
					//echo "<br />";
					if ($row["MailAddress"] == $userName && $row["Password"] == $Password)
					{
						if ($userName=="Admin")
						{
							$SameU="True";
							$_SESSION['admin']=$row["CustomerId"];
							echo "you have loged into admin";
						}
						else
						{
							$SameU="True";
							$_SESSION['CustomerId']=$row["CustomerId"];
							$_SESSION['admin']=0;
						}
					}
				}
				if($SameU =="True")
				{
					$_SESSION['customer']="yes";
					//redirecting to "phpdbase_hwere.php"
					header("Location: index.php");
					
				}
				else
				{
					echo"<br/>"."<br/>"."<br/>"."<br/>"."<br/>"."<br/>"."<br/>"."<br/>";
					echo "sorry but you have the wrong login details";
				}
			} 
			else
			{
				echo "0 results";
			}

			mysqli_close($conn);
?>
<html>
	<head>
		<title>RMJ</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src = "js/script.js"></script>
	</head>
	<body>
		<div id = "header">
			<div id = "Title">
				<a href = index.html> <img src = "img/RMJ-logo.png" style = "width: 300px; height: 112px;"/></a>
			</div>
			<ul class = "navigation">
				<li><a href="Login.html">Login</a></li>
				<li><a href = "register.html">Register</a></li>
				<li><a href = "#">About Us</a> </li>

			</ul>
		</div>
		<div>
	</body>
</html>