<?php
include "config.php";
$user_id = $_GET['reg_num'];
$query = "DELETE FROM reg WHERE reg_id = ?";
$data = $conn->prepare($query);
$data->execute([$user_id]);
header("Location: /php_code/template/Dashboard.php");
exit;
    
?>