<?php
include("../Database/database.php"); // Include database connection
session_start(); // Start session

try {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        // Auto-generate IDs
        function generateRID($value) {
            return $value . '-' . rand(100, 999);
        }
       
      
        $RID = generateRID('RID');
        $position = $_POST['position'] ?? '';
        $description = $_POST['description'] ?? '';

       


        // Check if position exists
        function position_exist($position) {
            global $conn;
            $stmnt = $conn->prepare("SELECT RID FROM roles WHERE rolename = ?");
            $stmnt->bind_param('s', $position);
            $stmnt->execute();
            $result = $stmnt->get_result();
            return $result->num_rows > 0;
        }

        // Check if RID exists
        function RID_exist($email) {
            global $conn;
            $stmnt = $conn->prepare("SELECT RID FROM roles WHERE RID = ?");
            $stmnt->bind_param('s', $RID);
            $stmnt->execute();
            $result = $stmnt->get_result();
            return $result->num_rows > 0;
        }

        // Validate username and email existence
        if (position_exist($position)) {
            $_SESSION['errors'] = 'Username already exists';
            header('Location: ../ROLE/role.php');
            exit();
        }

        if (RID_exist($RID)) {
            $_SESSION['errors'] = 'RID already exists';
            header('Location: ../ROLE/role.php');
            exit();
        }

        $stmnt2 = $conn->prepare("INSERT INTO roles (RID, rolename, description) VALUES (?, ?, ?)");
        $stmnt2->bind_param("sss", $RID, $position, $description);

        if (!$stmnt2->execute()) {
            $_SESSION['errors'] = "Error inserting user data.";
            header('Location: ../ROLE/role.php');
            exit;
        }
        else{

    
        // Success message
        $_SESSION['success'] = "You're now registered!";
        header('Location: ../ROLE/role.php');
        exit;
    }
    }
} catch (Exception $e) {
    $_SESSION['errors'] = "Error: " . $e->getMessage();
    header('Location: ../ROLE/role.php');
    exit;
}
?>
