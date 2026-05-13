<?php
include "config.php";
$query = "Select * from reg";
$data = $conn->prepare($query);
$data->execute();
$stud = $data->fetchAll(PDO::FETCH_ASSOC);
print_r($stud);
?>