<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Smart learning</title>
</head>
<body>
    <nav class="nav nav-pills flex-column flex-sm-row">
  <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="index.php">Home</a>
  <a class="flex-sm-fill text-sm-center nav-link" href=href="login_page.php/admin_login.php"login Page</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="student_registration.php">student registration</a>
  <br>
</nav>
<h1 class="display-6">Display 6</h1>
<form action ="template/home.php" method="POST">
    Email: <input type="text" placeholder="Enter user name or email" name="email">
    <br><br>
    Password : <input type="password" placeholder="Enter Password" name="password">
    <br>
    <br>
    <input type="submit">
</form>
</body>
</html>