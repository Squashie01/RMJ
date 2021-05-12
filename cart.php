<html>
	<head>
		<title> RMJ - Food Item </title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			function add2Cart(item){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET", "addCart2.php?product=" + item , true);
				xmlhttp.send();
			}
			
			function deleteFCart(item){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET", "deleteFCart.php?product=" + item , true);
				xmlhttp.onreadystatechange = function() {
				  if (this.readyState == 4 && this.status == 200) {
					document.getElementById("header").innerHTML = this.responseText;
				  }
				};
				xmlhttp.send();
			}
			
			function conferm(item){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET", "conferm.php?product=" + item , true);
				xmlhttp.send();
				alert("that you for your time"); 
				document.getElementById("content").innerHTML="please click here to go <a href = 'index.php'>back</a>";
			}
			
		</script>
	</head>
	<body>
				<div id = "header">
					<div id = "Title">
						<a href = index.php> <img src = "img/RMJ-logo.png" style = "width: 300px; height: 112px;"/></a>
					</div>
					<ul class = "navigation">
						<li><a href = "#">About Us</a> </li>
						<li><a href="logout.php"> logout</a></li>
					</ul>
				</div>
				<div id ="content">
					<?php
						session_start(); 

						if ($_SESSION['customer']!="yes")
						{
						header("Location: index.html");
						}
						$ans1="";
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "rmj_industries_online_store";
						
						//Get category
						$custId=$_SESSION['CustomerId'];
						// Create connection
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						// Check connection
    						if (!$conn) {
    							die("Connection failed: " . mysqli_connect_error());
    						}
						$OverAllTotal=0;
						$query = "SELECT * FROM transaction WHERE paid=0 AND CustomerId='$custId'";
						$result = mysqli_query($conn,$query);
						if (mysqli_num_rows($result) > 0) 
						{
        					while($row = mysqli_fetch_assoc($result)) 
							{
								$prodId=$row["ProductId"];
								
								$query2 = "SELECT * FROM product WHERE ProductId='$prodId'";
								$result2 = mysqli_query($conn,$query2);
								if (mysqli_num_rows($result2) > 0) {
									while($row2 = mysqli_fetch_assoc($result2))
									{
										echo "<div class = 'product'>
											<img src = '". $row2["productImage"] . "'/><br/>"
											.$row2["ProductName"] . "<br/>"
											. "$".$row2["ProductCost"]
											."<br/>"
											."The amount youve purchesed is: "
											.$row['quantity']
											."<br/>"
											."The total price is: $"
											.$row['TotalPrice']
											."<br/>"
											."add more? "
											."<br/>"
											.'<button type = "button" onclick = "add2Cart(&apos;' . $row2["ProductId"] . '&apos;)"> Add </button> '
											.'<button type = "button" onclick = "deleteFCart(&apos;' . $row2["ProductId"] . '&apos;)"> DELET </button> '
											."</div>";
									}
								}
        					}
							/*
								The loop will repeat print div elements that display the info about the queried record.
								For Example:
								<div class = "product">
									<img src = "img/Food/pancakes.png"/><br/>
									Pancake<br/>
									$3
									<a href = "test.php?product="
								</div>
							*/
    					}
						$query3 = "SELECT * FROM transaction WHERE paid=0 AND CustomerId='$custId'";
						$result3 = mysqli_query($conn,$query3);
						if (mysqli_num_rows($result3) > 0) 
						{
        					while($row3 = mysqli_fetch_assoc($result3)) 
							{
								$OverAllTotal+=	$row3['TotalPrice'];
								if($row3['paid']==0)
								{
									$ans1="are you done shopping?"
									."<br/>"
									."Your total comes to $" . $OverAllTotal
									."<br/>"
									.'<button type = "button" onclick = "conferm(&apos;' . $row2["ProductId"] . '&apos;)"> yes </button> ';
								}
								else 
									$ans1="please click here to go <a href = 'index.php'>back</a>";
							}
						}
						echo $ans1;
						
					?>
				</div>
	</body>
</html>



