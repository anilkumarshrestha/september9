<?php
require_once 'config.php';

session_start();


?>

<html>
<head>
    <title>september9</title>
    <meta char="UTF-8">
    <title>Register</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="style/css/bootstrap.css">
      <link rel="stylesheet" href="style/css/style.css">
      <script src="/style/js/jquery.min.js"></script>
      <script src="/style/js/bootstrap.min.js"></script>
      <style type="text/css">
      body{
        padding-top: 70px;
        margin-left: 20px;
      }
      /*padding*/
      .bpadding{
      margin-top: 15px;
      }

      </style>
</head>
<body>
  <?php include "header.php"; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $prod_id = $_GET["id"];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
    $stmt->bindParam(1, $prod_id);
    if (!$stmt->execute()) {
        print "Database error.";
        exit;
    }

    $row = $stmt->fetch();
    unset($stmt);
?>

<div class="bs-example">
    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="fathpg.php">For Father</a></li>
        <li class="active"><?php echo $row["name"];?></li>
    </ul>
</div>

<div class ="container-fluid">
    <div id="leftside"> 
        <img class="imgcrop" width="356px" src="<?php echo $row["image"]; ?>">
    </div>
    <div id="rightside">
        <h1 class="head"><?php echo $row["name"];?></h1><br>
        <br>
        <p class="drawline"></p>
        <br>
        <label for="color"><span class="color">Color:</span><br></label>
        <select class ="box">
            <option>white</option>
            <option>Black</option>
            <option>Grey</option>
            <option>While</option>
            <option>maroon</option>
        </select>

        <br>
        <br>
        <label for="color"><span class="color">Size:</span><br></label>
        <select class="box">
            <option>Small</option>
            <option>Medium</option>
            <option>Large</option>
            <option>X-large</option>
        </select>
        <br>
        <?php echo $row["description"]; ?>
        <br>
        <br>
        <p span class="bold">रू <?php if($row["specialoffer"] !== "0") {echo "<strike>" . $row["price"]. "</strike> " . $row["specialoffer"];} else { echo $row["price"];} ?> </span></p>

        <a class="button" href="order.php?id=<?php echo $row["id"]; ?>" class="orderbtn">ORDER NOW</a>
    <br>
            <iframe width="400" height="315" src="<?php echo $row["youtubelink"]; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
           
    </div>
</div>
<?php
}
?>
<?php include "footer.php"?>


</body>
</html>
