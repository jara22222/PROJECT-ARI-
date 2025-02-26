<?php
include('../Database/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sid = $_POST['SID'] ?? null;
    $company_name = $_POST['company_name'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';
    $email = $_POST['email'] ?? '';
    $license_number = $_POST['license_number'] ?? '';

    unset($_SESSION['errors']);
    unset($_SESSION['success']); // Clear previous messages

    // Function to check if company name exists (excluding current supplier)
    function company_name_exists($company_name, $sid) {
        global $conn;
        $stmnt = $conn->prepare("SELECT SID FROM suppliers WHERE company_name = ? AND SID != ?");
        $stmnt->bind_param('ss', $company_name, $sid);
        $stmnt->execute();
        $result = $stmnt->get_result();
        return $result->num_rows > 0;
    }

    // Function to check if email exists (excluding current supplier)
    function email_exists($email, $sid) {
        global $conn;
        $stmnt = $conn->prepare("SELECT SID FROM suppliers WHERE email = ? AND SID != ?");
        $stmnt->bind_param('ss', $email, $sid);
        $stmnt->execute();
        $result = $stmnt->get_result();
        return $result->num_rows > 0;
    }

    // Check if supplier exists
    $checkQuery = "SELECT SID FROM suppliers WHERE SID = ?";
    $stmtCheck = $conn->prepare($checkQuery);
    $stmtCheck->bind_param('s', $sid);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    if ($stmtCheck->num_rows === 0) {
        $_SESSION['errors'] = 'Supplier not found.';
        header('Location: ../SUPPLIER/supplier.php');
        exit();
    }
    $stmtCheck->close();

    // Check if company name or email already exists
    if (company_name_exists($company_name, $sid)) {
        $_SESSION['errors'] = 'Company name already exists!';
        header('Location: ../SUPPLIER/supplier.php');
        exit();
    }

    if (email_exists($email, $sid)) {
        $_SESSION['errors'] = 'Email already exists!';
        header('Location: ../SUPPLIER/supplier.php');
        exit();
    }

    // Update supplier details
    $query = "UPDATE suppliers
              SET company_name = ?, contact_number = ?, email = ?, license_number = ?
              WHERE SID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $company_name, $contact_number, $email, $license_number, $sid);
    
    if (!$stmt->execute()) {
        $_SESSION['errors'] = "Error updating supplier details.";
        header('Location: ../SUPPLIER/supplier.php');
        exit();
    }
    $stmt->close();

    $_SESSION['success'] = 'Supplier details updated successfully!';
    header('Location: ../SUPPLIER/supplier.php');
    exit();
} else {
    header('Location: ../SUPPLIER/supplier.php');
    exit();
}
?>
