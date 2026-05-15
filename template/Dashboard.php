<?php
session_start();
if (empty($_SESSION)){
  header("Location: /php_code/template/login_page.php");
}
include "header.php";
require_once "../database/show_data.php";
$user_dt = get_data($_SESSION['user_id']);
// print_r ($user_dt);
?>
<body class="bg-light">

  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
      <div class="col-md-2 bg-dark min-vh-100 p-3">
        
        <h3 class="text-white text-center mb-4">
          <?php echo $_SESSION['user_name'] ?>
        </h3>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-speedometer2"></i>
              Profession : <?php echo $user_dt['role'] ?>
            </a>
          </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-speedometer2"></i>
              DOB : <?php echo $user_dt['dob'] ?>
            </a>
          </li>

        <ul class="nav flex-column">
          <?php if ($_SESSION['role']=="admin"){?>

          <!-- <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-speedometer2"></i>
              Teacher
            </a>
          </li> -->

          <!-- <li class="nav-item mb-2">
            <form action="/php_code/template/Dashboard.php" method="post">
              <input type="text" value="4" hidden>
            <input type="submit" value ="Student">
            </form>
          </li> -->
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
              Subject : <?php echo $user_dt['course']?>
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
</div>

        <!-- Table -->
        <div class="card mt-5 border-0 shadow-sm">

          <div class="card-header bg-white">
            <h5 class="mb-0">
              List
            </h5>
          </div>
          
<?php 

if($_SESSION['role']=="admin"){

  $result = teacher();
  $alot_teacher = alot_teacher()?>
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
                      <form action = "/php_code/template/update_form.php" method = "GET">
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
                    <?php if ($std['status']=="Approved"){?>
                    <button type="submit" class="btn btn-danger">
                    Reject
                    </button>
                    <?php }else{?>
                      <button type="submit" class="btn btn-primary">
                      Approve
                      </button>
                      <?php } ?>
                    </form>
                  </td>
                </tr>
                <?php } ?>

              </tbody>

            </table>

          </div>
        
          <!-- Table -->
        <div class="card mt-5 border-0 shadow-sm">

          <div class="card-header bg-white">
            <h5 class="mb-0">
              Assign Teacher
            </h5>
          </div>

          <div class="card-body">

            <table class="table table-hover align-middle">

              <thead class="table-light">
                <tr>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Assign Teacher</th>
                </tr>
              </thead>

              <tbody>
              <?php
                foreach($alot_teacher as $std){?>
                <tr>
                  <td><?php echo $std['student_name']?> </td>
                  <td><?php echo $std['course']?></td>
                  <td><?php echo $std['teacher_name']?></td>
                  <!-- <td><?php echo $std['status']?></td> -->
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

                  <td></td>
                  
                </tr>
              <?php } ?>

            </tbody>

          </table>

          </div>
        </div>

      </div>

    </div>
  <?php }else{
    $student = Student(); ?>
        <div class="card-body">

            <table class="table table-hover align-middle">

              <thead class="table-light">
                <tr>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Status</th>
                </tr>
              </thead>
              

              <tbody>
              <?php
                foreach($student as $std){?>
                <tr>
                  <td><?php echo $std['name']?> </td>
                  <td><?php echo $std['course']?></td>
                  <td><?php echo $std['status']?></td>

                  <td></td>
                  
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