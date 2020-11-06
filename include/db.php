<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trucks";

$from_db = "inventory";
$row_limit = 9;

try {
    $dbh = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password,
        array(
            PDO::ATTR_PERSISTENT => true
        )
    );
// var_export($dbh);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}




?>