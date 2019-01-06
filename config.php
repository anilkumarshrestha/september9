<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME','september9');
define('DB_PASSWORD','12345678');
define('DB_NAME','september9db');


/*connecting to mysql database*/
try{
    $pdo = new PDO("mysql:host=". DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOEXCEPTION $e){
    die("ERROR: Could not connect." . $e->getMessage());
}

function getCat($cat)
{
    if ($cat == 'F') {
        return "Father";
    }
    elseif($cat == 'M'){
        return "Mother";
    }

    elseif($cat == 'G'){
        return "Girls";
    }

    elseif($cat == 'B'){
        return "Boys";
    }
}
?>
