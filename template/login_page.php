<?php
include "header.php";

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
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">
        Role
      </label>

      <select id="inputState" class="form-select" name = "role">
      <option selected>Choose Role</option>
      <option value="Teacher" >Teacher</option>
      <option value="Student" >Student</option>
    </select>
    </div>

    <div class="mb-3 form-check">

      <input type="checkbox"
             class="form-check-input"
             id="exampleCheck1">

      <label class="form-check-label" for="exampleCheck1">
        Check me out
      </label>

    </div>

    <button type="submit" class="btn btn-primary w-100">
      Submit
    </button>

  </form>

</div>