<?php
include "header.php";

?>
<form class="row g-3 px-5 act" action = "Dashboard.php" method = "POST">
    <div class="col-md-6">
    <label for="inputtext4" class="form-label">First Name</label>
    <input type="text" class="form-control" name= "fname">
  </div>
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">Last Name</label>
    <input type="text" class="form-control" name= "lname">
  </div>
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">Father name</label>
    <input type="text" class="form-control" name= "father name">
  </div>
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">Mother name</label>
    <input type="text" class="form-control" name= "mother name">
  </div>
  <div class="col-md-6">
    <label for="inputtext4" class="form-label">DOB</label>
    <input type="date" class="form-control" name= "dob">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Mobile Number</label>
    <input type="number" class="form-control" name = "mobile">
  </div>
  
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">Role</label>
    <select id="inputState" class="form-select">
      <option selected>Choose Role</option>
      <option value="Teacher" >Teacher</option>
      <option value="Student" >Student</option>
    </select>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Role</label>
    <select id="inputState" class="form-select">
      <option selected>Choose Course</option>
      <option value="PHP" >PHP</option>
      <option value="JAVA" >JAVA</option>
      <option value="PYTHON" >PYTHON</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">upload photo</label>
    <input type="file" class="form-control" name = "image">
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>