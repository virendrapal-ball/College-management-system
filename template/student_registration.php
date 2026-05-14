<?php
include "header.php";
require_once "../database/config.php";
$res = $_GET['reg_num'];
$query = "Select * from reg Where reg_id = ? ";
$data = $conn->prepare($query);
$data->execute([$res]);
$stud = $data->fetchAll(PDO::FETCH_ASSOC);
// foreach($stud as $st){
//   echo $st['name'];
// }
// // print_r($stud);
// var_dump( $stud);
?>
<form class="row g-3 px-5 act" action = "/php_code/database/insert_data.php" method = "POST" encrypt ="multipart/form-data">
    <div class="col-md-6">
    <label for="inputtext4" class="form-label">First Name</label>
    <input type="text" class="form-control" value = "<?php echo $stud['name']?>" name= "fname" >
  </div>
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">Last Name</label>
    <input type="text" class="form-control" name= "lname">
  </div>
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">Father name</label>
    <input type="text" class="form-control" name= "father_name">
  </div>
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">Mother name</label>
    <input type="text" class="form-control" name= "mother_name">
  </div>
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">DOB</label>
    <input type="date" class="form-control" name= "dob">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name = "email">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Mobile Number</label>
    <input type="number" class="form-control" name = "mobile">
  </div>
  
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">Role</label>
    <select id="inputState" class="form-select" name = "role">
      <option selected>Choose Role</option>
      <option value="Teacher" >Teacher</option>
      <option value="Student" >Student</option>
    </select>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Course</label>
    <select id="inputState" class="form-select" name = "course">
      <option selected>Choose Course</option>
      <option value="PHP" >PHP</option>
      <option value="JAVA" >JAVA</option>
      <option value="PYTHON" >PYTHON</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">Create Password</label>
    <input type="text" class="form-control" name= "password">
  </div>
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">Confirm Password</label>
    <input type="text" class="form-control" name= "C_pass">
  </div>
  <div class="col-md-6">
    <label for="image" class="form-label">upload photo</label>
    <input type="file" class="form-control" name = "image" accept="image/*">
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>