<?php
include("../Database/database.php"); // Include the database connection 
session_start();

// Pagination settings
$limit = 9;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$searchQuery = "";

if (!empty($_GET['search_query'])) {
  $searchQuery = "%" . $_GET['search_query'] . "%";
  $stmt = $conn->prepare("SELECT * FROM supplier_addresses WHERE SID LIKE ? OR company_name LIKE ? LIMIT ? OFFSET ?");
  $stmt->bind_param("ssii", $searchQuery, $searchQuery, $limit, $offset);
  $stmt->execute();
  $result = $stmt->get_result();

  // Count total rows
  $stmtTotal = $conn->prepare("SELECT COUNT(*) FROM supplier_addresses WHERE SID LIKE ? OR company_name LIKE ?");
  $stmtTotal->bind_param("ss", $searchQuery, $searchQuery);
  $stmtTotal->execute();
  $stmtTotal->bind_result($totalRows);
  $stmtTotal->fetch();
  $stmtTotal->close();
} else {
  $result = $conn->query("SELECT * FROM supplier_addresses ORDER BY SID LIMIT $limit OFFSET $offset");
  $totalRowsResult = $conn->query("SELECT COUNT(*) AS total FROM supplier_addresses");
  $totalRows = $totalRowsResult->fetch_assoc()['total'];
}

$totalPages = max(1, ceil($totalRows / $limit)); // Avoid division by zero
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Sidebar</title>

  <!-- External CSS & Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- External JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../DESIGNS/style.css">
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="logo-container">
      <img src="../IMAGES/sidebar_logo.png" class="logo-img" alt="Admin">
      <div class="logo-details">
        <h5 class="brand">Blacksnow Café </h5>
      </div>
    </div>

    <div class="container menu-container">
      <ul>
        <h6 class="menu-title">Actions</h6>
        <a href="../DASHBOARD/dashboard(navbar).php">
          <li><i class="fas fa-chart-line"></i> <span>Dashboard</span></li>
        </a>
        <a href="../EMPLOYEE/employee.php"> <li><i class="fas fa-users"></i> <span>Employee</span></li></a> 
        <a href="../ROLE/role.php"> <li><i class="bi bi-person-lines-fill"></i></i> <span>Roles</span></li></a>
        <li><i class="bi bi-building"></i><span>Suppliers</span></li>

        <li class="dropdown" onclick="toggleDropdown(this)">
          <i class="fas fa-bars"></i>
          <span class="dropdown-text">Products</span>
          <i class="fas fa-chevron-right arrow-icon"></i>
          <ul class="dropdown-menu">
            <li><a class="text-truncate" href="#">Manage products</a></li>
            <li><a class="text-truncate" href="#">Product sales</a></li>
          </ul>
        </li>

        <li><i class="fas fa-chart-pie"></i> <span>Reports</span></li>
        <li><i class="fas fa-wallet"></i> <span>Transactions</span></li>
      </ul>

      <ul class="settings-container">
        <h6 class="menu-title text-truncate px-3">Appearance</h6>
        <li class="toggle-item">
          <div class="toggle-switch" onclick="toggleDarkMode()"></div>
        </li>
        <li><i class="fas fa-sign-out-alt"></i> <span>Logout</span></li>
      </ul>

      <div class="profile-container">
        <img src="../IMAGES/girl.jpg" class="profile-img" alt="Admin">
        <div class="profile-details">
          <h5 class="name">Name Admin</h5>
          <h6 class="role">Administrator</h6>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col d-flex justify-content-end align-items-center">
          <div class="search-container position-relative">
            <form class="d-flex align-items-center" method="GET" action="../supplier_handlers/supplier.php">
              <i class="fas fa-search search-icon"></i>
              <input class="form-control search-input ps-5" type="search" placeholder="Search anything..."
                aria-label="Search" name="search_query"
                value="<?php echo isset($_GET['search_query']) && $_GET['search_query'] !== '' ? $_GET['search_query'] : ''; ?>"
                onfocus="if(this.value==='') { this.value=''; }" onblur="if(this.value==='') { this.value=''; }">
              <button class="btn btn-search ms-2" type="submit">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Dummy Content for Scroll -->
    <div class="content">
      <div class="container-fluid">

        <div class="row pt-5 justify-content-center align-items-cente">
          <div class="col-9 ">
            <ul class="list-group">
              <li class="list-group-item">

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

                <div class="col d-flex justify-content-end mb-3">
                  <button type="button" class="btn btn-success btn-custom mx-3" data-bs-toggle="modal"
                    data-bs-target="#infoModal2"><i class="bi bi-plus-square mx-3"></i>
                    Add Supplier</button>

                  <!-- Modal -->
                  <div class="modal fade" id="infoModal2" tabindex="-1" aria-labelledby="infoModalLabel2"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="infoModalLabel2">Add Supplier</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form id="supplierForm" action="../SUPPLIER_HANDLERS/add_handler.php" method="POST">
                            <div class="row">
                              <div class="col-6">
                                <label for="company_name">Company Name:</label>
                                <input type="text" id="company_name" name="company_name" class="form-control" required>

                                <label for="contact_number" class="mt-3">Contact Number:</label>
                                <input type="text" id="contact_number" name="contact_number" class="form-control"
                                  required>

                                <label for="email" class="mt-3">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>

                                <label for="license_number" class="mt-3">License Number:</label>
                                <input type="text" id="license_number" name="license_number" class="form-control mb-3"
                                  required>
                              </div>

                              <div class="col-6">

                                <label for="street" class="">Street:</label>
                                <input type="text" id="street" name="street" class="form-control" required>

                                <label for="city" class="mt-3">City:</label>
                                <input type="text" id="city" name="city" class="form-control" required>

                                <label for="province" class="mt-3">Province:</label>
                                <input type="text" id="province" name="province" class="form-control" required>

                                <label for="zipcode" class="mt-3">Zip Code:</label>
                                <input type="text" id="zipcode" name="zipcode" class="form-control mb-3" required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">
                                <i class="bi bi-pencil-square"></i> Submit
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Move the script OUTSIDE the modal -->
                <script>
                  document.addEventListener("DOMContentLoaded", function () {
                    const form = document.querySelector("#supplierForm");
                    const email = document.querySelector("#email");
                    const phone = document.querySelector("#contact_number");
                    const license = document.querySelector("#license_number");

                    form.addEventListener("submit", function (event) {
                      let errors = [];

                      // Email validation
                      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                      if (!emailPattern.test(email.value)) {
                        errors.push("Please enter a valid email address.");
                      }

                      // Phone number validation (Allows +63XXXXXXXXXX or 09XXXXXXXXX)
                      const phonePattern = /^(?:\+63\d{10}|09\d{9})$/;
                      if (!phonePattern.test(phone.value)) {
                        errors.push("Phone number must be in the format: +639XXXXXXXXX or 09XXXXXXXXX.");
                      }

                      // License number validation (at least 5 alphanumeric characters)
                      const licensePattern = /^[a-zA-Z0-9]{5,}$/;
                      if (!licensePattern.test(license.value)) {
                        errors.push("License number must be at least 5 alphanumeric characters.");
                      }

                      // Show error messages if any
                      if (errors.length > 0) {
                        event.preventDefault(); // Prevent form submission
                        alert(errors.join("\n")); // Show errors as an alert
                      }
                    });
                  });
                </script>

                <div class="row  m-0 p-0">

                  <table class="table table-responsive table-hover align-middle text-center">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Detials</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          ?>

                          <tr>

                            <td>

                              <h5><?php echo ($row['SID']); ?></h5>
                              <h1 class="text-start"> </h1>


                              <!-- Supplier Information Modal -->
                              <div class="modal fade" id="infoModal<?php echo $row['SID']; ?>" tabindex="-1"
                                aria-labelledby="infoModalLabel<?php echo $row['SID']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                  <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h5 class="modal-title fw-bold text-start"
                                        id="infoModalLabel<?php echo $row['SID']; ?>">
                                        Supplier Details
                                      </h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body text-start"> <!-- Forces Left Alignment -->
                                      <div class="row">
                                        <div class="col-12">

                                          <!-- Supplier Information -->
                                          <h5 class="mt-3 mb-3 fw-semibold text-primary text-center">
                                            <?php echo htmlspecialchars($row['company_name']); ?>
                                          </h5>
                                          <p class="mb-2"><strong>Contact Number:</strong> <span
                                              class=""><?php echo htmlspecialchars($row['contact_number']); ?></span>
                                          </p>
                                          <p class="mb-2"><strong>Email:</strong> <span
                                              class=""><?php echo htmlspecialchars($row['email']); ?></span></p>
                                          <p class="mb-4"><strong>License Number:</strong> <span
                                              class=""><?php echo htmlspecialchars($row['license_number']); ?></span>
                                          </p>

                                          <!-- Address Details -->
                                          <?php if (!empty($row['AID'])): ?>
                                            <hr class="my-3">
                                            <h5 class="fw-semibold text-secondary text-center">Address Details</h5>
                                            <p class="mb-2"><strong>Street:</strong> <span
                                                class=""><?php echo htmlspecialchars($row['street']); ?></span></p>
                                            <p class="mb-2"><strong>City:</strong> <span
                                                class=""><?php echo htmlspecialchars($row['city']); ?></span></p>
                                            <p class="mb-2"><strong>Province:</strong> <span
                                                class=""><?php echo htmlspecialchars($row['province']); ?></span></p>
                                            <p class="mb-2"><strong>Zipcode:</strong> <span
                                                class=""><?php echo htmlspecialchars($row['zipcode']); ?></span></p>
                                          <?php else: ?>
                                            <p class="text-muted mt-3">No address available</p>
                                          <?php endif; ?>

                                        </div>
                                      </div>
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    </div>

                                  </div>
                                </div>
                              </div>



                              <!-- Update Modal (Second Modal) -->
                              <div class="modal fade edit-modal" id="editModal<?php echo $row['SID']; ?>" tabindex="-1"
                                aria-labelledby="editModalLabel<?php echo $row['SID']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Update Supplier</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form class="edit-supplier-form" action="../SUPPLIER_HANDLERS/update_handler.php"
                                        method="POST">
                                        <input type="hidden" name="SID" value="<?php echo $row['SID']; ?>">

                                        <div class="row">
                                          <!-- Left Column -->
                                          <div class="col-6">
                                            <label for="company_name">Company Name:</label>
                                            <input type="text" id="company_name" name="company_name" class="form-control"
                                              value="<?php echo htmlspecialchars($row['company_name']); ?>" required>

                                            <label for="contact_number" class="mt-3">Contact Number:</label>
                                            <input type="text" id="contact_number" name="contact_number"
                                              class="form-control"
                                              value="<?php echo htmlspecialchars($row['contact_number']); ?>" required>

                                            <label for="email" class="mt-3">Email:</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                              value="<?php echo htmlspecialchars($row['email']); ?>" required>

                                            <label for="license_number" class="mt-3">License Number:</label>
                                            <input type="text" id="license_number" name="license_number"
                                              class="form-control mb-3"
                                              value="<?php echo htmlspecialchars($row['license_number']); ?>" required>
                                          </div>

                                          <!-- Right Column -->
                                          <div class="col-6">
                                            <label for="street">Street:</label>
                                            <input type="text" id="street" name="street" class="form-control"
                                              value="<?php echo htmlspecialchars($row['street']); ?>" required>

                                            <label for="city" class="mt-3">City:</label>
                                            <input type="text" id="city" name="city" class="form-control"
                                              value="<?php echo htmlspecialchars($row['city']); ?>" required>

                                            <label for="province" class="mt-3">Province:</label>
                                            <input type="text" id="province" name="province" class="form-control"
                                              value="<?php echo htmlspecialchars($row['province']); ?>" required>

                                            <label for="zipcode" class="mt-3">Zip Code:</label>
                                            <input type="text" id="zipcode" name="zipcode" class="form-control mb-3"
                                              value="<?php echo htmlspecialchars($row['zipcode']); ?>" required>
                                          </div>
                                        </div>  

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-success">
                                            <i class="bi bi-pencil-square"></i> Update
                                          </button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>


                          <script>
                     
                            function confirmUpdate() {
                              return confirm("Are you sure you want to update this supplier?");
                            }

                            function confirmDelete() {
                              return confirm("Are you sure you want to delete this supplier?");
                            }
                          </script>

                    </div>
              </div>
            </div>
          </div>
          </td>
          <td>
            <h4><?php echo ($row['company_name']); ?></h4>
          </td>

          <td>

            <!-- Info Button -->
            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
              data-bs-target="#infoModal<?php echo $row['SID']; ?>">See More&nbsp;<i class="fa-solid fa-ellipsis"></i>
            </button>
          </td>

          <td>
            <form class="m-0 p-0" action="../SUPPLIER_HANDLERS/delete_handler.php" method="POST"
              onsubmit="return confirmDelete()">

              <button type="button" class="btn btn-warning btn-sm" Class="btn btn-info btn-sm"
                data-bs-target="#editModal<?php echo $row['SID']; ?>" data-bs-toggle="modal"
                data-parent="#infoModal<?php echo $row['SID']; ?>"><i class="fa-solid fa-pen"></i></button>


              <input class="m-0 p-0" name="SID" value="<?php echo $row['SID']; ?>" hidden>

              <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>

            </form>
          </td>

          </tr>

          <?php
                        }
                      } else {
                        echo "<tr><td colspan='4' class='text-center'>No results found.</td></tr>";
                      }
                      ?>

                     
                  <!-- Move the validation script outside the modal -->
                  <script>
                            document.addEventListener("DOMContentLoaded", function () {
                              document.querySelectorAll(".edit-supplier-form").forEach(function (form) {
                                form.addEventListener("submit", function (event) {
                                  let errors = [];

                                  const email = form.querySelector("input[name='email']");
                                  const phone = form.querySelector("input[name='contact_number']");
                                  const license = form.querySelector("input[name='license_number']");

                                  // Email validation
                                  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                  if (!emailPattern.test(email.value)) {
                                    errors.push("Please enter a valid email address.");
                                  }

                                  // Phone number validation (Allows +63XXXXXXXXXX or 09XXXXXXXXX)
                                  const phonePattern = /^(?:\+63\d{10}|09\d{9})$/;
                                  if (!phonePattern.test(phone.value)) {
                                    errors.push("Phone number must be in the format: +639XXXXXXXXX or 09XXXXXXXXX.");
                                  }

                                  // License number validation (at least 5 alphanumeric characters)
                                  const licensePattern = /^[a-zA-Z0-9]{5,}$/;
                                  if (!licensePattern.test(license.value)) {
                                    errors.push("License number must be at least 5 alphanumeric characters.");
                                  }

                                  // Show error messages if any
                                  if (errors.length > 0) {
                                    event.preventDefault(); // Prevent form submission
                                    alert(errors.join("\n")); // Show errors as an alert
                                  }
                                });
                              });
                            });
                          </script>

      </tbody>
      </table>
      <!-- Pagination -->
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link"
              href="?search_query=<?php echo $_GET['search_query'] ?? ''; ?>&page=<?php echo $page - 1; ?>">Previous</a>
          </li>
          <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
              <a class="page-link"
                href="?search_query=<?php echo $_GET['search_query'] ?? ''; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php } ?>
          <li class="page-item <?php echo ($page >= $totalPages) ? 'disabled' : ''; ?>">
            <a class="page-link"
              href="?search_query=<?php echo $_GET['search_query'] ?? ''; ?>&page=<?php echo $page + 1; ?>">Next</a>
          </li>
        </ul>
      </nav>



    </div>


    </li>
    </ul>

  </div>
  </div>
  </div>
  </div>
  </div>

  <script>
    function toggleDarkMode() {
      document.body.classList.toggle("dark-mode");
    }

    function toggleDropdown(element) {
      element.classList.toggle("active");
    }
  </script>

</body>

</html>