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
	//Get data
	$limit = $_GET["limit"];
	$category = $_GET["category"];
	$name = $_GET["name"];
	$query = "SELECT * FROM product ";
	if($name != "" && $category != "")
		$query.= "WHERE ProductId LIKE '". $category . "%' AND `ProductName` LIKE '%". $name . "%'";
	else if ($name != "")
		$query = "SELECT * FROM product WHERE ProductName LIKE '". $name . "%'";
	else
		$query.= "WHERE ProductId LIKE '". $category . "%'";
	$query .=  " LIMIT " . $limit;
	$output = "";
	$result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$output .= "<div class = 'product'>
					<img src = '". $row["productImage"] . "'/><br/>"
					.$row["ProductName"] . "<br/>"
					. "$".$row["ProductCost"]
					.'<button type = "button" onclick = "add2Cart(&apos;' . $row["ProductName"] . '&apos;)"> Add </button> '
				."</div>";
        }
		/*
			The loop will repeat print div elements that display the info about the queried record.
			For Example:
				class = "product">
				<img src = "img/Food/pancakes.png"/><br/>
				Pancake<br/>
				$3
				ton type = "button" onclick = "add2Cart("foodPancakes")"> Add </button>
				</div>
		*/
		echo $output;
    }
?>