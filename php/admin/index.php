<?php

	require_once("../config.php");
	session_start();
	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if(isset($_GET["logout"])) {
		unset($_SESSION["admin"]);
		header("location: index.php");
	}

	$loggedin = 0;
	$update = 0;

	if(isset($_SESSION["admin"])) {
		$loggedin = 1;
		$name = ($_SESSION["admin"]);
	}

	if(isset($_POST["uname"]) && isset($_POST["pword"])) {
		$username = $_POST["uname"];
		$password = $_POST["pword"];

		$stmt = "SELECT * FROM admin WHERE username ='".$username."'  AND password ='".$password."'";

		$result = $conn->query($stmt);

		if ($result->num_rows === 1) {
			$_SESSION['admin']= $username;
			header("location: ?loggedin");
		} else {
		    echo "The username or password is incorrect.";
		}

	}
?>

<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="../style/css/bootstrap.css">
	<link rel="stylesheet" href="../style/css/style.css">
</head>
<body>


	<?php if($loggedin == 0) { ?>
		<div class="wrapper">
<form action="" method="POST">

        <h2>Admin Login</h2>

        <p>Please fill in your credentials to login.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group">

                <label>Username:<sup>*</sup></label>

                <input type="text" name="uname"class="form-control">

            </div>

            <div class="form-group">

                <label>Password:<sup>*</sup></label>

                <input type="password" name="pword" class="form-control">

            </div>

            <div class="form-group">

                <input type="submit" class="btn btn-primary" value="Submit">

            </div>

</form>
</div>
<?php } else { ?>
	<div style="text-align:center; margin-top:18%">
	<div class="cont" style="margin:3px; padding:5px;">
	<a href="addcarosel.php">ADD carosel</a><br>
	<a href="products.php">ADD Products</a><br>
	<a href="search.php?p=update">UPDATE Products</a><br>
	<a href="search.php?p=delete">DELETE Products</a><br>
	<a href="vieworders.php">VIEW orders</a><br>
</div>
</div>
<?php } ?>

</body>
</html>
<?php $conn->close(); ?>
