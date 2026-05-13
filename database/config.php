<?php
$host = "localhost";
$username = "root";
$password = "phpmyadmin";
$dbname = "college";
try{
    $conn = new PDO("mysql:$host,$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die("DataBase error" .$e->getMessage());

}
?>