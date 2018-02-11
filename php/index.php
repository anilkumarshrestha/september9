<?php
require_once 'config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>september9</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link rel="stylesheet" href="style/css/style.css">
    <script src="/style/js/jquery.min.js"></script>
    <script src="/style/js/bootstrap.min.js"></script>
    <style type="text/css">
      .carousel{
          background: #2f4357;
          margin-top: 20px;
      }
      .carousel .item{
          min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
      }
      .carousel .item img{
          margin: 0 auto; /* Align slide image horizontally center */
      }
      .bs-example{
      	margin: 20px;
      }
    body{
      padding-top: 70px;

    }
    /*padding*/
    .bpadding{
    margin-top: 10px;
    }
    .bs-example{
      margin: 20px;
    }

    </style>
</head>
<!--
<html>
<head>
    <title>september9</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/style/css/bootstrap.css" />
    <link rel="stylesheet" href="/style/css/style.css">
    <script src="/style/js//1.12.4/jquery.min.js"></script>
    <script src="/style/js/bootstrap.min.js"></script>

    <style type="text/css">
    body{
      padding-top: 60px;
    }
    .navbar-nav{
      padding-top: 8px;
    }
    </style>
</head>
-->

<body>
<?php include "header.php";?>
<!--slide bar-->
<?php include "carousel.php";?>

<div class="category">
  <div class="hovereffect">
<img class="img-responsive" src="/images/mother.jpg" alt="">
<div class="overlay">
   <h2>FOR MOTHER</h2>
   <a class="info" href="mothpg.php">Find here</a>
</div>
  </div>
</div>

<div class="category">
  <div class="hovereffect">
<img class="img-responsive" src="/images/father.png" alt="">
<div class="overlay">
   <h2>FOR FATHER</h2>
   <a class="info" href="fathpg.php">Find here</a>
</div>
  </div>
</div>

<div class="category">
  <div class="hovereffect">
<img class="img-responsive" src="/images/mother.jpg" alt="">
<div class="overlay">
   <h2>FOR GIRLS</h2>
   <a class="info" href="girlpg.php">Find here</a>
</div>
  </div>
</div>

<div class="category">
  <div class="hovereffect">
<img class="img-responsive" src="/images/mother.jpg" alt="">
<div class="overlay">
   <h2>FOR BOYS</h2>
   <a class="info" href="boypg.php">Find here</a>
</div>
  </div>
</div>
</div>


<?php include "footer.php"?>

</footer>
</body>
