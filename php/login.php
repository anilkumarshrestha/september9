<?php
require_once 'config.php';

$email = $password = "";
$email_err = $password_err = "";

//processing from data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //check if email field is empty
    if(empty(trim($_POST["email"]))){
        $email_err = 'Please enter email.';
    } else {
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = 'Please enter your password';
    } else {
        $password = trim($_POST["password"]);
    }

    //validate credentials
    if(empty($email_err) && empty($password_err)){
        //prepare a select statement
        $sql = "SELECT email, password FROM users WHERE email = :email";   //select column1, column2,.. FROM tablename
        if($stmt = $pdo->prepare($sql)){
            //bind variable to prepared statement as parameters
            $stmt->bindParam(':email',$param_email, PDO::PARAM_STR);

            //set parameter
            $param_email = trim($_POST["email"]);

            //attemp to execute the prepared statement
            if($stmt->execute()){
                //email exists? verifyPass : err
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $hashed_password = $row['password'];
                        if(password_verify($password,$hashed_password)){
                            //password true
                            session_start();
                            $_SESSION['email']= $email;
                            header("location: index.php");
                        } else {
                            $password_err = 'Password Incorrect';
                        }
                    } else {
                        //account False
                        $email_err = 'No account found with that email.';
                    }
                } else {
                    echo "Something went wrong. Please try again later.";
                }

            }
            //close statement
            unset($stmt);
        }

        //close connection
        unset($pdo);
    }    

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta char="UTF-8">
    <title>Log In | september9</title>
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


    <div class="wrapper">

        <h2>Login</h2>

        <p>Please fill in your credentials to login.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">

                <label>Email:<sup>*</sup></label>

                <input type="text" name="email"class="form-control" value="<?php echo $email; ?>">

                <span class="help-block"><?php echo $email_err; ?></span>

            </div>    

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">

                <label>Password:<sup>*</sup></label>

                <input type="password" name="password" class="form-control">

                <span class="help-block"><?php echo $password_err; ?></span>

            </div>

            <div class="form-group">

                <input type="submit" class="btn btn-primary" value="Submit">

            </div>

            <p>Don't have an account? <a href="register.php">Register</a>.</p>

        </form>

    </div>

</body>

</html>
