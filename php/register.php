<?php
require_once 'config.php';

//define variables and initialize with empty values
$email= $password = $confirm_password = $uname = $fname = $phone = "";
$email_err = $password_err = $confirm_password_err = $uname_err = $fname_err = $phone_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //VALIDATE USERNAME
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        //preparing a select statement
        $sql = "SELECT id FROM users WHERE email = :email";

        if($stmt = $pdo->prepare($sql)){
            //bind variable to the prepared statement as parameter
            $stmt->bindParam(':email',$param_email,PDO::PARAM_STR);
            //set parameter
            $param_email = trim($_POST["email"]);

            //attemp to execute prepared statement
            if($stmt->execute()){
                if ($stmt->rowCount() == 1){
                    $email_err="This email is already taken.";

                }else {
                    $email = trim($_POST["email"]);
                }
        } else{
            echo "Something went wrong! please try agin later.";

        }
    }

    //close statement
    unset($stmt);
}


    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password= trim($_POST['password']);
    }

    //validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = "Password did not match.";
        }
    }


    if(empty(trim($_POST["uname"]))){
        $confirm_password_err = 'Username cannot be left empty.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = "Password did not match.";
        }
    }

    $fields = array("uname", "fname", "phone");
    $input = array();
    $err = array();
    foreach ($fields as $field) {
      if(empty(trim($_POST[$field]))){
          $err[$field] = 'This field cannot be left empty.';
      } else{
            $input[$field] = trim($_POST[$field]);
      }
    }

    $uname_err = $err["uname"];
    $fname_err = $err["fname"];
    $phone_err = $err["phone"];


// Close connection

unset($pdo);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta char="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link rel="stylesheet" href="style/css/style.css">
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
  		<a class="navbar-brand" href="/">September9</a>
  	</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="nav navbar-nav">
        <li>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </li>
      <?php
      if (!isset($_SESSION["email"])) {
      ?>
				<li ><a href="login.php" >Log In</a></li>
				<li><a href="register.php" >Register</a></li>
        <?php
        } else  { ?>
            <li class="nav-item">
             <a class="nav-link" href="logout.php">Logout</a>
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

    <div class="wrapper">
        <h2>Register</h2>

        <p>Create an account.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">

                <label>Email:<sup>*</sup></label>

                <input type="email" name="email"class="form-control" value="<?php echo $email; ?>">

                <span class="help-block"><?php echo $email_err; ?></span>

            </div>

            <div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">

                            <label>Name:<sup>*</sup></label>

                            <input type="text" name="fname"class="form-control" value="<?php echo $fname; ?>">

                            <span class="help-block"><?php echo $fname_err; ?></span>

                        </div>
                        <div class="form-group <?php echo (!empty($uname_err)) ? 'has-error' : ''; ?>">

                            <label>Username:<sup>*</sup></label>

                            <input type="text" name="uname" class="form-control" value="<?php echo $uname; ?>">

                            <span class="help-block"><?php echo $uname_err; ?></span>

                        </div>
                    <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">

                          <label>Phone number:<sup>*</sup></label>

                          <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">

                          <span class="help-block"><?php echo $phone_err; ?></span>

                      </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                <label>Password:<sup>*</sup></label>

                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">

                <span class="help-block"><?php echo $password_err; ?></span>

            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">

                <label>Confirm Password:<sup>*</sup></label>

                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">

                <span class="help-block"><?php echo $confirm_password_err; ?></span>

            </div>

            <div class="form-group">

                <input type="submit" class="btn btn-primary" value="Submit">

                <input type="reset" class="btn btn-default" value="Reset">

            </div>

            <p>Already have an account? <a href="login.php">Login here</a>.</p>

        </form>

    </div>

</body>

</html>
