<?php
include "config.php";
$user_id = $_GET['reg_num'];
$query = "UPDATE reg set status = ? WHERE reg_id = ?";
$data = $conn->prepare($query);
$data->execute(["Approve",$user_id]);
header("Location: /php_code/template/Dashboard.php");
exit;
    
?>