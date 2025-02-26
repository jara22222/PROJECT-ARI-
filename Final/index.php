<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="designs/bg.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>LogIn</title>

</head>

<body>

    <div class="align-items-center d-flex justify-content-center vh-100">
        <div class="container-fluid d-flex justify-content-center ">
            <div class="row">
                <div class="log card p-4 " style="width:40rem">
                    <form action="admin.php" class="form">
                    <div class="mt-3 my-4 text-center">
                        <h2 class="fw-bold text-white display-6" style="font-family: 'Roboto', sans-serif; font-weight: bold; letter-spacing: 3px;">
                            LOGIN
                        </h2>
                    </div>



                        <!--User-->
                        <div class="row align-items-center mt-3 ">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="input-group w-75">
                                    <span class="input-group-text">
                                        <img src="designs/usericon.png" alt="User Icon" width="20px">
                                    </span>
                                    <input type="text" class="form-control" placeholder="Enter your username" required>
                                </div>
                            </div>
                        </div>
                        <!--Password-->
                        <div class="row align-items-center mt-3">
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="input-group w-75">
                                    <span class="input-group-text">
                                        <img src="designs/lock.png" alt="Lock Icon" width="20px">
                                    </span>
                                    <input type="password" class="form-control" placeholder="Enter your password"
                                        required>

                                        
                                </div>
                            </div>



                        </div>


                        <div class="row align-items-center p-2">
                            <div class="col-md-12 text-center"> <small>Forgot Password? <a class="text-decoration-none"
                                        href="">Reset
                                        password</a></small>

                                <div class="col-md-12 text-center"><small>Don't have an account? <a
                                            class="text-decoration-none" href="register.php">Sign
                                            up</a></small></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col d-flex justify-content-center mt-4">
                                <button type="submit" class="form-control btn-success " style="font-family: 'Roboto', sans-serif; font-weight: bold; letter-spacing: 1px; width: 15rem;">LOG IN</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </div>








</body>

</html>