<?php
include('database/database.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css">
  <style>
    body {
      background-color: #121212;
      color: white;
    }

    .sidebar {
      background-color: #1c1c1c;
      color: white;
    }

    .content {
      background-color: #1f1f1f;
      color: white;
    }

    .form-control,
    .btn {
      background-color: #2a2a2a;
      color: white;
      border: 1px solid #444;
    }

    .form-control::placeholder {
      color: #888;
    }

    .btn {
      border-radius: 5px;
    }

    .btn-primary {
      background-color: #444;
      border-color: #666;
    }

    .btn-danger {
      background-color: #ff4444;
    }

    .btn-success {
      background-color: #28a745;
    }
  </style>
</head>

<body>
  <div class="container-fluid vh-100">
    <div class="row h-100">
      <div class="col-12 col-sm-3 col-md-2 d-flex flex-column align-items-center justify-content-start sidebar py-4">
        <h3 class="text-center">Black Snow Coffee</h3>
      </div>
      <div class="col-12 col-sm-9 col-md-10 pt-4 content">
        <div class="row text-center py-3">

          <!-- Display success message -->
          <?php if (!empty($_SESSION['success'])): ?>
            <script>
              alert("<?php echo $_SESSION['success']; ?>");
            </script>
            <?php unset($_SESSION['success']); ?>
          <?php endif; ?>

          <!-- Display errors -->
          <?php if (!empty($_SESSION['errors'])): ?>
            <div class="alert alert-danger">
              <?php echo $_SESSION['errors']; ?>
              <?php unset($_SESSION['errors']); ?>
            </div>
          <?php endif; ?>


        </div>
        <div class="row px-3 mb-3">
          <div class="col-3 text-start">
            <a href="index.php" class="btn btn-danger">Back</a>
          </div>
          <div class="col-6 text-center">
            <h1>Register</h1>

          </div>
        </div>
        <div class="shadow p-3 mb-4 bg-dark rounded"></div>
        <form method="POST" enctype="multipart/form-data" action="handlers/register_handler.php">
          <table class="table table-dark table-bordered text-center">
            <tr>
              <th>Personal</th>
              <th>Username & Password</th>
            </tr>
            <tr>
              <td>
                <input name="fn" type="text" placeholder="First Name" class="form-control mt-0" required>
                <input name="mid" type="text" placeholder="Middle Name" class="form-control mt-3" required>
                <input name="ln" type="text" placeholder="Last Name" class="form-control mt-3" required>
              </td>
              <td>
                <input name="username" type="text" placeholder="Username" class="form-control mt-0" required>
                <input name="password" type="password" placeholder="Password" class="form-control mt-3" required>
                <input name="confirmpassword" type="password" placeholder="Confirm Password" class="form-control mt-3"
                  required>
              </td>
            </tr>
          </table>
          <table class="table table-dark table-bordered text-center">
            <tr>
              <th>Birthday</th>
            </tr>
            <tr>
              <td>
                <input name="birthday" type="date" class="form-control" required>
                <div class="row">
                  <div class="col-md-2 mt-3">
                    <input name="age" type="number" placeholder="Age" class="form-control" required>
                  </div>
                  <div class="col-md-2 mt-3">
                    <select name="gender" class="form-control" required>
                      <option value="">Gender</option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      <option value="N/A">N/A</option>
                    </select>
                  </div>
                </div>
              </td>
            </tr>
          </table>
          <table class="table table-dark table-bordered text-center">
            <tr>
              <th>Address</th>
              <th>Contact</th>
            </tr>
            <tr>
              <td>
                <input name="street" type="text" placeholder="Street" class="form-control mt-0" required>
                <input name="city" type="text" placeholder="City" class="form-control mt-3" required>
                <input name="province" type="text" placeholder="Province" class="form-control mt-3" required>
                <input name="zipcode" type="text" placeholder="Postal Code" class="form-control mt-3" required>
              </td>
              <td>
                <input name="email" type="email" placeholder="Email" class="form-control mt-0" required>
                <input name="phonenumber" type="text" placeholder="Phone Number" class="form-control mt-3" required>
              </td>
            </tr>
          </table>
          <div class="row my-3">
            <div class="col-md-3">
              <select name="role" class="form-control" required>
                <option value="">Role</option>
                <option value="Employee">Employee</option>
                <option value="Admin">Admin</option>
              </select>
            </div>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-text">Upload</span>
                <input type="file" name="profile" class="form-control">
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-6 d-flex justify-content-center my-3">
              <button type="submit" class="btn btn-success w-50">Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>


</body>

</html>