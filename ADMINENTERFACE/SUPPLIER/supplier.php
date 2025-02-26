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
  $stmt = $conn->prepare("SELECT * FROM suppliers WHERE SID LIKE ? OR company_name LIKE ? LIMIT ? OFFSET ?");
  $stmt->bind_param("ssii", $searchQuery, $searchQuery, $limit, $offset);
  $stmt->execute();
  $result = $stmt->get_result();

  // Count total rows
  $stmtTotal = $conn->prepare("SELECT COUNT(*) FROM suppliers WHERE SID LIKE ? OR company_name LIKE ?");
  $stmtTotal->bind_param("ss", $searchQuery, $searchQuery);
  $stmtTotal->execute();
  $stmtTotal->bind_result($totalRows);
  $stmtTotal->fetch();
  $stmtTotal->close();
} else {
  $result = $conn->query("SELECT * FROM suppliers ORDER BY company_name LIMIT $limit OFFSET $offset");
  $totalRowsResult = $conn->query("SELECT COUNT(*) AS total FROM suppliers");
  $totalRows = $totalRowsResult->fetch_assoc()['total'];
}

$totalPages = max(1, ceil($totalRows / $limit)); // Avoid division by zero
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../DESIGNS/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
    rel="stylesheet" />
  <title>Role Management</title>
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
                <a class="nav-link fonts " href="../EMPLOYEE/employee.php">Employee</a>
              </li>

              <li class="nav-item mx-3">
                <a class="nav-link fonts " href="">Products</a>
              </li>

              
              <li class="nav-item mx-3">
                <a class="nav-link fonts " href="#">Transaction</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link fonts " href="#">Reports
                </a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link fonts " href="../ROLE/role.php">Role</a>
              </li>
            </ul>
            <form method="GET" action="supplier.php" class="d-flex mx-3">

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
                        <div class="col-12">
                          <label for="company_name">Company Name:</label>
                          <input type="text" id="company_name" name="company_name" class="form-control" required>

                          <label for="contact_number" class="mt-3">Contact Number:</label>
                          <input type="text" id="contact_number" name="contact_number" class="form-control" required>

                          <label for="email" class="mt-3">Email:</label>
                          <input type="email" id="email" name="email" class="form-control" required>

                          <label for="license_number" class="mt-3">License Number:</label>
                          <input type="text" id="license_number" name="license_number" class="form-control" required>
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
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Supplier</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      ?>

                      <tr>

                        <td class="text-start col-1">

                          <!-- Info Button -->
                          <button type="button" style="background-color: white; border-style: none;" data-bs-toggle="modal"
                            data-bs-target="#infoModal<?php echo $row['SID']; ?>">
                            <h5 class="text-start"><?php echo ($row['SID']); ?></h5>
                          </button>

                          <!-- Info Modal (First Modal) -->
                          <div class="modal fade" id="infoModal<?php echo $row['SID']; ?>" tabindex="-1"
                            aria-labelledby="infoModalLabel<?php echo $row['SID']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="infoModalLabel<?php echo $row['SID']; ?>">Supplier Details
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-12">
                                      <h5 class="mt-3 mb-4 text-center">
                                        <?php echo htmlspecialchars($row['company_name']); ?>
                                      </h5>
                                      <p><strong>Contact Number:</strong>
                                        <?php echo htmlspecialchars($row['contact_number']); ?></p>
                                      <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                                      <p><strong>License Number:</strong>
                                        <?php echo htmlspecialchars($row['license_number']); ?></p>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                  <!-- Edit Button (Opens Second Modal) -->
                                  <button type="button" class="btn btn-warning open-edit-modal " onsubmit="return confirmUpdate()"
                                    data-bs-target="#editModal<?php echo $row['SID']; ?>" data-bs-toggle="modal">
                                    <i class="bi bi-pencil-square"></i> Edit
                                  </button>

                                  <!-- Delete Form -->
                                  <form action="../SUPPLIER_HANDLERS/delete_handler.php" method="POST"
                                    onsubmit="return confirmDelete()">
                                    <input name="SID" value="<?php echo $row['SID']; ?>" hidden>
                                    <button type="submit" class="btn btn-danger">
                                      <i class="bi bi-trash3-fill"></i> Delete
                                    </button>
                                  </form>
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

                                    <label for="company_name_<?php echo $row['SID']; ?>">Company Name:</label>
                                    <input type="text" id="company_name_<?php echo $row['SID']; ?>" name="company_name"
                                      class="form-control" value="<?php echo htmlspecialchars($row['company_name']); ?>"
                                      required>

                                    <label for="contact_number_<?php echo $row['SID']; ?>" class="mt-3">Contact
                                      Number:</label>
                                    <input type="text" id="contact_number_<?php echo $row['SID']; ?>" name="contact_number"
                                      class="form-control" value="<?php echo htmlspecialchars($row['contact_number']); ?>"
                                      required>

                                    <label for="email_<?php echo $row['SID']; ?>" class="mt-3">Email:</label>
                                    <input type="email" id="email_<?php echo $row['SID']; ?>" name="email"
                                      class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" required>

                                    <label for="license_number_<?php echo $row['SID']; ?>" class="mt-3">License
                                      Number:</label>
                                    <input type="text" id="license_number_<?php echo $row['SID']; ?>" name="license_number"
                                      class="form-control" value="<?php echo htmlspecialchars($row['license_number']); ?>"
                                      required>

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-success">
                                        <i class="bi bi-pencil-square"></i> Update
                                      </button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                          
                          <!-- JavaScript for Proper Modal Handling -->
                          <script>
                            document.addEventListener("DOMContentLoaded", function () {
                              let editModals = document.querySelectorAll(".edit-modal");

                              editModals.forEach((modal) => {
                                modal.addEventListener("show.bs.modal", function (event) {
                                  let parentModal = document.querySelector(event.relatedTarget.dataset.parent);

                                  if (parentModal) {
                                    parentModal.classList.add("d-none"); // Hide parent modal but keep it open
                                  }
                                });

                                modal.addEventListener("hidden.bs.modal", function () {
                                  let openModals = document.querySelectorAll(".modal.show");
                                  openModals.forEach((modal) => modal.classList.remove("d-none")); // Restore parent modal
                                });
                              });
                            });

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
      <td class="col-2 text-center">
        <h4 class="text-start"><?php echo ($row['company_name']); ?></h4>
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




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>