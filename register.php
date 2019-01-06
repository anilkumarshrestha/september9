<?php
require_once 'config.php';

//define variables and initialize with empty values
$email= $password = $confirm_password = $uname = $fname = $phone = "";
$email_err = $password_err = $confirm_password_err = $uname_err = $fname_err = $phone_err = "";

$insert = 'y';
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
                    exit;

                }else {
                    $email = trim($_POST["email"]);
                }
        } else{
            echo "Something went wrong! please try agin later.";
            exit;
        }
    }

    //close statement
    unset($stmt);
}

  /*  $input= $_POST['phone'];
    $number=preg_replace("/^\d/","", $number);
    $length = strlen((string) $number);

    if(!is_numeric($input){
      $phone_err="Phone must be digit";
      $insert="n";
    }elseif($length != 10){
      $phone_err="Phone number must be 10 digit.";
      $insert="n";
    }else{
      $phone= trim($_POST['phone']);
    }
*/

    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
        $insert = 'n';
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
            $insert = 'n';

        }
    }


    if(empty(trim($_POST["uname"]))){
        $confirm_password_err = 'Username cannot be left empty.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = "Password did not match.";
            $insert = 'n';
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
            $err[$field] = '';
      }
    }

    $uname_err = $err["uname"];
    $fname_err = $err["fname"];
    $phone_err = $err["phone"];

    if (isset($insert) && $insert == 'y') {
      $stmt = $pdo->prepare("INSERT INTO users (password, email, name,phone ) VALUES (?, ?, ?, ?)");
      $hashed_pw = password_hash($password, PASSWORD_DEFAULT);
      $stmt->bindParam(1, $hashed_pw);
      $stmt->bindParam(2, $email);
      $stmt->bindParam(3, $input["fname"]);
      $stmt->bindParam(4, $input["phone"]);
      if (!$stmt->execute()) {
        print "Something went wrong in the database. Please try again.\n";
      }

      header("location: login.php");
      exit;
    }


// Close connection

unset($pdo);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
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


<body>

<?php include "header.php";?>
<div class="row">
  <div class="col-xs-4">
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
  <div class="col-xs-2">

  </div>
  <div class="col-xs-6">
    <h2>
        Why would you want to Register?
    </h2>
    <p>
    <ul>
       <li>Add to your wish list</li>
       <li>Comment on the product</li>
       <li>Get chance to be featured on product video review</li>
       <li>And Many More</li>
    </ul>
    </p>
    <div>
      <img height="600" src="/images/webimg/2075.png">
    </div>
  </div>
</div>
<br>
<?php include "footer.php"?>

<script src="/style/js/jquery.min.js"></script>
<script src="/style/js/bootstrap.min.js"></script>
</body>

</html>
