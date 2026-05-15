<?php
include "config.php";
function get_data($id){
    global $conn;
    $query = "Select * from reg Where reg_id = ? ";
    $data = $conn->prepare($query);
    $data->execute([$id]);
    $stud = $data->fetch(PDO::FETCH_ASSOC);
    return $stud;
}
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
function alot_teacher(){
    global $conn;
    $query = "SELECT s.name AS student_name,s.course,t.name AS teacher_name FROM reg s INNER JOIN reg t ON s.course = t.course WHERE s.role = 'student'AND t.role = 'teacher' AND s.status='Approved' AND t.status= 'Approved' ";
    $data = $conn->prepare($query);
    $data->execute();
    $stud = $data->fetchAll(PDO::FETCH_ASSOC);
    return $stud;
}
?>
<!-- <?php
print_r(alot_teacher());
?> -->