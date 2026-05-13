<?php
session_start();
// if ($_SESSION['role']=='admin'){
//     echo 'hello';
// }
// elseif($_SESSION['role']=="Teacher"){
//     echo 'you are a teacher';
// }
// else if($_SESSION['role']=="Student"){
//     echo 'you are a student';
// }
// else{
//     echo " non";
// };
include "config.php";
$query = "Select reg_id from reg";
$data = $conn->prepare($query);
$data->execute();
$stud = $data->fetchAll(PDO::FETCH_ASSOC);
$json = urlencode(json_encode($stud));
// // var_dump($stud['reg_id']);
// echo '<pre>';
// print_r($stud);
// echo '<pre>';
// die('khjhjhhj');
header("Location: /php_code/template/Dashboard.php?student=$json");
?>