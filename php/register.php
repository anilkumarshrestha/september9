<?php
require_once 'config.php';

//define variables and initialize with empty values
$email= $password = $confirm_password = "";
$email_err = $password_err = $confirm_password_err = "";

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


    //check for errors before inserting into database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){



    // Prepare an insert statement

    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";



    if($stmt = $pdo->prepare($sql)){

        // Bind variables to the prepared statement as parameters

        $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);

        $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);



        // Set parameters

        $param_email = $email;

        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash



        // Attempt to execute the prepared statement

        if($stmt->execute()){

            // Redirect to login page

            header("location: login.php");

        } else{

            echo "Something went wrong. Please try again later.";

        }

    }



    // Close statement

    unset($stmt);

}



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
        <h2>Register</h2>

        <p>Create an account.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">

                <label>Email:<sup>*</sup></label>

                <input type="email" name="email"class="form-control" value="<?php echo $email; ?>">

                <span class="help-block"><?php echo $email_err; ?></span>

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
