<?php include "header.php";
require_once "../database/show_data.php";
$result = student();
// echo $_POST['reg_num'];
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Student</th>
      <th scope="col">Subject</th>
      <th scope="col">Assign Teacher</th>
      <th scope="col">Enroll</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($result as $res){ ?>
    <tr>
      <td><?php echo $res['name'] ?></td>
      <td><?php echo $res['course'] ?></td>
      <td><?php echo $res['dob'] ?></td>
      <td>
      <form action = "/php_code/template/allot_subject.php" method = "POST">
        <input type="text" value="<?php echo $_POST['reg_num']?>" name="teacher_reg" hidden>
        <input type="text" value="<?php echo $res['reg_id']?>" name="reg_num" hidden>
        <button type="submit" class="btn btn-primary">
        Enroll
        </button>
        </form>
</td>
    </tr>
    <?php } ?>

    
  </tbody>
</table>