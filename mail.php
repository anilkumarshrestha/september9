<?php
require_once 'config.php';

session_start();

?>

<html>
<head>
    <title>september9</title>
    <link rel="stylesheet" href="/style/css/bootstrap.css" />
    <link rel="stylesheet" href="/style/css/style.css">
</head>min/index.php


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

        <?php
        $stmt = $pdo->prepare("SELECT * FROM users");
        if (!$stmt->execute()) {
            print "Database error. Please try later.";
            exit;
        }
        while ($row = $stmt->fetch()) {

				$to = $row["email"];
				$subject = "Valentine day remainder!";
				$txt = "Valentine's Day is ready and so are our gifts. Grab your's today!";
				$headers = "From: anilkumarshrestha@yahoo.com";
				mail($to,$subject,$txt,$headers);
				?>

        <?php
        }
        ?>
        </div>
        </div>

        <footer class="footer">
            <p>&copy; September9 2017</p>
          </footer>




</body>
</html>
