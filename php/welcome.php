<?php

// Initialize the session

session_start();

 

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  header("location: login.php");
  exit;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta char="UTF-8">
    <title>Welcom | september9 | Share Gift Share Happiness</title>
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link rel="stylesheet" href="style/css/style.css">
</head>
<body>
<header>
    <a href="index.php">
        <div class="class-heading" style='
            margin-bottom:20px;
            padding: 10px 20px;'>
            <h1><b>September9</b> |<span id="share-happiness"> Share gifts share happiness</span></h1>
        </div>
    </a>
</header>

<div class="category" width:350 height:200>
    <div class="hovereffect">
        <img class="img-responsive" src="mother.jpg" alt="">
        <div class="overlay">
           <h2>FOR MOTHER</h2>
           <a class="info" href="index-mother.php">Find here</a>
        </div>
    </div>
</div>


<div class="category">
    <div class="hovereffect">
        <img class="img-responsive" src="father.png" alt="">
        <div class="overlay">
           <h2>FOR FATHER</h2>
           <a class="info" href="index-father.php">Find here</a>
        </div>
    </div>
</div>

<div class="category">
    <div class="hovereffect">
        <img class="img-responsive" src="mother.jpg" alt="">
        <div class="overlay">
           <h2>FOR GIRLS</h2>
           <a class="info" href="index-girls.php">Find here</a>
        </div>
    </div>
</div>

<div class="category">
    <div class="hovereffect">
        <img class="img-responsive" src="mother.jpg" alt="">
        <div class="overlay">
           <h2>FOR BOYS</h2>
           <a class="info" href="index-boys.php">Find here</a>
        </div>
    </div>
</div>






</body>
</html>
