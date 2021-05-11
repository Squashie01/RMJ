<html>
	<head>
		<title> RMJ - Food Item </title>
		<link rel="stylesheet" href="css/style.css">
		<script defer>
			var limit = 4;
			var params = new URLSearchParams(window.location.search);
			var selectedCategory = params.get("category");
			var name = "";
			loadProduct(selectedCategory);
			//checkSession();
			function add2Cart(item){
				var url = "add2cart.php?product=" + item;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("GET", url, true);
				xmlhttp.send();
			}
			function loadProduct(){
				var url = "load-product.php?limit=" + limit + "&category=" + selectedCategory + "&name=" + name;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("products").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", url, true);
				console.log(url);
				xmlhttp.send();
			}
			function setName(value){
				name = value;
			}
			function incrementLimit(){
				limit += 4;
			}
			function checkSession(){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var result = this.responseText;
						document.getElementById("header").innerHTML = result;
					}
				};
				xmlhttp.open("GET", "session.php", true);
				xmlhttp.send();
				console.log("SESSIONS!");
			}
		</script>
	</head>
	<body>
				<div id = "header">
					<div id = "Title">
						<a href = index.html> <img src = "img/RMJ-logo.png" style = "width: 300px; height: 112px;"/></a>
					</div>
					<ul class = "navigation">
						<li><a href = "#">About Us</a> </li>
						<li><a href = "#">About Barbados</a></li>
						<li><a href = "#">Marketing</a></li>
						<li><a href = "#">Contact Us</a></li>
					</ul>
				</div>
				<div id ="content">
						<input id = "searchProduct"type = "text" onkeyup = "setName(this.value); loadProduct()"/>
						<div id = "products" style = "display: inline-block;">

						</div>
						<br/>
						<button onclick = "incrementLimit(); loadProduct()">Show More</button>
				</div>
	</body>
</html>