<?php
session_start();
include "config.php";
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $email_id = $_POST['email'];
    $pass = $_POST['pass'];
    // echo $email;
    $query = "SELECT *
    FROM reg 
    WHERE email = ?";
    $data = $conn->prepare($query);
    $data->execute([$email_id]);
    $user = $data->fetch();
 
    if ($pass==$user['pass']){
        $_SESSION['user_name'] =$user['name'];
        $_SESSION['email'] =$user['email'];
        $_SESSION['role'] =$user['role'];
        echo $user['role'];
        header("Location: /php_code/template/Dashboard.php");
    }
    else{
        header("Location: /php_code/template/login_page.php");
    }
}
?>