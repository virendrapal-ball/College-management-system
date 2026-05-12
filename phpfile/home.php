<?php 
include "database/db.php";

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $user_email = $_POST['email'];
    $password = $_POST['password'];
    
}
else{
    echo "Data not found";
}
$query = "SELECT * FROM ADMIN";
    $result = mysqli_query($conn,$query);

?>