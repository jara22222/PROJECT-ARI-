<?php
include("../database/database.php");

try {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        $category_name = $_POST['category_name'];

        if(exist($category_name)){
            echo "<script>alert('Category Already Exist')</script>";
            echo "<script>window.open('../product/add_product.php','_self')</script>";
        }
        else{
            addCategory($category_name);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Category Added Successfully')</script>";
            echo "<script>window.open('../product/add_product.php','_self')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }



    }
} catch (Exception $e) {
    echo "Error:" . $e->getMessage() . "";
}
function addCategory($category_name)
{
    global $conn;
    $stmt = $conn->prepare('Insert into product_type(type_name) 
    values(?)');
    $stmt->bind_param('s', $category_name);

    if ($stmt->execute()) {
        echo "<script>alert('Category Added Successfully')</script>";
        echo "<script>window.open('../product/add_product.php','_self')</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
   
}

 function exist($category)
    {
        global $conn;
        $stmt = $conn->prepare('Select * from product_type where type_name = ?');
        $stmt->bind_param('s', $category);
        $stmt->execute();
        $stmt->store_result();
        $stmt->fetch();
        $num_rows = $stmt->num_rows;
        if ($num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
?>