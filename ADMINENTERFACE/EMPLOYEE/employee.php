<?php
include("../Database/database.php"); // Include the database connection
session_start();

$searchQuery = ' ';

if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
  $searchQuery = "%" . $_GET['search_query'] . "%";
  $stmt = $conn->prepare("SELECT * FROM employee_details WHERE fullname LIKE ? OR roleName LIKE ?");
  $stmt->bind_param("ss", $searchQuery, $searchQuery);
  $stmt->execute();
  $result = $stmt->get_result();
} else {
  $result = $conn->query("SELECT * FROM employee_details ORDER BY fullname");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>

  <link rel="stylesheet" href="../DESIGNS/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
    rel="stylesheet" />

</head>

<body>
  <!-- NAVBAR NI ICOPY SA TANAN -->


  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <nav class="navbar navbar-expand-lg ">
          <div class="container-fluid">

            <!-- Toggler Button (Mobile View) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse mx-3" id="navbarNavDropdown">
              <ul class="navbar-nav me-auto">
                <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-list"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-printer-fill"></i> Print</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-left"></i> LOG OUT</a></li>
                  </ul>
                </li>
              </ul>
            </div>

            <!-- Brand Logo / Name -->
            <div class="d-flex w-50 justify-content-start ">
              <a class="brand-title" href="#">BLACKSNOW CAFE</a>
            </div>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-start">
              <li class="nav-item">
                <a class="nav-link active fonts mx-3" aria-current="page"
                  href="../DASHBOARD/dashboard(navbar).php">Home</a>
              </li>

              
              <li class="nav-item mx-3">
                <a class="nav-link fonts " href="">Products</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link fonts " href="#">Supplier</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link fonts " href="#">Transaction</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link fonts " href="#">Reports
                </a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link fonts " href="../ROLE/role.php">Roles</a>
              </li>
            </ul>
            <form method="GET" action="employee.php" class="d-flex mx-3">


              <!-- Search Form (Aligned Right) -->
              <input class="form-control me-2 rounded-pill" name="search_query" type="search" placeholder="Search"
                aria-label="Search"
                value="<?php echo isset($_GET['search_query']) && $_GET['search_query'] !== '' ? $_GET['search_query'] : ''; ?>"
                onfocus="if(this.value==='') { this.value=''; }" onblur="if(this.value==='') { this.value=''; }">

              <button class="btn btn-success rounded-pill" type="submit"><i class="bi bi-search"></i></button>
            </form>




          </div>
        </nav>
      </div>
    </div>
  </div>

  <div class="container-fluid">


    <div class="row pt-5 justify-content-center align-items-cente">
      <div class="col-7 ">
        <ul class="list-group">
          <li class="list-group-item">
            <div class="col d-flex justify-content-end mb-3">
              <a type="submit" class="btn btn-success btn-custom mx-3" href="add_employee.php"><i
                  class="bi bi-plus-square mx-3"></i>
                Add Employee</a>
            </div>

            <div class="row  m-0 p-0">




              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      ?>

                      <tr>

                        <td class="text-start col-3">
                          <!-- Info Button -->
                          <button type="button" style="background-color: white; border-style: none;" data-bs-toggle="modal"
                            data-bs-target="#infoModal<?php echo $row['EID']; ?>">
                            <h5 class="text-start"><?php echo ($row['fullname']); ?></h5>
                            <h1 class="text-start"> </h1>
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="infoModal<?php echo $row['EID']; ?>" tabindex="-1"
                            aria-labelledby="infoModalLabel<?php echo $row['EID']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="infoModalLabel<?php echo $row['EID']; ?>">Employee Details
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-12 mb-3 text-center">
                                      <img src="girl.jpg" class="img-fluid profile-img-circle" alt="Employee Image">
                                    </div>
                                    <div class="col-12">
                                      <h5 class="mt-3 mb-4 d-flex justify-content-center align-items-center">
                                        <?php echo ($row['fullname']); ?>
                                      </h5>
                                      <p><strong>Position:</strong> <?php echo ($row['roleName']); ?></p>
                                      <p><strong>Email:</strong> <?php echo ($row['email']); ?></p>
                                      <p><strong>Phone:</strong> <?php echo ($row['phone_num']); ?></p>
                                      <p><strong>Address:</strong>
                                        <?php echo ($row['street'] . " " . $row['city'] . " " . $row['province'] . " " . $row['zipcode']); ?>
                                      </p>
                                      <p><strong>Joined Date:</strong> <?php echo ($row['date_hired']); ?></p>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                  <form action="edit_employee.php" method="POST">
                                    <input name="EID" value="<?php echo $row['EID']; ?>" hidden>

                                    <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-square"></i>
                                      Edit</button>

                                  </form>

                                  <form action="../EMPLOYEE_HANDLERS/delete_handler.php" method="POST">
                                    <input name="EID" value="<?php echo $row['EID']; ?>" hidden>

                                    <button type="submit" class="btn btn-danger" id="deleteButton"
                                      onsubmit="return confirmUpdate2()"><i class="bi bi-trash3-fill"></i>
                                      Delete</button>

                                  </form>

                                </div>

                              </div>
                            </div>
                          </div>


                        </td>
                        <td class="col-2 text-center">
                          <h6 class="text-start"><?php echo ($row['roleName']); ?></h6>

                        </td>
                        <td class="col-2 text-center ">
                          <h6 class="text-start"><?php echo ($row['email']); ?></h6>


                        </td>
                      </tr>
                      <?php
                    }
                  } else {
                    echo "<tr><td colspan='4' class='text-center'>No results found.</td></tr>";
                  }
                  ?>
                  <script>
                    function confirmUpdate() {
                      return confirm("Are you sure you want to update this employee's information?");
                    }
                  </script>

                </tbody>
              </table>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>




            </div>


          </li>
        </ul>

      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>