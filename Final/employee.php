<?php
include("database/database.php");
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>BLACKSNOW CAFE</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid d-flex flex-column flex-md-row h-100">
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
            <div class="position-sticky">
            <div class="text-center p-3">
                <span class="fs-5 fw-bold" style="font-family: 'Times New Roman', serif; font-size: 24px; letter-spacing: 2px;">
                    BLACKSNOW CAFE
                </span>
            </div>

                <hr>
                <div class="position-sticky">
                        <div class="text-LEFT p-3">
                                <span class="fs-5 fw-bold" style="font-family: 'Roboto', sans-serif; font-size: 17px; letter-spacing: 2px;">
                                ADMIN DASHBOARD
                            </span>                    
                        </div>
                    <ul class="nav flex-column text-left gap-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="ri-dashboard-line"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../IT6_FinalProj/index.php"><i class="ri-team-line"></i> Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="ri-file-chart-line"></i> Reports</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-drinks-line"></i> Products
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                                <li><a class="dropdown-item" href="#">Add Product</a></li>
                                <li><a class="dropdown-item" href="#">Edit Product</a></li>
                                <li><a class="dropdown-item" href="#">Remove Product</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="ri-printer-line"></i> Print</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="#"><i class="ri-logout-box-line"></i> Sign out</a>
                        </li>
                    </ul>
                </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3">
                <h1 class="h3">Dashboard</h1>
                <input type="text" class="form-control w-25" placeholder="Search">
            </div>

            <div class="table-responsive text-center">
                <!-- Buttons and Search Bar -->
        <div class="row align-items-center mb-3 px-3">
            <div class="col-sm-4 text-start">
                <a href="Register.php" class="btn btn-success" style="width: 50%;">ADD</a>
            </div>


            <div class="col-sm-4 text-end">
                <form method="GET" action="index.php">

                <input type="text" name="search_query" class="form-control bg-dark text-white border-secondary"
                placeholder="Search"
                value="<?php echo isset($_GET['search_query']) && $_GET['search_query'] !== '' ? $_GET['search_query'] : 'Search'; ?>"
                onfocus="if(this.value==='Search') { this.value=''; }"
                onblur="if(this.value==='') { this.value=''; }">

            </div>
            <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>


                </form>

            </div>
            </div>

            <div class="row  m-0 p-0">



                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        ?>

                        <div class="col mb-4 m-0 p-0">

                            <div class="card" style="width: 23rem; height: 17rem;">
                            <div class="card-body m-0 p-0 ps-3 px-3">
                                <h5 class="card-title">

                                <div class="row mt-3">

                                    <div class="col-4"><i class="bi bi-person-circle me-3 m-0 p-0" style="font-size: 70px;"></i>
                                    </div>
                                    <div class="col p-0 m-0">
                                    <p class="m-0 p-0 pt-3"><?php echo htmlspecialchars($row['fullname']); ?>
                                    </p>
                                    <h5 class="pt-2"><?php echo htmlspecialchars($row['roleName']); ?></h5>
                                    </div>
                                    <div class="col-3 text-end">
                                    <form action="handlers/delete_handler.php" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                        <input name="EID" value="<?php echo $row['EID']; ?>" hidden>
                                        <button type="submit" class='btn btn-sm btn-danger' style="width: 60%;">
                                        <i class='bi bi-trash3'></i>
                                        </button>
                                    </form>
                                    </div>

                                </div>

                                </h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>

                                <div class="row m-0 p-0 d-flex justify-content-end align-items-end mt-5 pt-4">
                                <div class="col-auto">
                                    <!-- Info Button -->
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#infoModal<?php echo $row['EID']; ?>">
                                    <i class="bi bi-info-circle"></i>
                                    </button>

                                    <!-- Info Modal -->
                                    <div class="modal fade" id="infoModal<?php echo $row['EID']; ?>" tabindex="-1"
                                    aria-labelledby="infoModalLabel<?php echo $row['EID']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content bg-dark text-white">
                                        <div class="modal-header">
                                            <div class="d-flex align-items-center w-100 ">
                                            <i class="bi bi-person-circle me-5" style="font-size: 100px;"></i>
                                            <div class="text-start">
                                                <h1 class="modal-title" id="infoModalLabel<?php echo $row['EID']; ?>">
                                                <?php echo htmlspecialchars($row['fullname']); ?>
                                                </h1>
                                                <p class="mb-0 text-secondary"><?php echo htmlspecialchars($row['roleName']); ?>
                                                </p>
                                            </div>
                                            </div>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <p><strong>Age:</strong> <?php echo htmlspecialchars($row['age']); ?></p>
                                            <p><strong>Gender:</strong> <?php echo htmlspecialchars($row['gender']); ?></p>
                                            <p><strong>Birthday:</strong> <?php echo htmlspecialchars($row['bday'] ?? ''); ?>
                                            </p>
                                            <p><strong>Date Hired:</strong>
                                            <?php echo htmlspecialchars($row['date_hired'] ?? ''); ?></p>
                                            <p><strong>Address:</strong>
                                            <?php echo htmlspecialchars($row['street'] ?? ''); ?>
                                            <?php echo htmlspecialchars($row['province'] ?? ''); ?>
                                            <?php echo htmlspecialchars($row['city'] ?? ''); ?>
                                            <?php echo htmlspecialchars($row['zipcode'] ?? ''); ?>
                                            </p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <!-- Update Button -->
                                    <form action="Update.php" method="POST" class="m-0" onsubmit="return confirmUpdate();">
                                    <input name="id" value="<?php echo $row['EID']; ?>" hidden>
                                    <button type="submit" class='btn btn-sm btn-primary'>
                                        <i class='bi bi-pencil-square'></i>
                                    </button>
                                    </form>
                                </div>
                                </div>



                            </div>
                            </div>
                        </div>


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
                    </div>
            

            </div>
        </main>
    </div>
</body>

</html>