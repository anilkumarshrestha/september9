<?php
require_once 'config.php';

session_start();


?>

<html>
<head>
    <title>september9</title>
    <link rel="stylesheet" href="/style/css/bootstrap.css" />
    <link rel="stylesheet" href="/style/css/style.css">
    <style>
    body{
      padding-top: 70px;
    }
    </style>
</head>
<body>
  <header>
    <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="container">
        <div class="navbar-header">
          <div class="navbar-header">
                 <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
        <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/">September9</a>
      </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <form class="navbar-form navbar-left">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                      </span>
                  </div>
            </form>

          <?php
          if (!isset($_SESSION["email"])) {
          ?>
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="login.php" >Log In</a></li>
            <li><a href="register.php" >Register</a></li>
            <?php
            } else  { ?>

                <li>
                 <a href="logout.php">Logout</a>
                </li>
            <?php
            }
            ?>
          </ul>
    </div>
    </div>
  </div>
  </nav>
  </header>




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

    <p class="prod-title"><?php echo $row["name"];?></p>
        <img class="prod-img" width="356px" src="<?php echo $row["image"]; ?>">
        <p class="price">रू<?php echo $row["price"]; ?></p>
<?php
}
?>

<footer class="footer">
            <p>&copy; September9 2017</p>
          </footer>




</body>
</html>
