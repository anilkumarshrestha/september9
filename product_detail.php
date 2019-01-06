<?php
require_once 'config.php';
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
session_start();


?>

<!DOCTYPE html>
<head>
    <title>september9</title>
    <meta char="UTF-8">
    <title>Register</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="style/css/bootstrap.css">
      <link rel="stylesheet" href="style/css/style.css">

      <style type="text/css">
      body{
        padding-top: 70px;
        margin-left: 20px;
        background-color: #eee;
      }
      /*padding*/
      .bpadding{
      margin-top: 15px;
      }

      </style>
</head>
<body style="height:100%;">


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
}



if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment_sub"])){
  $prod_id = $_GET["id"];
  $name = $_POST["uname"];
  $email = $_POST["uemail"];
  $comment = $_POST["ucomment"];
  $stmt= $pdo->prepare("INSERT INTO comments (`product_id`,`name`,`email`,`comment`,`date`) VALUES (?,?,?,?,NOW())");
  $stmt->bindParam(1,$prod_id);
  $stmt->bindParam(2, $name);
  $stmt->bindParam(3, $email);
  $stmt->bindParam(4, $comment);

  // NOW() is not a part of PHP
  if (!$stmt->execute()) {
    print "Something went wrong in the database. Please try again.\n";
  }
  else{
    $successmsg = "Your comment was successful. Thank You for your Comment.";
    echo $successmsg;
  }

  exit;
}


if(isset($_SESSION["id"])) {
  $id = $_SESSION["id"];

  $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
  $stmt->bindParam(1,$id);
  if ($stmt->execute()) {
    $user = $stmt->fetch();
  } else {
      echo "No records found.";
  }
}

if(isset($_GET["id"])) {
  $id= $_GET["id"];
  $stmt = $pdo->prepare("SELECT * FROM products WHERE id =?");
  $stmt->bindParam(1,$id);
  if ($stmt->execute()) {
    $product = $stmt->fetch();
  } else {
      echo "No records found.";
  }
}

/*
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment_sub"])){
  $name = $_POST["uname"];
  $email = $_POST["uemail"];
  $comment = $_POST["ucomment"];
  $sql = "INSERT INTO `comments` ( `product_id`, `name`, `email`, `comment`, `date`) VALUES ('".$prod_id."', '".$name."', '".$email."', '".$comment."', NOW())";
  $result = $c}onn->query($sql);
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
*/


if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["wlist"])){
    if(isset($user))
    {
    $uid= $user['id'];
    $prod_id = $_GET["id"];
    $stmt= $pdo->prepare("INSERT INTO wishlist (`uid`,`prod_id`) VALUES (?,?)");
    $stmt->bindParam(1,$uid);
    $stmt->bindParam(2,$prod_id);
    if(!$stmt->execute()){
            echo "Success.";
            }
    }
    else{
    echo "Your are not logged it. Please SignUp/Login to add to your wishlist.";
    }
    exit;
}


    $row = $stmt->fetch();
    unset($stmt);
?>
<div class="bs-example">
    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>
          <?php
          if (isset($_GET["cat"])) {
              echo getCat($_GET["cat"]);
          }
          ?>
      </li>
        <li class="active">
        <?php
        echo $product["name"];
        ?>
      </li>
    </ul>
</div>

<div class ="container">
  <div class="row">
        <div class="col-md-4">
          <img class="imgcrop" width="356px" src="<?php echo $product["image"]; ?>">
        </div>
        <div class="col-md-8" style="text-align:centre;">
          <h1 class="head"><?php echo $product["name"];?></h1><br>
          <div class="container" style="margin-left:25%;">
            <div class="row">
                <div class="col-md-2">
                  <label for="color"><span class="color">Color:</span><br></label>
                    <select class ="box">
                        <option>white</option>
                        <option>Black</option>
                        <option>Grey</option>
                        <option>While</option>
                        <option>maroon</option>
                    </select>
                </div>
                <div class="col-md-2">
                  <label for="color"><span class="color">Size:</span><br></label>
                    <select class="box">
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                        <option>X-large</option>
                    </select>
                </div>
              </div>
            </div>

            <br>
              <div class="row">
              <div class="col-md-8" style="margin-left:25%;"><h4><strong>Features:</strong></h4></div>
                <div class="col-md-4" style="margin-left:28%;"><?php echo $product["description"]; ?></div>
            </div>
        <br>
          <div class="container" style="margin-left:10%;">
            <div class="row">
              <div class="col-md-8" style="margin-left:10%;">
              <button  class="btn btn-lg btn-primary" disabled="disabled"><strong>रू <?php if($product["specialoffer"] !== "0") {echo "<strike>" . $product["price"]. "</strike> " . $product["specialoffer"];} else { echo $product["price"];} ?> मात्र</strong></button>
              </div>
            </div><br>
            <div class="row">
              <div class="col-md-2">
                <a class="btn btn-success btn-lg btn-block" href="order.php?id=<?php echo $product["id"]; ?>" class="orderbtn">ORDER NOW</a>
              </div>
              <div class="col-md-2">
              <form method="POST" action="">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" name="wlist">Add to wishlist</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
          <br><br>
          <div class="container">
          <div class="row">
            <div style="align:centre">
          <iframe width="600" height="450" src="<?php echo $product["youtubelink"]; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
        </div>
             <br>

      </div>
</div>
    <!--
    <div id="leftside">
        <img class="imgcrop" width="356px" src="<?php echo $product["image"]; ?>">
    </div>
    <div id="rightside">
        <h1 class="head"><?php echo $product["name"];?></h1><br>
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
        <?php echo $product["description"]; ?>}
        <br>
        <br>
        <p span class="bold">रू <?php if($product["specialoffer"] !== "0") {echo "<strike>" . $product["price"]. "</strike> " . $product["specialoffer"];} else { echo $product["price"];} ?> </span></p>

        <a class="button" href="order.php?id=<?php echo $product["id"]; ?>" class="orderbtn">ORDER NOW</a>
        <form method="POST" action="">
            <button type="submit" name="wlist">Add to wishlist</button>
        </form>
        <br>
        <iframe width="400" height="315" src="<?php echo $product["youtubelink"]; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
-->
           <br>

      <div class="row">
        <div class="col-md-6">
          <form action="" method="POST">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="uname" value="<?php if(isset($user)){echo $user["name"];} ?>">
            </div>
            <div class="form-group">
              <label>Email</label>
             <input type="email" class="form-control" id="exampleInputEmail" placeholder=email name="uemail" value="<?php if(isset($user)){echo $user["email"];} ?>">
           </div>

        <div class="form-group">
          <label>Comment</label>
                <textarea class="form-control" id="exampleInputEmail" placeholder="your comment..." row="3" name="ucomment" rows="4" cols="50"></textarea>
          </div>
          <div class="form-group">
              <input type="submit" name="comment_sub" class="btn btn-success" value="Submit Comment"></td>
            </div>

          </form>
        </div>
      </div>
    </div>
          <div class="container">
          <div class="row">
          <div class="col-sm-12">
          <h3>User Comment</h3>
          </div><!-- /col-sm-12 -->
          </div><!-- /row -->
            <?php
                $prod_id = $_GET["id"];
                $stmt= $pdo->prepare("SELECT * FROM comments WHERE product_id=?");
                $stmt-> bindParam(1,$prod_id);
                $stmt->execute();
                while($row = $stmt->fetch()){
                  include "cmt.php";
                }

        ?>
      </div><!-- /container -->
    </div>
</div>

<?php include "footer.php"; ?>
<script src="/style/js/jquery.min.js"></script>
<script src="/style/js/bootstrap.min.js"></script>
</body>
</html>
