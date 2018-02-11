<?php

	require_once("../config.php");

	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$stmt = "SELECT * FROM orders";

		$result = $conn->query($stmt);

		$orders = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($orders, $row);
			}
		}

		$stmt = "SELECT * FROM products";

		$result = $conn->query($stmt);

		$products = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($products, $row);
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
<div style="text-align:center; margin-top:2%">
<div class="cont" style="margin:3px; padding:5px;">

        <table boarder="1" cellpadding="10" cellspannig="5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>BUYER'S NAME</th>
                    <th>ADDRESS</th>
                    <th>PHONE NUMBER</th>
                    <th>ORDER TIME</th>
                    <th>DELEVERY</th>
                </tr>
            </thead>
        <?php if(count($orders) > 0) {
					foreach($orders as $order){
	?>
                <tr>

                    <td><?php echo $order["id"]; ?> </td>
                    <td><?php echo $order["buyername"]; ?> </td>
                    <td><?php echo $order["address"]; ?> </td>
                    <td><?php echo $order["phone"]; ?> </td>
                    <td><?php echo $order["ordertime"]; ?></td>
                    <td><?php echo $order["delivered"]; ?></td>

                </tr>
        <?php }

	} else { echo "No orders found.";} ?>

        </tbody>
    </table>
</div>
</div>
</body>
</html>
