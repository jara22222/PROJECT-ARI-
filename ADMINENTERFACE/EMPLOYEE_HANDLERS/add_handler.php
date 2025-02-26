<?php
include("../Database/database.php"); // Include database connection
session_start(); // Start session

try {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        // Auto-generate IDs
        function generateEID($value) {
            return $value . '-' . rand(100, 999);
        }
        function generateUID($value) {
            return $value . '-' . rand(100, 999);
        }
        function generateAID($value) {
            return $value . '-' . rand(100, 999);
        }

        // Assigning values
        $role = $_POST['role'] ?? '';
        $EID = generateEID('EMP');
        $UID = generateUID('UID');
        $RID = '';   
        $AID = generateAID('AID');
        $fn = $_POST['fn'] ?? '';
        $ln = $_POST['ln'] ?? '';
        $mid = $_POST['mid'] ?? '';
        $bday = date('Y-m-d', strtotime($_POST['birthday'])); // Convert if needed
        $age = $_POST['age'] ?? '';
        $gender = $_POST['gender'] ?? '';
        $street = $_POST['street'] ?? '';
        $city = $_POST['city'] ?? '';
        $province = $_POST['province'] ?? '';
        $zipcode = $_POST['zipcode'] ?? '';
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmpassword = $_POST['confirmpassword'] ?? '';
        $email = $_POST['email'] ?? '';
        $phonenumber = $_POST['phonenumber'] ?? '';

        // Assign predefined RID based on role
        if ($role === 'Morning Shift') {
            $RID = 'RD-5';
        } elseif ($role === 'Afternoon Shift') {
            $RID = 'RD-6';
          } elseif ($role === 'Cook') {
            $RID = 'RD-4';
            
        } else {
            $_SESSION['errors'] = "Invalid role selected.";
            header('Location: ../EMPLOYEE/add_employee.php');
            exit;
        }

        // Validation for required fields
        if (empty($role) || empty($gender) || empty($EID) || empty($UID) || empty($RID)) {
            $_SESSION['errors'] = "Missing required fields";
            header('Location: ../EMPLOYEE/add_employee.php');
            exit;
        }

        if (empty($username) || empty($password) || empty($confirmpassword)) {
            $_SESSION['errors'] = "Username and password are required";
            header('Location: ../EMPLOYEE/add_employee.php');
            exit;
        }

        if (strlen($phonenumber) !== 11) {
            $_SESSION['errors'] = "Phone number must be exactly 11 digits";
            header('Location: ../EMPLOYEE/add_employee.php');
            exit;
        }

        if ($password !== $confirmpassword) {
            $_SESSION['errors'] = "Passwords do not match";
            header('Location: ../EMPLOYEE/add_employee.php');
            exit;
        }

        // Check if username exists
        function username_exist($username) {
            global $conn;
            $stmnt = $conn->prepare("SELECT UID FROM users WHERE username = ?");
            $stmnt->bind_param('s', $username);
            $stmnt->execute();
            $result = $stmnt->get_result();
            return $result->num_rows > 0;
        }

        // Check if email exists
        function email_exist($email) {
            global $conn;
            $stmnt = $conn->prepare("SELECT EID FROM employees WHERE email = ?");
            $stmnt->bind_param('s', $email);
            $stmnt->execute();
            $result = $stmnt->get_result();
            return $result->num_rows > 0;
        }

        // Validate username and email existence
        if (username_exist($username)) {
            $_SESSION['errors'] = 'Username already exists';
            header('Location: ../EMPLOYEE/add_employee.php');
            exit;
        }

        if (email_exist($email)) {
            $_SESSION['errors'] = 'Email already exists';
            header('Location: ../EMPLOYEE/add_employee.php');
            exit;
        }

        // Insert into users first
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmnt2 = $conn->prepare("INSERT INTO users (UID, username, password) VALUES (?, ?, ?)");
        $stmnt2->bind_param("sss", $UID, $username, $hashed_password);

        if (!$stmnt2->execute()) {
            $_SESSION['errors'] = "Error inserting user data.";
            header('Location: ../EMPLOYEE/add_employee.php');
            exit;
        }

        // Insert into employees AFTER roles exist
        $stmt = $conn->prepare("
            INSERT INTO employees (EID, RID, UID, fn, ln, mid, age, gender, bday, email, phone_num) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("ssssssissss", $EID, $RID, $UID, $fn, $ln, $mid, $age, $gender, $bday, $email, $phonenumber);

        if (!$stmt->execute()) {
            $_SESSION['errors'] = "Error inserting employee data.";
            header('Location: ../EMPLOYEE/add_employee.php');
            exit;
        }

        // Insert into address
        $stmnt4 = $conn->prepare("INSERT INTO address (AID, EID, street, city, province, zipcode) VALUES (?, ?, ?, ?, ?, ?)");
        $stmnt4->bind_param("sssssi", $AID, $EID, $street, $city, $province, $zipcode);

        if (!$stmnt4->execute()) {
            $_SESSION['errors'] = "Error inserting address data.";
            header('Location: ../EMPLOYEE/add_employee.php');
            exit;
        }

        // Success message
        $_SESSION['success'] = "You're now registered!";
        header('Location: ../EMPLOYEE/add_employee.php');
        exit;
    }
} catch (Exception $e) {
    $_SESSION['errors'] = "Error: " . $e->getMessage();
    header('Location: ../EMPLOYEE/add_employee.php');
    exit;
}
?>
