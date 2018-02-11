<?php

	require_once("../config.php");


	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addcarosel"])){

		$target_dir = "../images/carousel/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

		if (file_exists($target_file)) {
		    echo "Sorry, image file already exists.";
		    $uploadOk = 0;
		}

		if ($_FILES["image"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";

		} else {
			move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		}

		$input["image"] = substr(($target_dir . $_FILES["image"]["name"]), 3);

		if($uploadOk === 1) {
			$sql = "INSERT INTO `carousel` (`image`) VALUES ('".$input["image"]."');";
			$result = $conn->query($sql);

		if ($result) {
				echo ("carousel was successfully added.");

		} else {
			echo "not uploaded";
		}
		}
	}

?>

<!DOCTYPE HTML>
<html>
<head>

</head>
<body>

<a href="index.php"> GO TO MAIN MENU</a><br><br>
<div style="text-align:center; margin-top:18%">
<div class="cont" style="margin:3px; padding:5px;">
	<h3>ADD carousel:</h3>
	<form method="POST" enctype="multipart/form-data">

			Image: <input type="file" name="image"><br>
			<?php
				echo ('<input type="submit" name="addcarosel" value="Add">');
			?>
	</form>
</div>
</div>
</body>
</html>
<?php $conn->close(); ?>
