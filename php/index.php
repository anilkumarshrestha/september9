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


<div class="container">
      <header class="header clearfix">
        <nav>
            <ul class="nav nav-pills float-right">
            <?php
            if (!isset($_SESSION["email"])) {
            ?>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Log In<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">Register</a>
                </li>
            <?php
            } else  { ?>
                <li class="nav-item">
                 <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php
            }
            ?>
            </ul>
        </nav>
      </header>


<div class="category" width:350 height:200>
    <div class="hovereffect">
        <img class="img-responsive" src="/images/mother.jpg" alt="">
        <div class="overlay">
           <h2>FOR MOTHER</h2>
           <a class="info" href="index-mother.php">Find here</a>
        </div>
    </div>
</div>

<div>
	<div class="category">
	    <div class="hovereffect">
		<img class="img-responsive" src="/images/father.png" alt="">
		<div class="overlay">
		   <h2>FOR FATHER</h2>
		   <a class="info" href="index-father.php">Find here</a>
		</div>
	    </div>
	</div>

	<div class="category">
	    <div class="hovereffect">
		<img class="img-responsive" src="/images/mother.jpg" alt="">
		<div class="overlay">
		   <h2>FOR GIRLS</h2>
		   <a class="info" href="index-girls.php">Find here</a>
		</div>
	    </div>
	</div>

	<div class="category">
	    <div class="hovereffect">
		<img class="img-responsive" src="/images/mother.jpg" alt="">
		<div class="overlay">
		   <h2>FOR BOYS</h2>
		   <a class="info" href="index-boys.php">Find here</a>
		</div>
	    </div>
	</div>
</div>





      <footer class="footer">
        <p>&copy; September9 2017</p>
      </footer>

    </div> <!-- /container -->
      


</body>
