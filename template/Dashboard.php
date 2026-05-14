<?php
session_start();
include "header.php";
$all_data = $_GET['student'];
$data = json_decode($_GET['json'], true);
print_r($_data);
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

          <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-cart"></i>
              Orders
            </a>
          </li>

          <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
              <i class="bi bi-bar-chart"></i>
              Reports
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

          <div class="card-body">

            <table class="table table-hover align-middle">

              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Customer</th>
                  <th>Product</th>
                  <th>Status</th>
                  <th>Amount</th>
                </tr>
              </thead>

              <tbody>

                <tr>
                  <td>#101</td>
                  <td>Rahul</td>
                  <td>Laptop</td>
                  <td>
                    <span class="badge bg-success">
                      Completed
                    </span>
                  </td>
                  <td>₹55,000</td>
                </tr>

                <tr>
                  <td>#102</td>
                  <td>Aman</td>
                  <td>Mobile</td>
                  <td>
                    <span class="badge bg-warning text-dark">
                      Pending
                    </span>
                  </td>
                  <td>₹18,000</td>
                </tr>

                <tr>
                  <td>#103</td>
                  <td>Sneha</td>
                  <td>Headphones</td>
                  <td>
                    <span class="badge bg-danger">
                      Cancelled
                    </span>
                  </td>
                  <td>₹2,500</td>
                </tr>

              </tbody>

            </table>

          </div>
        </div>

      </div>

    </div>
  </div>
