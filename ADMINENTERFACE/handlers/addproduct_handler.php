<?php
include("../database/database.php");

try {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        $pname = $_POST['pname'];
        $pdesc = $_POST['pdesc'];
        $ptype = $_POST['ptype'];
        $supplier = $_POST['supplier'];
        var_dump($supplier);
        $img = $_FILES['img']['tmp_name'];
        $imgData = file_get_contents($img);



        $stmt = $conn->prepare('Insert into products(SID,product_name,product_description,product_type,image)
        values(?,?,?,?,?)');
        $stmt->bind_param('ssssb', $supplier, $pname, $pdesc, $ptype, $imgData);
        $stmt->send_long_data(4, $imgData);

        if ($stmt->execute()) {
            echo "Product successfully added!";
        } else {
            echo "Error: " . $stmt->error;
        }



    }
} catch (Exception $e) {
    echo "Error:" . $e->getMessage() . "";
}
?>