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


    /*
    $totalbought=$_POST["total-spent"];
    echo "$totalbought";
    $stmt1="INSERT INTO users (`totalbought`) VALUES (".$totalbought.")";
    $result1=$conn->query($stmt1);
*/
    if ($result ) {
        echo "Your order was successful.";
        ?>
        <div class="jumbotron text-xs-center" style="margin-left:10%; text-align:centre">
        <h1 class="display-3">Thank You!</h1>
          <p class="lead">Your delivery will be made soon. We will contact you shortly.</p>
          <hr>
          <p>
            Having trouble? <p>Contact us: <ul>
                                                <li>9860302475</li>
                                                <li>KUBH, Dhulikhel, Kavre.</li>
                                            </ul></p>
          </p>
          <p class="lead">
            <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
          </p>
        </div>

<?php
      } else {
        echo "Something went wrong.";
      }

}


?>

<html>
<head>
    <title> Order |september9</title>
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
  <h2>The <span class="text-primary">Awesome</span> product you have choosen to <strong>Order</strong> from us:</h2>
    <form method="POST" action="">
      <img height="300px;" src="<?php if(isset($product)) {echo $product["image"];} ?>" alt=""><br><br>
      <input type="hidden" name="id" value="<?php if(isset($product)) {echo $product["id"];} ?>">
      Product Name: <input type="text" value="<?php if(isset($product)) {echo $product["name"];}  ?>"disabled ><br>
      Product Price: <input type="text" value="<?php if(isset($product)) {echo $product["price"];} ?>" disabled ><br>
      Buyer's Name: <input type="text" value="<?php if(isset($user)) {echo $user["name"];} ?>" name="name" ><br>
      Address: <input type="text" value="<?php if(isset($user)) {echo $user["address"];} ?>" name="address"><br>
      Phone number: <input type="text" value="<?php if(isset($user)) {echo $user["phone"];} ?>" name="phonenumber"><br>
<!--      Your Bought of all time: <input type="text" name="total-spent" value="<?php if(isset($user)) {echo $user["totalbought"];}?>" ><br> -->
      <input type="submit" name="order" class="btn btn-success" value="ORDER">
      <br>
    </form>

</div>
</div>



</body>
</html>
