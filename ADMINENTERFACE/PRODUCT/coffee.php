<?php
include("../database/database.php");
$limit = 10;

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;


$totalQuery = "SELECT COUNT(*) AS total FROM products";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalProducts = $totalRow['total'];


$totalPages = ceil($totalProducts / $limit);


$sql = "SELECT p.PID, p.product_name, p.product_description,p.product_type,p.status, p.image, p.stocks, p.price,date_format(p.date,'%M. %e, %Y - %l:%i %p') 'date',
                s.company_name 
            FROM products p
            LEFT JOIN suppliers s ON p.SID = s.SID where product_type = 'Coffee'
            LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);
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
    <link rel="stylesheet" href="../designs/style.css">
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
                <li><i class="fas fa-chart-line"></i> <span>Dashboard</span></li>
                <li><i class="fas fa-users"></i> <span>Employee</span></li>
                <li><i class="bi bi-person-lines-fill"></i></i> <span>Roles</span></li>
                <li><i class="bi bi-building"></i><span>Suppliers</span></li>

                <li class="dropdown" onclick="toggleDropdown(this)">
                    <i class="fas fa-bars"></i>
                    <span class="dropdown-text">Products</span>
                    <i class="fas fa-chevron-right arrow-icon"></i>
                    <ul class="dropdown-menu">
                    <li><a class="text-truncate" href="coffee.php">Add coffee</a></li>
                    <li><a class="text-truncate" href="pastry.php">Add pastry</a></li>
                    <li><a class="text-truncate" href="rice_meal.php">Add rice meal</a></li>
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
        
        <!-- Dummy Content for Scroll -->
        <div class="content">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col d-flex justify-content-end align-items-center">
                    <div class="search-container position-relative">
                        <form class="d-flex align-items-center">
                            <i class="fas fa-search search-icon"></i>
                            <input class="form-control search-input ps-5" type="search" placeholder="Search anything..."
                                aria-label="Search">
                            <button class="btn btn-search ms-2" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <style>
                .prod {
                    border: 2px solid #ffb3ba !important;
                    border-radius: 15px;
                    object-fit: cover;
                    height: 60px;
                    width: 60px !important;
                }

                .detailsimg {
                    object-fit: cover;
                    border-radius: 15px;
                    height: 15rem !important;
                    width: 25rem !important;
                }
            </style>

            <body>

            <!--Coffee-->

                <div class="container my-4">

                        <div class="container mt-5 d-flex">
                            <div class="col-md-6"> <p class="display-5 fw-bold">Coffee</p>
                            </div>
                            <div class="col-md-6 d-inline-flex justify-content-end"> <button class="btn btn-primary" style="height: 50px; border-radius: 12px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-plus"></i>&nbsp;Add products
                        </button>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="handlers/products_handler.php" enctype="multipart/form-data" method="POST"
                                    required>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                                            <!-- Close Button with FontAwesome -->
                                            <button type="button" class="btn" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                           
                                        <div class="modal-footer">
                                            <!-- Footer Close Button with FontAwesome -->
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                <i class="fa-solid fa-xmark"></i> Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa-solid fa-floppy-disk"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                    </div>
                    <table class="table table-responsive table-hover align-middle text-center">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Supplier</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Date added</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr>


                                        <td><?php echo str_pad($row['PID'], 3, "0", STR_PAD_LEFT); ?></td>
                                        <td>
                                            <div class="row d-flex justify-content-center align-items-center">

                                                <div class="col-md-3 d-flex align-items-center justify-content-center">
                                                    <img class="prod img-fluid"
                                                        src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>"
                                                        style="max-height: 60px; width: 60px; object-fit: cover;">
                                                </div>


                                                <div class="col-md-5 text-truncate" style="max-width: 150px;">
                                                    <?php echo $row['product_name']; ?>
                                                </div>
                                            </div>
                                        </td>

                                        <td> <?php echo $row['product_type']; ?></td>
                                        <td><?php echo $row['company_name']; ?></td>
                                        




                                        <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#newmodal_<?php echo $row['PID']; ?>">
                                                Description&nbsp;<i class="fa-solid fa-ellipsis"></i>
                                            </button>


                                            <div class="modal fade" id="newmodal_<?php echo $row['PID']; ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="newModalLabel_<?php echo $row['PID']; ?>"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modals modal-content" style="background-color: #ffe1e1;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                <p class="display-6 fw-bold mb-0">
                                                                    <?php echo $row['product_name']; ?>
                                                                </p>
                                                            </h5>

                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body text-center">
                                                            <img class="detailsimg img-fluid"
                                                                src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>">
                                                            <hr>
                                                            <p class="h6 fw-bold mt-2">Description</p>
                                                            <p class="text-muted"><?php echo $row['product_description']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>


                                        <td> <?php echo '₱' . (isset($row['price']) ? $row['price'] : '0.00'); ?></td>
                                        <td>
                                            <?php echo $row['date']; ?>
                                        </td>



                                        <td>
                                            <button class="btn btn-warning btn-sm" Class="btn btn-info btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#editmodal_<?php echo $row['PID']; ?>"><i
                                                    class="fa-solid fa-pen"></i></button>
                                            <div class="modal fade" id="editmodal_<?php echo $row['PID']; ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="newModalLabel_<?php echo $row['PID']; ?>"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                <p class="display-6 fw-bold mb-0">Pricing and stocking</p>
                                                            </h5>
                                                            <!-- Correct Close Button -->
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="handlers/stockandprice_handler.php" method="POST">
                                                            <div class="modal-body text-start">
                                                                <input type="text" hidden>
                                                                <div class="row">
                                                                    <input type="text" name="pid"
                                                                        value="<?php echo $row['PID']; ?>" hidden>
                                                                    <p class="h6 fw-bold">Price</p>
                                                                    <div class="col-md-12"><input name="price" step="0.01"
                                                                            min="0" type="number" class="form-control" required>
                                                                    </div>
                                                                    <p class="h6 fw-bold">Stock</p>
                                                                    <div class="col-md-12"><input name="stock" type="number"
                                                                            class="form-control" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <!-- Footer Close Button with FontAwesome -->
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="fa-solid fa-xmark"></i> Close
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa-solid fa-floppy-disk"></i> Save
                                                                </button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                echo "<tr><td colspan='8' class='text-center fw-bold py-4'>No products found.</td></tr>";

                            } ?>
                        </tbody>

                    </table>
                    <nav>
                        <ul class="pagination justify-content-end">
                            <!-- Previous Button -->
                            <li class="page-item <?php if ($page <= 1)
                                echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>">&laquo;</a>
                            </li>

                            <!-- Page Numbers -->
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php if ($page == $i)
                                    echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Next Button -->
                            <li class="page-item <?php if ($page >= $totalPages)
                                echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>">&raquo;</a>
                            </li>
                        </ul>
                    </nav>
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