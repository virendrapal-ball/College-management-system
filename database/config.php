<?php

$host = "localhost";
$username = "root";
// $password = "phpmyadmin";
$password = "";
$dbname = "college";

try{

    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $username,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected successfully";

}
catch(PDOException $e){

    echo "Not Connected";

    die("Database Error : " . $e->getMessage());

}
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>