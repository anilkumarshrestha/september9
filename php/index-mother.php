<?php
require_once 'config.php';

session_start();

?>

<html>
<head>
    <title>september9</title>
    <link rel="stylesheet" href="/style/css/bootstrap.css" />
    <link rel="stylesheet" href="/style/css/style.css">
</head>


<body>

<header>
    <a href="/">
        <div class="class-heading" style='
            margin-bottom:20px;
            padding: 10px 20px;'>
            <h1><b>September9</b> |<span id="share-happiness"> Share gifts share happiness</span></h1>
        </div>
    </a>
</header>
<div>
    Gifts for Mother
</div>

<?php
$stmt = $pdo->prepare("SELECT * FROM products");
if (!$stmt->execute()) {
    print "Database error. Please try later.";
    exit;
}

while ($row = $stmt->fetch()) {
?>
<div class="product_list" width:350 height:350>
    <div class="hovereffect">
        <a href="product.php?id=<?php echo $row["product_id"]; ?>">
            <img class="img-responsive" src="images/<?php echo $row["product_image"]; ?>">
        </a>
        <?php echo $row["product_des"]; ?>
        <p class="price">Rs. <?php echo $row["product_price"]; ?></p>

        
    </div>
</div>
<?php
}
?>
    <footer class="footer">
        <p>&copy; September9 2017</p>
      </footer>

      


</body>
</html>
