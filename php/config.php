<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME','darkcloud');
define('DB_PASSWORD','1997anilksd');
define('DB_NAME','september9');


/*connecting to mysql database*/
try{
    $pdo = new PDO("mysql:host=". DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOEXCEPTION $e){
    die("ERROR: Could not connect." . $e->getMessage());
}
?>
