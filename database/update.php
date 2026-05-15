<?php
include "config.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $Fname = $_POST['fname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $reg = $_POST['id'];
    $role = $_POST['role'];
    $course = $_POST['course'];
    
}
$query = "UPDATE reg set name =?, dob = ?, email=?, mobile =?, role=?, course=? where reg_id =?";
$data = $conn->prepare($query);
$data->execute([$Fname,$dob,$email,$mobile,$role,$course,$reg]);
$message = "data update successfully";
header("Location: /php_code/template/Dashboard.php")

?>