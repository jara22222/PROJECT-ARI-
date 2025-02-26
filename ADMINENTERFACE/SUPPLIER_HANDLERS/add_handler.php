<?php
include("../Database/database.php"); // Include database connection
session_start(); // Start session

try {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        // Auto-generate Supplier ID
        function generateSID() {
            return 'SID-' . rand(100, 999);
        }

        $SID = generateSID();
        $company_name = $_POST['company_name'] ?? '';
        $contact_number = $_POST['contact_number'] ?? '';
        $email = $_POST['email'] ?? '';
        $license_number = $_POST['license_number'] ?? '';

        // Check if company name already exists
        function company_exist($company_name) {
            global $conn;
            $stmnt = $conn->prepare("SELECT SID FROM suppliers WHERE company_name = ?");
            $stmnt->bind_param('s', $company_name);
            $stmnt->execute();
            $result = $stmnt->get_result();
            return $result->num_rows > 0;
        }

        // Check if Supplier ID exists
        function SID_exist($SID) {
            global $conn;
            $stmnt = $conn->prepare("SELECT SID FROM suppliers WHERE SID = ?");
            $stmnt->bind_param('s', $SID);
            $stmnt->execute();
            $result = $stmnt->get_result();
            return $result->num_rows > 0;
        }

        // Validate existence
        if (company_exist($company_name)) {
            $_SESSION['errors'] = 'Company name already exists';
            header('Location: ../SUPPLIER/supplier.php');
            exit();
        }

        if (SID_exist($SID)) {
            $_SESSION['errors'] = 'Supplier ID already exists';
            header('Location: ../SUPPLIER/supplier.php');
            exit();
        }

        // Insert into database
        $stmnt2 = $conn->prepare("INSERT INTO suppliers (SID, company_name, contact_number, email, license_number) VALUES (?, ?, ?, ?, ?)");
        $stmnt2->bind_param("sssss", $SID, $company_name, $contact_number, $email, $license_number);

        if (!$stmnt2->execute()) {
            $_SESSION['errors'] = "Error inserting supplier data.";
            header('Location: ../SUPPLIER/supplier.php');
            exit;
        } else {
            // Success message
            $_SESSION['success'] = "Supplier added successfully!";
            header('Location: ../SUPPLIER/supplier.php');
            exit;
        }
    }
} catch (Exception $e) {
    $_SESSION['errors'] = "Error: " . $e->getMessage();
    header('Location: ../SUPPLIER/supplier.php');
    exit;
}
?>
