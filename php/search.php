<?php

	require_once("config.php");

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
	  <meta charset="utf-8">
		<title>Product search</title>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="style/css/bootstrap.css">
	    <link rel="stylesheet" href="style/css/style.css">
	    <script src="/style/js/jquery.min.js"></script>
	    <script src="/style/js/bootstrap.min.js"></script>
	    <style type="text/css">
	      .carousel{
	          background: #2f4357;
	          margin-top: 20px;
	      }
	      .carousel .item{
	          min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
	      }
	      .carousel .item img{
	          margin: 0 auto; /* Align slide image horizontally center */
	      }
	      .bs-example{
	      	margin: 20px;
	      }
	    body{
	      padding-top: 70px;

	    }
	    /*padding*/
	    .bpadding{
	    margin-top: 15px;
	    }
	    .bs-example{
	      margin: 20px;
	    }

	    </style>
	</head>

<body>
<?php
include 'header.php';
?>
        <!--
	<form method="POST" action="<?php if(isset($_GET["p"])) {echo "?" . trim($_GET["p"]);}?>">
			<input type="text" id="product" placeholder="Search" name="product" >
	</form>
        -->
	<?php
		if(isset($products) && count($products) != 0) {
			foreach($products as $product) {
		?>

		<div class="product">
	                
			    <img src="<?php echo "../" . $product["image"]; ?>" style="display:inline-block;" width="150">
	
                            <a style="display:inline-block" href="product_detail.php?id=<?php echo $product["id"];?>">

			    <?php echo $product["name"]; ?>
			    <p class="price">रू <?php if($product["specialoffer"] !== "0") {echo "<strike>" . $product["price"]. "</strike> " . $product["specialoffer"];} else { echo $product["price"];} ?></p>
			    </a>
		</div>

		<?php
			}
            }
	?>
</body>
</html>
