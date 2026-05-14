<?php
include "config.php";
function teacher(){
    global $conn;
    $query = "Select * from reg Where role IN('Teacher','Student')";
    $data = $conn->prepare($query);
    $data->execute();
    $stud = $data->fetchAll(PDO::FETCH_ASSOC);
    return $stud;
}
function Student(){
    global $conn;
    $query = "Select * from reg Where role IN('Student')";
    $data = $conn->prepare($query);
    $data->execute();
    $stud = $data->fetchAll(PDO::FETCH_ASSOC);
    return $stud;
}
?>