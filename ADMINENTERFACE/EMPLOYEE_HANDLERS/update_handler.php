<?php
include('../Database/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $eid = $_POST['EID'] ?? null;

  $role = $_POST['role']; 
    $uid = $_POST['UID'];
    $aid = $_POST['AID'];
    $RID = '';
    $firstName = $_POST['fn'];
    $middleName = $_POST['mid'];
    $lastName = $_POST['ln'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phonenumber'];

    // Ensure age is an integer
    $age = (int)$age;

    if ($role === 'Morning Shift') {
      $RID = 'RD-5';
  } elseif ($role === 'Afternoon Shift') {
      $RID = 'RD-6';
    } elseif ($role === 'Cook') {
      $RID = 'RD-4';
    }

    

    // Convert birthday format
    $bday = date('Y-m-d', strtotime($_POST['birthday']));

    unset($_SESSION['errors']);
    unset($_SESSION['success']); // Clear previous messages
    
    if (!$eid) {
      die("EID is missing! Check if 'id' is passed correctly.");
  }
  
  // Debugging: Check if passwords are actually mismatched
  if ($password !== $confirmPassword) {
      echo "Passwords do not match! Redirecting...";
      sleep(2); // Pause for 2 seconds to see the message before redirection
      $_SESSION['errors'] = 'Passwords do not match.';
      header("Location: ../EMPLOYEE/edit_employee.php?id=" . urlencode($eid));
      exit();
  }


    // Update employee details
    $queryEmp = "UPDATE employees
                 SET RID=?, fn=?, ln=?, mid=?, age=?, gender=?, bday=?, email=?, phone_num=?
                 WHERE EID=?";
    $stmtEmp = $conn->prepare($queryEmp);
    $stmtEmp->bind_param("ssssisssss",$RID, $firstName, $lastName, $middleName, $age, $gender, $bday, $email, $phoneNumber, $eid);
    
    if (!$stmtEmp->execute()) {
        $_SESSION['errors'] = "Error updating employee details.";
        header('Location: ../EMPLOYEE/edit_employee.php');
        exit();
    }
    $stmtEmp->close();

    // Update username and password only if a new password is provided
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $queryUser = "UPDATE users SET username=?, password=? WHERE UID=?";
        $stmtUser = $conn->prepare($queryUser);
        $stmtUser->bind_param("sss", $username, $hashedPassword, $uid);
    } else {
        $queryUser = "UPDATE users SET username=? WHERE UID=?";
        $stmtUser = $conn->prepare($queryUser);
        $stmtUser->bind_param("ss", $username, $uid);
    }

    if (!$stmtUser->execute()) {
        $_SESSION['errors'] = "Error updating user details.";
        header('Location: ../EMPLOYEE/edit_employee.php');
        exit();
    }
    $stmtUser->close();

    // Update address
    $queryAddr = "UPDATE address SET street=?, city=?, province=?, zipcode=? WHERE AID=?";
    $stmtAddr = $conn->prepare($queryAddr);
    $stmtAddr->bind_param("sssis", $street, $city, $province, $zipcode, $aid);

    if (!$stmtAddr->execute()) {
        $_SESSION['errors'] = "Error updating address.";
        header('Location: ../EMPLOYEE/edit_employee.php');
        exit();
    }
    $stmtAddr->close();

    if ($stmt->execute()) {
      $_SESSION['success'] = 'Employee details updated successfully!';
      header('Location: ../EMPLOYEE/employee.php');
      exit();
  } else {
      $_SESSION['errors'] = 'Failed to update employee details.';
      header('Location: ../EMPLOYEE/edit_employee.php');
      exit();
  }
} else {
    header('Location: ../EMPLOYEE/employee.php');
    exit();
}
?>
