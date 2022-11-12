<?php
session_start();
require_once("includes/dbController.php");
$db_handle = new DBController();

function productCode($length)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


if (isset($_POST['restaurant-add'])) {

    $name = $db_handle->checkValue($_POST['name']);
    $contact_number = $db_handle->checkValue($_POST['contact_number']);
    $address = $db_handle->checkValue($_POST['address']);

    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/img/restaurant/" . $file_name);
            $image = "assets/img/restaurant/" . $file_name;
        }
    }

    $insert = $db_handle->insertQuery("INSERT INTO `restaurant`(`name`,`number`,`image`,`address`) VALUES ('$name','$contact_number','$image','$address')");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Restaurants';
                </script>";

}

if (isset($_POST['product-add'])) {

    $restaurant_id = $db_handle->checkValue($_POST['restaurant-id']);

    $name = $db_handle->checkValue($_POST['name']);

    $time = $db_handle->checkValue($_POST['time']);

    $discount = $db_handle->checkValue($_POST['discount']);

    $price = $db_handle->checkValue($_POST['price']);

    $description = $db_handle->checkValue($_POST['description']);

    $code = $db_handle->checkValue(productCode(8));

    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/img/product/" . $file_name);
            $image = "assets/img/product/" . $file_name;
        }
    }

    $insert = $db_handle->insertQuery("INSERT INTO `product`( `restaurant_id`, `p_name`, `code`, `time`, `price`, `description`, `image`) VALUES ('$restaurant_id','$name','$code','$time','$price','$description','$image')");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Products';
                </script>";

}

if (isset($_POST['admin-add'])) {

    $name = $db_handle->checkValue($_POST['name']);

    $email = $db_handle->checkValue($_POST['email']);

    $password = $db_handle->checkValue($_POST['password']);

    $role = $db_handle->checkValue($_POST['role']);

    $insert = $db_handle->insertQuery("INSERT INTO `admin_login`(`name`,`email`,`password`,`role`) VALUES ('$name','$email','$password','$role')");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Admins';
                </script>";

}

if (isset($_POST['import-data'])) {
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['order_details']['name']))
    {

        // Open uploaded CSV file with read-only mode
        $csvFile = fopen($_FILES['order_details']['tmp_name'], 'r');

        // Skip the first line
        fgetcsv($csvFile);

        // Parse data from CSV file line by line
        // Parse data from CSV file line by line
        while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
        {
            $code = $db_handle->checkValue(productCode(8));
            $insert = $db_handle->insertQuery(" INSERT INTO `order_detail`( `name`, `restaurant`, `food`, `code`, `date`, `time`, `seat_number`, `number`, `email`, `price`, `occasion`, `alergies`, `status`) VALUES ('$getData[1]','$getData[2]','$getData[3]','$code','$getData[4]','$getData[5]','$getData[6]','$getData[7]','$getData[8]','$getData[9]','$getData[10]','$getData[11]','1')");
        }

        // Close opened CSV file
        fclose($csvFile);

        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Import-Export';
                </script>";

    }


    $name = $db_handle->checkValue($_POST['name']);

    $email = $db_handle->checkValue($_POST['email']);

    $password = $db_handle->checkValue($_POST['password']);

    $role = $db_handle->checkValue($_POST['role']);

    $insert = $db_handle->insertQuery("INSERT INTO `admin_login`(`name`,`email`,`password`,`role`) VALUES ('$name','$email','$password','$role')");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Admins';
                </script>";

}
