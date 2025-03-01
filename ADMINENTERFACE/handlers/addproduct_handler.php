        <?php
        include("../database/database.php");

        try {
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {



                $pname = $_POST['pname'];
                $pdesc = $_POST['pdesc'];
                $PTID = trim($_POST['PTID']);
                $price = $_POST['price'];
                $SID = $_POST['SID'];
                var_dump($SID);
                var_dump($PTID);
                $img = $_FILES['img']['tmp_name'];
                $imgData = file_get_contents($img);


                $stmt = $conn->prepare('Insert into products(SID,PTID,product_name,product_description,price,image)
                values(?,?,?,?,?,?)');
                $stmt->bind_param('ssssdb', $SID, $PTID, $pname, $pdesc, $price, $imgData);
                $stmt->send_long_data(5, $imgData);

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