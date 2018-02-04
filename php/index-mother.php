<?php
require_once 'config.php';

session_start();

?>

<html>
<head>
    <title>september9</title>
    <link rel="stylesheet" href="/style/css/bootstrap.css" />
    <link rel="stylesheet" href="/style/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/style/css/style.css">

    <style type="text/css">
    body{
    	padding-top: 70px;
      margin-left: 20px;
    }
    /*padding*/
.bpadding{
margin-top: 15px;
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



  <div class="bs-example">
  	<ul class="nav nav-pills">
          <li ><a href="/">Home</a></li>
          <li class="active"><a href="index-mother.php">For Mother</a></li>
          <li><a href="index-father.php">For Father</a></li>
          <li><a href="index-girls.php">For Girls</a></li>
          <li><a href="index-boys.php">For Boys</a></li>
  	</ul>
  </div>



    <div class="container-fluid bpadding">
      <?php
      $stmt = $pdo->prepare("SELECT * FROM products WHERE cat_id = 1");
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
              	    <p class="price">रू.<?php echo $row["price"]; ?></p>
                </a>

                </div>
                <div class="clearfix visible-md-block"></div>
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
