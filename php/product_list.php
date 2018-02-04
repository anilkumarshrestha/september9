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
<div>
      <img class="img-responsive" width="100" src="<?php echo $row["image"]; ?>">
        <a href="product_detail.php?id=<?php echo $row["id"]; ?>">
            <?php echo (trim($row["name"]));?>
        </a>
        <?php echo $row["description"]; ?>
        <p class="price">रू <?php if($row["specialoffer"] !== "0") {echo "<strike>" . $row["price"]. "</strike> " . $row["specialoffer"];} else { echo $row["price"];} ?></p>



</div>
<?php
}
?>
