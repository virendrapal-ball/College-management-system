<?php

include "config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
print_r($_POST['image']);
$file_name = $_FILES['image']['name'];

    $tmp_name = $_FILES['image']['tmp_name'];

    $path = "uploads/" .basenam(file_name);

    move_uploaded_file($tmp_name, $path);
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// if($_SERVER['REQUEST_METHOD'] == "POST"){

//     $Fname = $_POST['fname'];
//     $lname = $_POST['lname'];

//     $full_name = $Fname . " " . $lname;

//     $father = $_POST['father_name'];
//     $mother = $_POST['mother_name'];
//     $dob = $_POST['dob'];
//     $email = $_POST['email'];
//     $mobile = $_POST['mobile'];
//     $role = $_POST['role'];
//     $course = $_POST['course'];
//     $password = $_POST['password'];

//     $query = "INSERT INTO reg
//     (name, father_name, mother_name, dob, email, mobile, role, course,pass)

//     VALUES
//     (:name, :father, :mother, :dob, :email, :mobile, :role, :course ,:password)";

//     $data = $conn->prepare($query);

//     $data->bindParam(':name', $full_name);
//     $data->bindParam(':father', $father);
//     $data->bindParam(':mother', $mother);
//     $data->bindParam(':dob', $dob);
//     $data->bindParam(':email', $email);
//     $data->bindParam(':mobile', $mobile);
//     $data->bindParam(':role', $role);
//     $data->bindParam(':course', $course);
//     $data->bindParam(':password', $password);

//     $result = $data->execute();

//     if($result){

//         $message = "Data Inserted Successfully";
//         header("Location: /php_code/template/student_registration.php");

//     } else {

//         echo "Insert Failed";
//     }
// }
?>