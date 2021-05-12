<html>
	<head>
		<?PHP
			session_start(); 
			$admin=$_SESSION['admin'];
				if ($_SESSION['customer']!="yes")
				{
				header("Location: index.html");
				}
				if($admin == 2299)
				{
					//echo"test";
					echo "<div id = 'header'>
							<div id = 'Title'>"
							."<a href = index.php> <img src = 'img/RMJ-logo.png' style = 'width: 300px; height: 112px;'/></a>"
							."</div>"
							."<ul class = 'navigation'>"
							."<li><a href = 'transactionReport.php'>  Transaction Report </a> </li>"
							."<li><a href = 'customerReport.php'> Customer Table </a></li>"
							."<li><a href = '#'>About Us</a> </li>"
							."<li><a href='logout.php'> logout</a></li>"
							."</ul>"
							."</div>";
					
				}
				else 
				{
					echo "<div id = 'header'>
							<div id = 'Title'>"
							."<a href = index.php> <img src = 'img/RMJ-logo.png' style = 'width: 300px; height: 112px;'/></a>"
							."</div>"
							."<ul class = 'navigation'>"
							."<li><a href='cart.php'>cart</a></li>"
							."<li><a href='cusTransactions.php'> reciet </a></li>"
							."<li><a href = '#'>About Us</a> </li>"
							."<li><a href='logout.php'> logout</a></li>"
							."</ul>"
							."</div>";
				}
		?>
		<title>RMJ</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			function loadCategory(category){
				var params = new URLSearchParams();
				params.append("category", category);
				location.href = "category2.php?" + params.toString();
			}
		</script>
	</head>
	<body>
		<div id = "content">
			<h1 style = "text-align: center;">Have a look at the brands we represent by category</h1>
			<table id = "categories">
				<tr>
					<td class = "category" onclick = "loadCategory('food')"><img src = "img/categories/foodlogo.jpg"/> <br/>Food</td>
					<td class = "category" onclick = "loadCategory('beverage')"><img src = "img/categories/beverageLogo.jpg"/> <br/>Beverages</td>
					<td class = "category" onclick = "loadCategory('household')"><img src = "img/categories/houseLogo.jpg"/> <br/>Household </td>
					<td class = "category" onclick = "loadCategory('WineSpiritsRum')"><img src = "img/categories/wineAndSpiritsLogo.jpg"/> <br/>Wines & Spirits</td>
				</tr>
				<tr>
					<td class = "category" onclick = "loadCategory('WineSpiritsRum')"><img src = "img/categories/personalCareLogo.jpg"/> <br/>Personal Care</td>
					<td class = "category" onclick = "loadCategory('haircare')"><img src = "img/categories/hairLogo.jpg"/> <br/>Hair Care</td>
					<td class = "category" onclick = "loadCategory('automotive')"><img src = "img/categories/automotiveLogo.jpg"/> <br/>Automotive</td>
					<td class = "category"><a href = "#"> <img src = "img/categories/allBrandsLogo.jpg"/> <br/>All Brands </a> </td>
				</tr>
			</table>
		</div>
		
	</body>
</html>