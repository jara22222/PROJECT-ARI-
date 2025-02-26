<?php
include('../Database/database.php');
session_start();

// Check if an ID is provided for update
if (!isset($_POST['id']) || empty($_POST['id'])) {
    header('Location: edit_employee.php');
    exit();
}

$eid = $_POST['id'];
$query = "
        SELECT e.*, ed.* 
        FROM employees e
        LEFT JOIN employee_details ed ON e.EID = ed.EID
        WHERE e.EID = ?";
    $stmt = $conn->prepare($query);
$stmt->bind_param('s', $eid);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="../DESIGNS/style.css">
    <title>Employee Personal Information</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4">
                    <!-- Close button (top right) -->
                    <button type="button" class="btn-close" aria-label="Close"
                        onclick="window.location.href='employee.php';"
                        style="position: absolute; top: 15px; right: 20px;"></button>

                    <div class="d-flex align-items-center">
                        <img src="Logo.png" alt="Company Logo" class="img-fluid"
                            style="width: 150px; height: 120px; margin-right: 30px; margin-left:20px;">
                        <div class="text-left">
                            <h1 class="mt-2">Employee Personal Information</h1>
                            <p>Blacksnow Cafe</p>
                        </div>

                    </div>

                    <form action="../EMPLOYEE_HANDLERS/update_handler.php" method="POST">

                        <input type="hidden" name="EID" value="<?php echo ($employee['EID'] ?? ''); ?>">
                        <input type="hidden" name="UID" value="<?php echo ($employee['UID'] ?? ''); ?>">

                        <input type="hidden" name="AID" value="<?php echo ($employee['AID'] ?? ''); ?>">
                        <div class="mb-4 mt-5">
                            <label class="form-label fonts-2">Name</label>
                            <div class="row">
                                <div class="col-md-4 mb-2"><input name="fn"
                                        value="<?php echo ($employee['fn'] ?? ''); ?>" type="text" class="form-control"
                                        placeholder="First Name" required></div>
                                <div class="col-md-4 mb-2"><input name="mid"
                                        value="<?php echo ($employee['mid'] ?? ''); ?>" type="text" class="form-control"
                                        placeholder="Middle Name"></div>
                                <div class="col-md-4 mb-2"><input name="ln"
                                        value="<?php echo ($employee['ln'] ?? ''); ?>" type="text" class="form-control"
                                        placeholder="Last Name" required></div>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-4 mb-2">
                                <label class="form-label fonts-2">Age</label>

                                <input name="age" value="<?php echo ($employee['age'] ?? ''); ?>" type="number"
                                    placeholder="Age" class="form-control" required>

                                <label class="form-label fonts-2">Birthdate </label>
                                <input name="birthday" value="<?php echo ($employee['bday'] ?? ''); ?>" type="date"
                                    class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label fonts-2">Gender</label>
                                <select name="gender" class="form-control" required>
                                    <?php if ($employee['gender'] == 'M') { ?>"
                                        <option value="M">Male</option>

                                        <option value="F">Female</option>
                                        <option value="N/A">N/A</option>

                                    <?php } ?>"

                                    <?php if ($employee['gender'] == 'F') { ?>"
                                        <option value="F">Female</option>

                                        <option value="M">Female</option>
                                        <option value="N/A">N/A</option>

                                    <?php } ?>"

                                    <?php if ($employee['gender'] == 'N/A') { ?>"
                                        <option value="N/A">N/A</option>

                                        <option value="M">Male</option>
                                        <option value="F">Female</option>

                                    <?php } ?>"

                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label fonts-2">Employee Role </label>
                                <select name="role" class="form-control" required>
                                    <?php if ($employee['roleName'] == 'Morning Shift') { ?>"
                                        <option value="Morning Shift" selected>Morning Shift</option>
                                        <option value="Afternoon Shift">Afternoon Shift</option>
                                        <option value="Cook">Cook</option>

                                    <?php } ?>"

                                    <?php if ($employee['roleName'] == 'Afternoon Shift') { ?>"
                                        <option value="Afternoon Shift" selected>Afternoon Shift</option>

                                        <option value="Morning Shift">Morning Shift</option>
                                        <option value="Cook">Cook</option>

                                    <?php } ?>"

                                    <?php if ($employee['roleName'] == 'Cook') { ?>"
                                        <option value="Cook" selected>Cook</option>

                                        <option value="Afternoon Shift">Afternoon Shift</option>

                                        <option value="Morning Shift">Morning Shift</option>

                                    <?php } ?>"
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fonts-2">Address </label>
                            <div class="mb-3 row">
                                <div class="col-md-6 mb-2"><input name="street"
                                        value="<?php echo ($employee['street'] ?? ''); ?>" type="text"
                                        class="form-control" placeholder="Street" required></div>
                                <div class="col-md-6 mb-2"><input name="city"
                                        value="<?php echo ($employee['city'] ?? ''); ?>" type="text"
                                        class="form-control" placeholder="City" required></div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6 mb-2"><input name="province"
                                        value="<?php echo ($employee['province'] ?? ''); ?>" type="text"
                                        class="form-control" placeholder="Province" required></div>
                                <div class="col-md-6 mb-2"><input name="zipcode" type="text"
                                        value="<?php echo ($employee['zipcode'] ?? ''); ?>" class="form-control"
                                        placeholder="Zip Code" required></div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="mb-3 row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label fonts-2">Contact Number</label>
                                    <input name="phonenumber" value="<?php echo ($employee['phone_num'] ?? ''); ?>"
                                        type="text" class="form-control" placeholder="+63 (00) 000-0000" required>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label fonts-2">Email</label>
                                    <input name="email" value="<?php echo ($employee['email'] ?? ''); ?>" type="email"
                                        class="form-control" placeholder="example@example.com" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label fonts-2">Username</label>
                                    <input name="username" value="<?php echo ($employee['username'] ?? ''); ?>"
                                        type="text" class="form-control" placeholder="Username" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label fonts-2">Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Password"
                                        required>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label fonts-2">Confirm Password</label>
                                    <input name="confirmpassword" type="password" class="form-control"
                                        placeholder="Confirm Password" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label mb-2 fonts-2">File Upload</label>
                            <div class="border p-3 text-center mb-2" style="border-style: dashed;">
                                <input name="profile" type="file" class="form-control-file">
                                <p class="text-muted">Drag and drop files here</p>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success" style="width: 300px;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>