<?php
include "template/header.php";

?>
<body>
<!-- Hero Section -->
  <div class="bg-light py-5">
    <div class="container text-center">

      <h1 class="display-4 fw-bold">
        Welcome to ABC College
      </h1>

      <p class="lead mt-3">
        Empowering students with quality education and bright futures.
      </p>

      <a href="/php_code/template/student_registration.php" class="btn btn-primary btn-lg mt-3">
        Apply Now
      </a>

    </div>
  </div>

  <!-- About Section -->
  <div class="container py-5">

    <div class="row">

      <div class="col-md-6">
        <h2>About Our College</h2>

        <p>
          ABC College provides excellent education with experienced faculty,
          modern classrooms, and practical learning opportunities for students.
        </p>
      </div>

      <div class="col-md-6">
        <img 
          src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1"
          class="img-fluid rounded"
          alt="College">
      </div>

    </div>

  </div>

  <!-- Courses -->
  <div class="bg-light py-5">

    <div class="container">

      <h2 class="text-center mb-4">
        Our Courses
      </h2>

      <div class="row g-4">

        <div class="col-md-4">
          <div class="card h-100">

            <div class="card-body text-center">

              <h4>BCA</h4>

              <p>
                Bachelor of Computer Applications with practical coding skills.
              </p>

            </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="card h-100">

            <div class="card-body text-center">

              <h4>BBA</h4>

              <p>
                Business administration course for future managers and leaders.
              </p>

            </div>

          </div>
        </div>

        <div class="col-md-4">
          <div class="card h-100">

            <div class="card-body text-center">

              <h4>B.Sc</h4>

              <p>
                Science programs with modern labs and experienced teachers.
              </p>

            </div>

          </div>
        </div>

      </div>

    </div>

  </div>
  <?php include "footer.php" ?>

 