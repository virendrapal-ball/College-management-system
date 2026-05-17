<?php

include "config.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $full_name = $_POST['fname'];
    if (empty($full_name)){
        header("Location: /php_code/template/student_registration.php");
        exit;
    }
    
    $dob = $_POST['dob'];
    if (empty($dob)&& (!preg_match("/^[0-9]{10}$/", $mobile))){
        header("Location: /php_code/template/student_registration.php");
        exit;
    }
    $email = $_POST['email'];
    if (empty($email) && (!filter_var($email, FILTER_VALIDATE_EMAIL))){
        header("Location: /php_code/template/student_registration.php");
        exit;
    }
    $mobile = $_POST['mobile'];
    if (empty($mobile)){
        header("Location: /php_code/template/student_registration.php");
        exit;
    }
    $role = $_POST['role'];
    if (empty($role)){
        header("Location: /php_code/template/student_registration.php");
        exit;
    }
    $course = $_POST['course'];
    if (empty($course)){
        header("Location: /php_code/template/student_registration.php");
        exit;
    }
    $pass = $_POST['password'];
    if (empty($pass)){
        header("Location: /php_code/template/student_registration.php");
        exit;
    }
    $password = password_hash($pass, PASSWORD_DEFAULT);

    $file_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $path = "uploads/" . basename($file_name);

    move_uploaded_file($tmp_name, $path);
    $query = "INSERT INTO reg
    (name, dob, email, mobile, role, course,pass,img)

    VALUES
    (:name, :dob, :email, :mobile, :role, :course ,:password ,:img_path)";

    $data = $conn->prepare($query);

    $data->bindParam(':name', $full_name);
    $data->bindParam(':dob', $dob);
    $data->bindParam(':email', $email);
    $data->bindParam(':mobile', $mobile);
    $data->bindParam(':role', $role);
    $data->bindParam(':course', $course);
    $data->bindParam(':password', $password);
    $data->bindParam(':img_path', $path);

    $result = $data->execute();

    if($result){
        header("Location: /php_code/template/login_page.php?success =1");

    } else {

        echo "Insert Failed";
    }
}
?>