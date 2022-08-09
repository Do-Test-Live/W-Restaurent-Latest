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

    $insert = $db_handle->insertQuery("INSERT INTO `restaurant`(`name`,`image`) VALUES ('$name','$image')");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Restaurants';
                </script>";

}

if (isset($_POST['product-add'])) {

    $restaurant_id = $db_handle->checkValue($_POST['restaurant-id']);

    $name = $db_handle->checkValue($_POST['name']);

    $time = $db_handle->checkValue($_POST['time']);

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
