<?php
session_start();
include "config.php";
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    // echo $email;
    $query = "SELECT *
    FROM admin 
    WHERE admin_email = ?";
    $data = $conn->prepare($query);
    $data->execute([$email]);
    $user = $data->fetch();
    if ($pass==$user['admin_password']){
        $_SESSION['user_name'] =$user['admin_name'];
        $_SESSION['email'] =$user['admin_email'];
        $_SESSION['role'] =$user['role'];
        echo $user['role'];
        header("Location: /php_code/template/Dashboard.php");
    }
    else{
        header("Location: /php_code/template/login_page.php");
    }
}
?>