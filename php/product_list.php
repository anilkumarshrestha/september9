<?php

require_once 'config.php';
session_start();


$stmt = $pdo->prepare("SELECT * FROM products");
if (!$stmt->execute()) {
    print "Database error. Please try later.";
    exit;
}

while ($row = $stmt->fetch()) {
?>
<div class="product" width:350 height:350>
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
