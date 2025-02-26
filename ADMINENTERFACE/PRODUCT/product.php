<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Product Card</title>

    <link rel="stylesheet" href="../DESIGNS/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet" />


</head>
<body>


    <!-- NAVBAR RA NI DIRI PS. PAG MAUSAB ANG SA DASHBOARD.PHP ICOPY PASTE -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand mx-3" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px; letter-spacing: 1px; font-weight: bold; color: black;" href="#">
                BLACKSNOW CAFE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fonts mx-3" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link fonts " href="#">Employees</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link fonts " href="#">Products</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link fonts " href="#">Reports</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link fonts " href="#">Pricing</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link fonts " href="#">Inventory</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fonts mx-3 " href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fonts " href="#"><i class="bi bi-gear"></i> Settings</a></li>
                            <li><a class="dropdown-item fonts "  href="#"><i class="bi bi-printer-fill"></i> Print</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item fonts " href="#"><i class="bi bi-box-arrow-left"></i> LOG OUT</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2 fonts" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success fonts" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row d-flex justify-content-between align-items-center mt-3">
            <div class="col">
                <h2 class="fw-bold text-black mx-3" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: bold; letter-spacing: 3px; ">
                    PRODUCTS
                </h2>
            </div>
            <div class="col d-flex justify-content-end">
                <a type="submit" class="btn btn-success btn-custom mx-3" href="add_product.php"><i class="bi bi-plus-square mx-3"></i>
                Add Product</a>
            </div>
        </div>
    </div>


    <!-- CARD NA NI SIYA DIRI -->

    <div class="container mt-5 d-flex justify-content-center">
        <div class="card product-card">
            <img src="apple.jpg" class="card-img-top product-image" alt="Apple Cake">
            <div class="card-body text-center">
                <h5 class="product-title">APPLE CAKE</h5>
                <p class="product-description">
                    gwapako
                </p>
                <button class="btn btn-primary" style="font-size: 14px; padding: 10px 20px;" data-bs-toggle="modal" data-bs-target="#ProductModal">
                View More </button>            
            </div>
        </div>
    </div>
    

        <!-- Modal -->
    <div class="modal fade" id="ProductModal" tabindex="-1" aria-labelledby="ProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ProductModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3 text-center">
                            <img src="apple.jpg" class="img-fluid profile-img-circle-wiew" alt="Product Image">
                        </div>
                            <div class="col-12" >
                                <h5 class="mt-3 mb-4 d-flex justify-content-center align-items-center">Employee Name</h5>
                                <p><strong>Product Name:</strong> Apple Pie</p>
                                <p><strong>Product Description:</strong> sasdasd</p>
                                <p><strong>Product Quantity:</strong> 231</p>
                                <p><strong>Availability:</strong> On-Stock</p>
                                <p><strong>Status:</strong> dassdasd</p>
                                <p><strong>Price:</strong> gwapa ko</p>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a type="button" class="btn btn-warning" href="edit_product.php"><i class="bi bi-pencil-square"></i>
                    Edit</a>
                    <button type="button" class="btn btn-danger" id="deleteButton"><i class="bi bi-trash3-fill"></i>
                    Delete</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for handling delete button with error handling
        document.getElementById('deleteButton').addEventListener('click', function() {
            // Simulate a delete action with a promise
            let deleteAction = new Promise((resolve, reject) => {
                // Simulate a failure in deleting
                let errorOccurred = true; // Change this to `false` to simulate success
                if (errorOccurred) {
                    reject('Error: Failed to delete the employee.');
                } else {
                    resolve('Employee deleted successfully.');
                }
            });

            // Handle the promise result
            deleteAction
                .then((message) => {
                    alert(message);  // Success
                    // Close the modal
                    $('#employeeModal').modal('hide');
                })
                .catch((error) => {
                    alert(error);  // Error
                });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
