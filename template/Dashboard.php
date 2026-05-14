<?php
session_start();
include "header.php";
require_once "../database/show_data.php";
?>
<body class="bg-light">

  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
      <div class="col-md-2 bg-dark min-vh-100 p-3">

        <h3 class="text-white text-center mb-4">
          <?php echo $_SESSION['user_name'] ?>
        </h3>

        <ul class="nav flex-column">
          <?php if ($_SESSION['role']=="admin"){?>
          <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-speedometer2"></i>
              Teacher
            </a>
          </li>

          <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-people"></i>
              Student
            </a>
          </li>
          <?php }else if($_SESSION['role']=="Teacher"){?>
            <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-people"></i>
              Student
            </a>
          </li>
          <?php }?>

          <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-cart"></i>
              Course
            </a>
          </li>

          <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-bar-chart"></i>
              Course
            </a>
          </li>

        </ul>
      </div>

      <!-- Main Content -->
      <div class="col-md-10 p-4">

        <!-- Navbar -->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
              Dashboard
            </h4>

            <button class="btn btn-primary">
              <?php echo $_SESSION['role']?>
            </button>

          </div>
        </div>

        <!-- Cards -->
        <div class="row g-4">
        
          <div class="col-md-3">
            <div class="card text-bg-primary border-0">
              <div class="card-body">
                <h6>Total Users</h6>
                <h3>1,250</h3>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card text-bg-success border-0">
              <div class="card-body">
                <h6>Total Orders</h6>
                <h3>320</h3>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card text-bg-warning border-0">
              <div class="card-body">
                <h6>Revenue</h6>
                <h3>₹45,000</h3>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card text-bg-danger border-0">
              <div class="card-body">
                <h6>Pending</h6>
                <h3>18</h3>
              </div>
            </div>
          </div>

        </div>

        <!-- Table -->
        <div class="card mt-5 border-0 shadow-sm">

          <div class="card-header bg-white">
            <h5 class="mb-0">
              Recent Orders
            </h5>
          </div>
          
<?php 

if($_SESSION['role']=="admin"){
  $result = teacher();?>
          <div class="card-body">

            <table class="table table-hover align-middle">

              <thead class="table-light">
                <tr>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>edit</th>
                  <th>Approve</th>
                </tr>
              </thead>
              

              <tbody>
              <?php
                foreach($result as $std){?>
                <tr>
                  <td><?php echo $std['name']?> </td>
                  <td><?php echo $std['course']?></td>
                  <td><?php echo $std['role']?></td>
                  <td><?php echo $std['status']?></td>

                  <td>
    <div class="d-flex gap-2">
        <form action = "/php_code/template/student_registration.php" method = "GET">
            <input type="text" value="<?php echo $std['reg_id']?>" name="reg_num" hidden>
            <button type="submit" class="btn btn-primary">
                Edit
            </button>
        </form>
        <form action = "/php_code/database/delete.php" method = "GET">
            <input type="text" value="<?php echo $std['reg_id']?>" name="reg_num" hidden>
            <button type="submit" class="btn btn-danger">
                Delete
            </button>
        </form>

    </div>
    
</td>
                  <td>
                    <form action = "/php_code/database/approve.php" method = "GET">
            <input type="text" value="<?php echo $std['reg_id']?>" name="reg_num" hidden>
            <button type="submit" class="btn btn-primary">
                Approve
            </button>
        </form>
                  </td>
                </tr>
                <?php } ?>

              </tbody>

            </table>

          </div>
        </div>

      </div>

    </div>
  <?php }else if($_SESSION['role']=="Teacher"){
    $student = Student();
    ?>
  <div class="card-body">

            <table class="table table-hover align-middle">

              <thead class="table-light">
                <tr>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Role</th>
                  <th>Status</th>
                </tr>
              </thead>
              

              <tbody>
              <?php
                foreach($student as $std){?>
                <tr>
                  <td><?php echo $std['name']?> </td>
                  <td><?php echo $std['course']?></td>
                  <td><?php echo $std['role']?></td>
                  <td><?php echo $std['status']?></td>

                  <td>
    <!-- <div class="d-flex gap-2">
        <form action = "/php_code/template/student_registration.php" method = "GET">
            <input type="text" value="<?php echo $std['reg_id']?>" name="reg_num" hidden>
            <button type="submit" class="btn btn-primary">
                Edit
            </button>
        </form>
        <form action = "/php_code/database/delete.php" method = "GET">
            <input type="text" value="<?php echo $std['reg_id']?>" name="reg_num" hidden>
            <button type="submit" class="btn btn-danger">
                Delete
            </button>
        </form>

    </div> -->
    
</td>
                  
                </tr>
                <?php } ?>

              </tbody>

            </table>

          </div>
        </div>

      </div>

    </div>
  <?php } ?>
  </div>