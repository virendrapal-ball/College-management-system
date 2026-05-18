<?php 
include "header.php";
require_once "../database/show_data.php";

$result = student();

/* Pagination */
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = ($page < 1) ? 1 : $page;

$total_records = count($result);
$total_pages = ceil($total_records / $limit);

$start = ($page - 1) * $limit;
$students = array_slice($result, $start, $limit);
?>

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-lg border-0">
                
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Student Enrollment Table</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped align-middle text-center">
                            
                            <thead class="table-dark">
                                <tr>
                                    <th>Student</th>
                                    <th>Subject</th>
                                    <th>DOB</th>
                                    <th>Assign Teacher</th>
                                    <th>Enroll</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($students as $res){ ?>

                                <tr>
                                    <td><?php echo $res['name']; ?></td>

                                    <td><?php echo $res['course']; ?></td>

                                    <td><?php echo $res['dob']; ?></td>

                                    <td>
                                        <form action="/php_code/template/allot_subject.php" method="POST">

                                            <input type="hidden" 
                                                   value="<?php echo $_POST['reg_num']; ?>" 
                                                   name="teacher_reg">

                                            <input type="hidden" 
                                                   value="<?php echo $res['reg_id']; ?>" 
                                                   name="reg_num">

                                            <button type="submit" class="btn btn-success btn-sm">
                                                Enroll
                                            </button>

                                        </form>
                                    </td>
                                </tr>

                                <?php } ?>

                            </tbody>

                        </table>

                    </div>

                    <!-- Pagination -->
                    <nav class="mt-4">
                        <ul class="pagination justify-content-center">

                            <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                                <a class="page-link" href="?page=<?php echo $page-1; ?>">
                                    Previous
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            <?php for($i = 1; $i <= $total_pages; $i++){ ?>

                                <li class="page-item <?php if($page == $i){ echo 'active'; } ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>

                            <?php } ?>

                            <!-- Next Button -->
                            <li class="page-item <?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                                <a class="page-link" href="?page=<?php echo $page+1; ?>">
                                    Next
                                </a>
                            </li>

                        </ul>
                    </nav>

                </div>
            </div>

        </div>
    </div>

</div>