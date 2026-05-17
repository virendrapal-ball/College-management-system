<?php
include "header.php";
?>

<form class="row g-3 px-5 act" id="registerForm"
action="/php_code/database/insert_data.php"
method="POST"
enctype="multipart/form-data">

  <div class="col-md-6">
    <label class="form-label">First Name</label>
    <input type="text" class="form-control" name="fname" id="fname" required>
  </div>

  <div class="col-md-6">
    <label class="form-label">DOB</label>
    <input type="date" class="form-control" name="dob" id="dob" required>
  </div>

  <div class="col-md-6">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="email" required>
  </div>

  <div class="col-md-6">
    <label class="form-label">Mobile Number</label>
    <input type="number" class="form-control" name="mobile" id="mobile" required>
  </div>

  <div class="col-md-4">
    <label class="form-label">Role</label>
    <select class="form-select" name="role" id="role" required>
      <option value="">Choose Role</option>
      <option value="Teacher">Teacher</option>
      <option value="Student">Student</option>
    </select>
  </div>

  <div class="col-md-4">
    <label class="form-label">Interested Course</label>
    <select class="form-select" name="course" id="course" required>
      <option value="">Choose Course</option>
      <option value="PHP">PHP</option>
      <option value="JAVA">JAVA</option>
      <option value="PYTHON">PYTHON</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label">Create Password</label>
    <input type="password" class="form-control" name="password" id="password" required>

    <span>
      Use at least 8 characters <br>
      Include uppercase and lowercase letters <br>
      Add at least one number <br>
      Include a special character (!@#$%)
    </span>
  </div>

  <div class="col-md-6">
    <label class="form-label">Upload Photo</label>
    <input type="file" class="form-control"
    id="image"
    name="image"
    accept="image/*"
    required>

    <span>Maximum file size: 2 MB</span>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">
      Sign in
    </button>
  </div>
</form>

<script>
document.getElementById("registerForm").addEventListener("submit", function(e){

    let fname = document.getElementById("fname").value.trim();
    let email = document.getElementById("email").value.trim();
    let mobile = document.getElementById("mobile").value.trim();
    let password = document.getElementById("password").value.trim();
    let image = document.getElementById("image").files[0];

    // Password Pattern
    let passPattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;

    // Mobile Validation
    let mobilePattern = /^[0-9]{10}$/;

    // Validation Check
    if(fname == ""){
        alert("Enter First Name");
        e.preventDefault();
        return;
    }

    if(!mobilePattern.test(mobile)){
        alert("Enter valid 10 digit mobile number");
        e.preventDefault();
        return;
    }

    if(!passPattern.test(password)){
        alert("Enter strong password");
        e.preventDefault();
        return;
    }

    // Image Size Check
    if(image.size > 2 * 1024 * 1024){
        alert("Image size must be less than 2MB");
        e.preventDefault();
        return;
    }

    // Success Message
    alert("Registered Successfully");

});
</script>
<br><br>

<?php include "footer.php" ?>