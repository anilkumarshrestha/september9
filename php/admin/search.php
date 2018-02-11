<?php

	require_once("../config.php");

	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if(isset($_POST["product"])) {
		$productname = trim($_POST["product"]);
		$stmt = "SELECT * FROM products WHERE name LIKE '%".$productname."%'";

		$result = $conn->query($stmt);

		$products = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($products, $row);
			}
		} else {
		    echo "No records found.";
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
		<title>Product search</title>
</head>
<body>
	<a href="index.php"> GO TO MAIN MENU</a>
	<div style="text-align:center; margin-top:3%">
	<div class="cont" style="margin:3px; padding:5px;">
		<form method="POST" action="<?php if(isset($_GET["p"])) {echo "?" . trim($_GET["p"]);}?>">
			<p>Search Product</p>
				<input type="text" id="product" placeholder="Search" name="product" >
		</form>
		<?php
			if(isset($products) && count($products) != 0) {
				foreach($products as $product) {
			?><div class="product"><img src="<?php echo "../" . $product["image"]; ?>" style="display:inline-block;" width="90"><a style="display:inline-block" href="products.php?view&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></div>
			<?php
				}
			}
		?>
	</div>
</div>
</body>
</html>
