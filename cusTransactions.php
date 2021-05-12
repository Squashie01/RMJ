<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?PHP
		session_start(); 
			$admin=$_SESSION['admin'];
				if ($_SESSION['customer']!="yes")
				{
				header("Location: index.html");
				}
	?>
    <meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$.post(
			"getCusTransactions.php",
			function(response){
				document.getElementById("records").innerHTML = response;
			}
		);
	</script>
    <title></title>
</head>
<body>
	<div id = "header">
		<div id = "Title">
			<a href = index.html> <img src = "img/RMJ-logo.png" style = "width: 300px; height: 112px;"/></a>
		</div>
		<div  id="menuBar">
			<ul class = "navigation">
				<li><a href = "#">About Us</a> </li>
				<li><a href = "#">About Barbados</a></li>
				<li><a href = "#">Marketing</a></li>
				<a href = "#">Contact Us</a></li>
			</ul>
		</div>
		</div>
		<div id ="content">
		<table id ="records">
			
		</table>
	</div>
</body>
</html>