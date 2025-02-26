<?php
include("database/database.php");
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
    <title>Responsive Dashboard</title>
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
                <span class="fs-5 fw-bold" style="font-family: 'Times New Roman', serif; font-size: 28px; letter-spacing: 1px;">
                    BLACKSNOW CAFE
                </span>
            </div>

                <hr>
                <div class="position-sticky">
                    <div class="text-LEFT p-3">
                        <i class="ri-cup-line fs-2"></i> <span class="fs-5  fw-bolder">ADMIN</span>
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





            

            </div>
        </main>
    </div>
</body>

</html>