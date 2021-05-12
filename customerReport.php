<html>
	<head>
		<title> RMJ - Food Item </title>
		<link rel="stylesheet" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script defer>
			var limit = 1;
			loadRecords();
			function loadRecords(){
				$.post("getCusData.php",
					{
						Limit: limit
					},
					function(response){
						document.getElementById("cusData").innerHTML = response;
					}
				);
			}
			function showMore(){
				limit += 3;
				loadRecords();
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

					</ul>
				</div>
				<div id ="content">
						<table id = "cusData">
							
						</table>
						<button onclick = "showMore();"> ShowMore</button>
				</div>
	</body>
</html>