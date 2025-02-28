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
                <li><i class="bi bi-bookmark-plus"></i><span><a href="">Add Category</a></span></li>
                <li>

                    <i class="bi bi-plus-square"></i><span><a href=""></a>Add products</span>

                </li>


                <li class="dropdown" onclick="toggleDropdown(this,event)">
                    <i class="bi bi-view-stacked"></i>
                    <span class="dropdown-text">View Products</span>
                    <i class="fas fa-chevron-right arrow-icon"></i>
                    <ul class="dropdown-menu">
                        <li><a class="text-truncate" href="../product/coffee.php">Coffee</a></li>
                        <li><a class="text-truncate" href="../product/pastry.php">Pastry</a></li>
                        <li><a class="text-truncate" href="../product/rice_meal.php">Rice meal</a></li>
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
    <div class="main-content px-5">

        <!-- Dummy Content for Scroll -->
        <div class="content">
            <form action="../handlers/product_handler.php" enctype="multipart/form-data" method="POST" required>
                <div class="container-fluid d-flex al justify-content-center gap-4 mt-5">
                    <!-- Add new product -->
                    <div class="col-md-6 border rounded shadow-lg p-3">
                        <p class="h3 fw-bolder my-md-3">Add new product</p>
                        <p class="h6 fw-bold">Product name</p>
                        <input type="text" class="form-control" required>
                        <p class="h6 fw-bold my-md-3">Product Description</p>
                        <textarea class="form-control"></textarea>
                        <p class="h6 fw-bold my-md-3">Category/Supplier/Price</p>
                        <div class="d-flex gap-3">
                            <select class="form-select">
                                <option selected disabled>Select Category</option>
                            </select>
                            <select class="form-select">
                                <option selected disabled>Select Supplier</option>
                            </select>
                            <input type="number" class="form-control" step="0.01" min="0" placeholder="0.00" required>
                        </div>

                        <label class="form-label fw-bold my-md-3">Choose Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control">
                        </div>


                        <div class="my-3 d-flex justify-content-center">
                            <button class="btn btn-primary" style="width:15rem;">Save product</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <script>
            function toggleDarkMode() {
                document.body.classList.toggle("dark-mode");
            }

            function toggleDropdown(element, event) {


                // Toggle the 'active' class
                element.classList.toggle("active");


                let dropdownMenu = element.querySelector(".dropdown-menu");
                if (dropdownMenu) {
                    dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
                }


                let arrowIcon = element.querySelector(".arrow-icon");
                if (arrowIcon) {
                    arrowIcon.classList.toggle("rotated");
                }
            }


        </script>

</body>

</html>