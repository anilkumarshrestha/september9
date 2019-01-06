<?php

	require_once("config.php");

	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);



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
<?php
	if(isset($_GET["p"])) {
		$productname = htmlspecialchars($_GET["p"]);
		$stmt = "SELECT * FROM products WHERE tags LIKE '%".$productname."%'";

		$result = $conn->query($stmt);

		$products = array();
		if ($result->num_rows > 0) {?>
                        <h2>Occassion:<?php echo htmlspecialchars($_GET["p"]); ?></h2>
                        <?php
			while($row = $result->fetch_assoc()) {
				array_push($products, $row);
			}
		} else {?>
			<h2>Occassion:<?php echo htmlspecialchars($_GET["p"]); ?></h2>
			<?php
				echo "No records found.";
		}
	}
?>
<div style="margin-left:20%; margin-top:3%">
<div class="cont" style="margin:3px; padding:5px;">
<div>

	<?php
		if(isset($products) && count($products) != 0) {
			foreach($products as $product) {
		?><div class="product"><img src="<?php echo "../" . $product["image"]; ?>" style="display:inline-block;" width="200"><a style="display:inline-block" href="products.php?view&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></div>
		<?php
			}
		}
	?>
</div>
</div>
</body>
</html>
