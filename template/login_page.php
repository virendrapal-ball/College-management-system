<?php
include "header.php";

if (!empty($_SESSION)){
  header ("Location: /php_code/template/Dashboard.php");
  exit;
}
if(isset($_GET['success']))
{
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Registration Successful
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>';
}

?>
<div class="container d-flex justify-content-center align-items-center vh-100">

  <form class="border p-4 rounded shadow" style="width: 400px;" action = "/php_code/database/user_auth.php" method = "POST">

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">
        Email address
      </label>

      <input type="email"
             class="form-control"
             id="exampleInputEmail1"
             aria-describedby="emailHelp"
             name = "email">

      <div id="emailHelp" class="form-text">
        We'll never share your email with anyone else.
      </div>
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">
        Password
      </label>

      <input type="password"
             class="form-control"
             id="exampleInputPassword1"
             name = "pass"
            >
    </div>

    <button type="submit" class="btn btn-primary w-100">
      Submit
    </button>

  </form>

</div>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>