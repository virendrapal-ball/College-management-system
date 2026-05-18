<?php
include "header.php";
if (empty($_SESSION)){
  header("Location: /php_code/template/login_page.php");
}
require_once "../database/show_data.php";
$user_dt = get_data($_SESSION['user_id']);
// print_r ($user_dt);
?>
<body class="bg-light">

  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
      <div class="col-md-2 bg-dark min-vh-100 p-3">
         <div class="text-center mb-3">
        <img src="/php_code/uploads/IMG_VIRE.jpeg" 
         alt="Admin Image"
         class="rounded-circle border border-3 border-light"
         width="120"
         height="120"
         style="object-fit: cover;">
      </div>
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
          <?php if ($_SESSION['role']=="Admin"){?>

          <!-- 3 For approved teacher but subject not assign -->

          <li class="nav-item mb-2">
            <form action="/php_code/template/Dashboard.php" method="post">
              <input type="text" value ="3" name = "record" hidden>
              <input type="submit" value="Teacher List">
            </form>
          </li>

          <!-- 4 For approved Student but subject not assign -->
          
          <li class="nav-item mb-2">
            <form action="/php_code/template/Dashboard.php" method="post">
              <input type="text" value ="4" name = "record" hidden>
              <input type="submit" value="Student List">
            </form>
          </li>
          
          <li class="nav-item mb-2">
            <form action="/php_code/template/Dashboard.php" method="GET">
              <input type="text" value ="3" name = "record" hidden>
              <input type="submit" value="Pending List">
            </form>
          </li>
          <?php }
          else if($_SESSION['role']=="Teacher"){?>
            <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-people"></i>
              Student
            </a>
          </li>
          <?php }?>

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

        
  <!-- Admit Pannel Control         -->
<?php
$result;
if($_SESSION['role']=="Admin"){
  if ($_SERVER['REQUEST_METHOD']=="POST"){
      if ($_POST['record']=="4"){
       $result = student();
      }
      else{
        $result = teacher();
      }
  }else{
    $result = Pending_list();
  }
  $alot_teacher = alot_teacher()?>
  <!-- Table -->
        <div class="card mt-5 border-0 shadow-sm">

          <div class="card-header bg-white">
            <h5 class="mb-0">
            Application
            </h5>
          </div>
         <?php

/* ================= PAGINATION ================= */

$limit = 5; // per page

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if($page < 1){
    $page = 1;
}

$total_records = count($result);

$total_pages = ceil($total_records / $limit);

$start = ($page - 1) * $limit;

/* Current page data */

$result_data = array_slice($result, $start, $limit);

?>

<div class="card-body">

<div class="table-responsive">

<table class="table table-hover table-bordered align-middle text-center">

    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Course</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
            <th>Approval</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach($result_data as $std){ ?>

        <tr>

            <td><?php echo $std['name']; ?></td>

            <td><?php echo $std['course']; ?></td>

            <td><?php echo $std['role']; ?></td>

            <td><?php echo $std['status']; ?></td>

            <td>

                <div class="d-flex justify-content-center gap-2">

                    <!-- Edit -->

                    <form action="/php_code/template/update_form.php" method="GET">

                        <input type="hidden"
                               value="<?php echo $std['reg_id']?>"
                               name="reg_num">

                        <button type="submit"
                                class="btn btn-primary btn-sm">

                            Edit

                        </button>

                    </form>

                    <!-- Delete -->

                    <form action="/php_code/database/delete.php" method="GET">

                        <input type="hidden"
                               value="<?php echo $std['reg_id']?>"
                               name="reg_num">

                        <button type="submit"
                                class="btn btn-danger btn-sm">

                            Delete

                        </button>

                    </form>

                </div>

            </td>

            <td>

            <?php if ($std['status']=="pending"){ ?>

                <form action="/php_code/database/approve.php" method="GET">

                    <input type="hidden"
                           value="<?php echo $std['reg_id']?>"
                           name="reg_num">

                    <button type="submit"
                            class="btn btn-success btn-sm">

                        Approve

                    </button>

                </form>

            <?php } 
            else if (($std['status']=="Approved") && ($std['role']=="Teacher")){ ?>

                <form action="/php_code/template/allot_subject.php" method="POST">

                    <input type="hidden"
                           value="<?php echo $std['reg_id']?>"
                           name="reg_num">

                    <button type="submit"
                            class="btn btn-warning btn-sm">

                        Allot Subject

                    </button>

                </form>

            <?php } ?>

            </td>

        </tr>

    <?php } ?>

    </tbody>

</table>

</div>

<!-- ================= PAGINATION BUTTONS ================= -->

<nav class="mt-4">

<ul class="pagination justify-content-center">

    <!-- Previous -->

    <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">

        <a class="page-link"
           href="?page=<?php echo $page-1; ?>">

           Previous

        </a>

    </li>

    <!-- Page Numbers -->

    <?php for($i = 1; $i <= $total_pages; $i++){ ?>

        <li class="page-item <?php if($page == $i){ echo 'active'; } ?>">

            <a class="page-link"
               href="?page=<?php echo $i; ?>">

               <?php echo $i; ?>

            </a>

        </li>

    <?php } ?>

    <!-- Next -->

    <li class="page-item <?php if($page >= $total_pages){ echo 'disabled'; } ?>">

        <a class="page-link"
           href="?page=<?php echo $page+1; ?>">

           Next

        </a>

    </li>

</ul>

</nav>

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
  <?php }else{?>
    <!-- // Student profile -->
    <?php $data = get_data($_SESSION['user_id'])?>
      <div class="col-md-10 p-4 bg-light">

            <!-- Dashboard Header -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Student Information</h2>

                    <span class="btn btn-primary">
                        <?php echo $data['role']; ?>
                    </span>
                </div>
            </div>

            <!-- Student Information Card -->
            <div class="card shadow border-0">
                <div class="card-body">

                    <div class="row">

                        <!-- Profile Image -->
                        <div class="col-md-4 text-center">
                            <img src="uploads/<?php echo $data['image']; ?>"
                                 class="img-fluid rounded-circle border"
                                 width="180"
                                 height="180">

                            <h3 class="mt-3">
                                <?php echo $data['name']; ?>
                            </h3>
                        </div>

                        <!-- Student Details -->
                        <div class="col-md-8">

                            <table class="table table-bordered">

                                <tr>
                                    <th>Student Name</th>
                                    <td>
                                        <?php echo $data['name']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>
                                        <?php echo $data['email']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Mobile Number</th>
                                    <td>
                                        <?php echo $data['mobile']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Date of Birth</th>
                                    <td>
                                        <?php echo $data['dob']; ?>
                                    </td>
                                </tr>

                                <tr>

                                <tr>
                                    <th>Course</th>
                                    <td>
                                        <?php echo $data['course']; ?>
                                    </td>
                                </tr>
                                 <tr>
                                    <th>Application Status</th>
                                    <td>
                                        <?php echo $data['status']; ?>
                                    </td>
                                </tr>

                            </table>


                                
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>


      </div>

    </div>
  <?php } ?>
  </div>
  <!-- Footer include -->
   <?php include "footer.php"?>
