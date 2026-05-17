<?php
include "header.php";
?>
<form class="row g-3 px-5 act" action = "/php_code/database/insert_data.php" method = "POST" enctype ="multipart/form-data" required>
    <div class="col-md-6">
    <label for="inputtext4" class="form-label">First Name</label>
    <input type="text" class="form-control" name= "fname" >
  </div>
  

  <div class="col-md-6" required>
    <label for="inputtext4" class="form-label">DOB</label>
    <input type="date" class="form-control" name= "dob">
  </div>
  <div class="col-md-6" required>
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name = "email">
  </div>
  <div class="col-md-6" required>
    <label for="inputEmail4" class="form-label">Mobile Number</label>
    <input type="number" class="form-control" name = "mobile">
  </div>
  
  
  <div class="col-md-4" required>
    <label for="inputState" class="form-label">Role</label>
    <select id="inputState" class="form-select" name = "role">
      <option selected>Choose Role</option>
      <option value="Teacher" >Teacher</option>
      <option value="Student" >Student</option>
    </select>
  </div>
  <div class="col-md-4" required>
    <label for="inputState" class="form-label">Interested Course</label>
    <select id="inputState" class="form-select" name = "course">
      <option selected>Choose Course</option>
      <option value="PHP" >PHP</option>
      <option value="JAVA" >JAVA</option>
      <option value="PYTHON" >PYTHON</option>
    </select>
  </div>
  <div class="col-md-6" required>
    <label for="inputtext4" class="form-label">Create Password</label>
    <input type="text" class="form-control" name= "password">
    <span>
      Use at least 8 characters
      Include uppercase and lowercase letters
      Add at least one number
      Include a special character (!@#$%)
    </span>
  </div>
  
  <div class="col-md-6" required>
    <label for="image" class="form-label">upload photo</label>
    <input type="file" class="form-control" id ="image" name = "image" accept="image/*">
    <span>
      Maximum file size: 2 MB
    </span>
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>