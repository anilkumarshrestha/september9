<?php

require_once 'config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>september9</title>
  <meta charset="utf-8">
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
      background-color: #eee;
    }
    /*padding*/
    .bpadding{
    margin-top: 10px;
    }
    .bs-example{
      margin: 20px;
    }

    </style>
</head>

<body>
<?php include "header.php";?>





<?php
if (!isset($_SESSION["id"])) {
    exit;
}
?>

<div class="container">
    <div class="cont" style="margin:3px; padding:5px;">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                </tr>
            </thead>
        <?php
        $uid = $_SESSION["id"];

        $stmt = $pdo->prepare("SELECT * FROM wishlist WHERE uid=?");
        $stmt->bindParam(1, $uid);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $prod_id = $row["prod_id"];
            $stmt2 = $pdo->prepare("SELECT * FROM products WHERE id=?");
            $stmt2->bindParam(1, $prod_id);
            $stmt2->execute();

            $prod_row = $stmt2->fetch();
        ?>
            <tr>
                <td><a href="product_detail.php?id=<?php echo $prod_row['id']; ?>"><?php echo $prod_row["name"]; ?></a></td>
                <td><img height="200" src="<?php echo $prod_row["image"]; ?>"></td>
                <td><strong><?php echo $prod_row["price"]; ?></strong></td>
                <td><input type="checkbox" name="prod[]" value="<?php echo $prod_row["id"]; ?>"></td>

            </a>
            </tr>
        <?php
        }
        ?>
        </table>
        
    </div>
</div>

<!--  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
-->
<!-- <?php
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();

echo "<table>\n";
while ($row=$stmt->fetch()) { ?> -->
<!-- <tr>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["id"]; ?></td>
<td><input type="checkbox" name="prod[]" value="<?php echo $row["id"]; ?>"></td>
</tr> -->
<!-- <?php
}
?> -->
<!-- <br>
<input type="submit" value="Eliminate" name="eliminate">
</form> -->
<?php include "footer.php"?>
</body>
</html>
