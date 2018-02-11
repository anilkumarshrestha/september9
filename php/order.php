<?php
require_once 'config.php';

	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

session_start();

if(isset($_SESSION["id"])) {
  $id = $_SESSION["id"];

  $stmt = "SELECT * FROM users WHERE id = ".$id;

  $result = $conn->query($stmt);

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
  } else {
      echo "No records found.";
  }
}

if(isset($_GET["id"])) {
  $id= $_GET["id"];
  $stmt = "SELECT * FROM products WHERE id = ".$id;

  $result = $conn->query($stmt);

  if ($result->num_rows === 1) {
    $product = $result->fetch_assoc();
  } else {
      echo "No records found.";
  }
}

if(isset($_POST["order"])){
    $id=$_POST["id"];
    $name=$_POST["name"];
    $address=$_POST["address"];
    $phone=$_POST["phonenumber"];
    $stmt = "INSERT INTO orders (`id`,`product_id`,`buyername`, `address`, `phone`, `ordertime`,`delivered`) VALUES (NULL, ".$id.", '".$name."', '".$address."', '".$phone."', NOW(), 0)";

    $result = $conn->query($stmt);

  if ($result) {
		echo "Your order was successful.";
  } else {
      echo "Something went wrong.";
  }

}

?>

<html>
<head>
    <title>september9</title>
    <link rel="stylesheet" href="/style/css/bootstrap.css" />
    <link rel="stylesheet" href="/style/css/style.css">
    <style type="text/css">
    .bpadding{
        margin-top:70px;
    }
    </style>
</head>


<body>

<?php
include "header.php";
?>

<div style="text-align:center; margin-top: 10%">
<div class="cont" style="margin:3px; padding:5px;">
    <form method="POST" action="">
      <input type="hidden" name="id" value="<?php if(isset($product)) {echo $product["id"];} ?>">
      Product Name: <input type="text" value="<?php if(isset($product)) {echo $product["name"];} ?>" disabled><br>
      Buyer's Name: <input type="text" value="<?php if(isset($user)) {echo $user["name"];} ?>" name="name" ><br>
      Address: <input type="text" value="<?php if(isset($user)) {echo $user["address"];} ?>" name="address"><br>
      Phone number: <input type="text" value="<?php if(isset($user)) {echo $user["phone"];} ?>" name="phonenumber"><br>
      <input type="submit" name="order" value="ORDER">
    </form>
</div>
</div>



</body>
</html>
