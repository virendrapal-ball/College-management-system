<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Student registration</title>
</head>
<body>
    <nav class="nav nav-pills flex-column flex-sm-row">
  <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="index.php">Home</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="admin_login.php">login Page</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="student_registration.php">student registration</a>
  <br>
</nav>
    <form action="" method="POST">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="First name" aria-label="First name" name = "fname">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name = "lname">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="email" class="form-control" placeholder="Email" aria-label="Enter email" name = "email">
        </div>
        <div class="col">
            <input type="date" class="form-control" placeholder="" aria-label="Choose dob" name = "date">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <select class="form-select" aria-label="Default select example">
                <option selected>Select Course</option>
                <option value="Java">Java</option>
                <option value="PHP">PHP</option>
                <option value="PYTHON">PYTHON</option>
            </select>
        </div>
        <div class="col">
            <select class="form-select" aria-label="Default select example">
                <option selected>Choose Role</option>
                <option value="Teacher">Teacher</option>
                <option value="Student">Student</option>
                
            </select>
        </div>
    </div>
    <div class="col-auto">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</body>
</html>