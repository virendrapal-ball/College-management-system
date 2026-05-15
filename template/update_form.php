<?php
include "header.php";
require_once "../database/config.php";
$res = $_GET['reg_num'];
if(!empty($res)){
$query = "Select * from reg Where reg_id = ? ";
$data = $conn->prepare($query);
$data->execute([$res]);
$stud = $data->fetch(PDO::FETCH_ASSOC);
}
// print_r ($stud);
?>

<form class="row g-3 px-5 act" action = "/php_code/database/update.php" method = "POST" encrypt ="multipart/form-data">
    <input type="text"  value = "<?php echo $stud['reg_id']?>" name= "id" hidden>  
<div class="col-md-6">
    <label for="inputtext4" class="form-label">First Name</label>
    <input type="text" class="form-control" value = "<?php echo $stud['name']?>" name= "fname" >
  </div>
  
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">DOB</label>
    <input type="date" class="form-control" value = "<?php echo $stud['dob']?>" name= "dob">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" value = "<?php echo $stud['email']?>" name = "email">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Mobile Number</label>
    <input type="number" class="form-control" value = "<?php echo $stud['mobile']?>" name = "mobile">
  </div>
  
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">Role</label>
    <select id="inputState" class="form-select" name = "role" required>
      <option selected>Choose Role</option>
      <option value="Teacher" >Teacher</option>
      <option value="Student" >Student</option>
    </select>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Course</label>
    <select id="inputState" class="form-select" name = "course" required>
      <option selected>Choose Course</option>
      <option value="PHP" >PHP</option>
      <option value="JAVA" >JAVA</option>
      <option value="PYTHON" >PYTHON</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="image" class="form-label">upload photo</label>
    <input type="file" class="form-control" id ="image" name = "images" accept="image/*">
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>