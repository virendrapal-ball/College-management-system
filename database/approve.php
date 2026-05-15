<?php
include "config.php";
require_once "show_data.php";
$user_id = $_GET['reg_num'];
$data = get_data($user_id);
if ($data['status']=="Approved"){
    $st_update = "Not Approved";
}
else{
    $st_update = "Approved";
}
$query = "UPDATE reg set status = ? WHERE reg_id = ?";
$data = $conn->prepare($query);
$data->execute([$st_update,$user_id]);
header("Location: /php_code/template/Dashboard.php");
exit;
    
?>