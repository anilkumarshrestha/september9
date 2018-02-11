<?php
require_once 'config.php';

session_start();

?>



<html lang="en">
<head>
    <title>September9 | For Boys</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="style/css/bootstrap.css">
      <link rel="stylesheet" href="style/css/style.css">
      <script src="/style/js/jquery.min.js"></script>
      <script src="/style/js/bootstrap.min.js"></script>
      <style type="text/css">
      body{
        padding-top: 70px;

      }
      /*padding*/
      .bpadding{
      margin-top: 15px;
      }

      </style>
</head>


<body>
  <?php include "header.php";?>

  <div class="bs-example">
  	<ul class="nav nav-pills">
          <li ><a href="/">Home</a></li>
          <li ><a href="mothpg.php">For Mother</a></li>
          <li ><a href="fathpg.php">For Father</a></li>
          <li ><a href="girlpg.php">For Girls</a></li>
          <li class="active"><a href="boypg.php">For Boys</a></li>
  	</ul>
  </div>



    <div class="container-fluid bpadding">
      <?php
      $stmt = $pdo->prepare("SELECT * FROM products WHERE cat_id = 4");
      if (!$stmt->execute()) {
          print "Database error. Please try later.";
          exit;
      }
      while ($row = $stmt->fetch()) {
      ?>



                <div class="col-sm-3">
                  <a href="product_detail.php?id=<?php echo $row["id"]; ?>">
              	    <img src="<?php echo $row["image"]; ?>" class="img-fluid" alt="Responsive image">
                    <p class="prod-title"><?php echo $row["name"];?></p>
              	    <p class="price">रू <?php if($row["specialoffer"] !== "0") {echo "<strike>" . $row["price"]. "</strike> " . $row["specialoffer"];} else { echo $row["price"];} ?></p>
                </a>

                </div>
                <div class="clearfix visible-md-block"></div>
          <?php
          }
          ?>
     </div>
  </div>

<?php include "footer.php"?>





</body>
</html>
