    <?php
    include("../database/database.php");   
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

        <!-- External JS -->

        <script src="../DESIGNS/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        

    
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
                    <li><i class="bi bi-plus-square"></i><a href="add_product.php"><span>Add products</span></a></li>

                    <li class="dropdown" onclick="toggleDropdown(this,event)">
                        <i class="bi bi-view-stacked"></i>
                        <span class="dropdown-text">View Products</span>
                        <i class="fas fa-chevron-right arrow-icon"></i>
                        <ul class="dropdown-menu">
                            <li><a class="text-truncate" href="../product/coffee.php">View Coffee</a></li>
                            <li><a class="text-truncate" href="../product/pastry.php">View Pastry</a></li>
                            <li><a class="text-truncate" href="../product/rice_meal.php">View Rice Meal</a></li>
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
        <div class="main-content px-0">
            <div class="content">
                <div class="container-fluid px-0 mt-3">
                    <div class="row mx-3 p-2 d-flex">
                        <div class="col">
                            <p class="h3 fw-bold">Welcome to the Dashboard</p>
                            <small class="text-muted">Overview of product and sales summary</small>
                        </div>
                        <div class="col d-flex justify-content-end align-items-end gap-2">
                            <button class="btn btn-outline-secondary">Here is calendar</button>
                            <button class="btn btn-outline-secondary"><i class="bi bi-box-arrow-in-down"></i></button>
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
                    <li><i class="bi bi-plus-square"></i><a href="add_product.php"><span>Add products</span></a></li>


                    <li class="dropdown" onclick="toggleDropdown(this,event)">
                        <i class="bi bi-view-stacked"></i>
                        <span class="dropdown-text">View Products</span>
                        <i class="fas fa-chevron-right arrow-icon"></i>
                        <ul class="dropdown-menu">
                            <li><a class="text-truncate" href="../product/coffee.php">View Coffee</a></li>
                            <li><a class="text-truncate" href="../product/pastry.php">View Pastry</a></li>
                            <li><a class="text-truncate" href="../product/rice_meal.php">View Rice Meal</a></li>
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
    
    <button class="btn btn-outline-secondary"><i class="bi bi-share"></i></button>
                            <button class="btn btn-outline-secondary"><i class="bi bi-gear-fill"></i></button>
                        </div>
                    </div>
                    <hr>

                    <div class="row mx-3 p-2 d-flex">
                    <div class="row">
                            <div class="col stat d-flex stat border shadow-lg p-4">
                                <div class="w-100">
                                    <p class="h6 fw-light font-monospace text-secondary">Total Revenue</p>
                                    <p class="display-6 fw-bold font-monospace text-center">₱140,000</p>
                                </div>
                            </div>

                            <div class="col stat d-flex stat border shadow-lg p-4">
                                <div class="w-100">
                                    <p class="h6 fw-light font-monospace text-secondary">Unit Sold</p>
                                    <p class="display-6 fw-bold font-monospace text-center">140,000</p>
                                </div>
                            </div>

                            <div class="col stat d-flex stat border shadow-lg p-4">
                                <div class="w-100">
                                    <p class="h6 fw-light font-monospace text-secondary">Conversion Rate</p>
                                    <p class="display-6 fw-bold font-monospace text-center">8.7%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="row mx-5 my-5 rounded border pt-5">
                        
                    <div class="d-flex align-items-end">
                                <i class="bi bi-activity text-primary fs-4"></i>&nbsp;&nbsp;<h5>Peromance Charts</h5>
                            </div>
                        <div class="row">
                            <div class="col d-flex border-bottom">
                                <button class="btn btn-outline-secondary border">Sales Trends</button>
                                <button class="btn btn-outline-secondary border">product Performance</button>
                            </div>
                            
                            </div>
                            <div class="row mx-0 p-0  justify-content-center rounded d-md-block">
                                <div class="col border rounded-top p-3"><p class="h5">Product Performance</p>
                            </div>
                            <div class="row mx-0 p-0 d-flex justify-content-center align-items-center ">
                                <div class="col border"><canvas id="barChart" class="w-100"></canvas></div>
                                <div class="col border"><canvas id="lineChart" class="w-100;" class></canvas></div>   
                            </div>
                        
                            </div>     
                    </div>

                    <div class="row mx-5 my-5 rounded border">

                    <div class="my-3"> 
                        
                </div>
                        
                    <div class="d-flex align-items-end">
                                <i class="bi bi-activity text-primary fs-4"></i>&nbsp;&nbsp;<h5>Data Tables</h5>
                            </div>
                        <div class="row">
                            <div class="col d-flex border-bottom">
                                <button class="btn btn-outline-secondary border-bottom-0">Coffee</button>
                                <button class="btn btn-outline-secondary border-bottom-0">Pastries</button>
                                <button class="btn btn-outline-secondary border-bottom-0">Rice Meals</button>
                                <button class="btn btn-outline-secondary border-bottom-0">Sales Details</button>
                            </div>
                            
                            </div>


                            <div class="row mx-0 p-0 px-3 justify-content-between rounded d-md-flex">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="">Entries</label>&nbsp;
                                    <select id="entries" class="form-select w-auto d-inline" onchange="changeEntries()">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="15">15</option>
                                    </select>
                                                                <div class="container">
                            <div class="row justify-content-center">
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
                                </div>
                            </div>
                            <div class="row mx-0 my-5 p-0 d-flex justify-content-center align-items-center text-center">
                                <table class="table table-responsive table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Sold Today</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <tr>
                                                <td>PD-001</td>
                                                <td>Product Name</td>
                                                <td>5</td>
                                                <td>₱300.00</td>
                                                    <td><span class="badge bg-danger">Low stock</span></td>
                                                    <td>February 3, 2025</td>
                                            </tr>
                                            <tr>
                                                <td>PD-002</td>
                                                <td>Product Name</td>
                                                <td>5</td>
                                                <td>₱300.00</td>
                                                <td><span class="badge bg-success">Available</span></td>
                                                <td>February 3, 2025</td>
                                            </tr>
                                            <tr>
                                                <td>PD-003</td>
                                                <td>Product Name</td>
                                                <td>5</td>
                                                <td>₱300.00</td>
                                                <td><span class="badge bg-danger">Low stock</span></td>
                                                <td>February 3, 2025</td>       
                                            </tr>
                                            <tr>
                                                <td>PD-004</td>
                                                <td>Product Name</td>
                                                <td>5</td>
                                                <td>₱300.00</td>
                                                <td><span class="badge bg-success">Available</span></td>
                                                <td>February 3, 2025</td>
                                            </tr>
                                            <tr>
                                                <td>PD-005</td>
                                                <td>Product Name</td>
                                                <td>5</td>
                                                <td>₱300.00</td>
                                                <td><span class="badge bg-success">Available</span></td>
                                                <td>February 3, 2025</td>
                                            </tr>
                                        </tbody>
                                    </table>

                            
                            </div>
                            <hr>
                            <div class="d-flex justify-content-end">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        </li>
                                    </ul>
                                    </nav>
                            </div>
                                                    
                            </div>   
                            
                            
                    </div>


                
            </div>
            
        </div>

        <script>
            function toggleDarkMode() {
                document.body.classList.toggle("dark-mode");
            }

            function toggleDropdown(element, event) {
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
