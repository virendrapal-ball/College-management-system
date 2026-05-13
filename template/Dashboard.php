<?php

include "header.php";
echo  "dashboard";
$all_data = $_GET['student'];
die();
$data = json_decode($_GET['stud'], true);
print_r($_data);
?>
