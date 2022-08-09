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

if (isset($_POST['product_add'])) {
    $name = $db_handle->checkValue($_POST['p_name']);

    $time = $db_handle->checkValue($_POST['time']);

    $price = $db_handle->checkValue($_POST['price']);

    $code = $db_handle->checkValue(productCode(8));

    $menu_image = '';
    if (!empty($_FILES['menu_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['menu_image']['name'];
        $file_size = $_FILES['menu_image']['size'];
        $file_tmp = $_FILES['menu_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/img/sk-menu/" . $file_name);
            $menu_image = "assets/img/sk-menu/" . $file_name;
        }
    }

    $shop_image = '';
    if (!empty($_FILES['shop_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['shop_image']['name'];
        $file_size = $_FILES['shop_image']['size'];
        $file_tmp = $_FILES['shop_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/img/sk-shop/" . $file_name);
            $shop_image = "assets/img/sk-shop/" . $file_name;
        }
    }


    $error = array();
    $extension = array("jpeg", "jpg", "png", "gif");
    if (!empty($_FILES['extended_image']['name'])) {
        foreach ($_FILES["extended_image"]["tmp_name"] as $key => $tmp_name) {


            $RandomAccountNumber = mt_rand(1, 99999);
            $file_name = $RandomAccountNumber . "_" . $_FILES['extended_image']['name'][$key];
            $file_size = $_FILES['extended_image']['size'][$key];
            $file_tmp = $_FILES['extended_image']['tmp_name'][$key];

            $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            if (
                $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
                && $file_type != "gif"
            ) {
                $attach_files = '';
            } else {
                move_uploaded_file($file_tmp, "../assets/img/sk-shop-extended/" . $file_name);
                $error[] = "assets/img/sk-shop-extended/" . $file_name;
            }
        }
    }

    $extended_image = implode(',', $error);

    $insert = $db_handle->insertQuery("INSERT INTO `tblproduct`( `name`, `code`, `time`, `price`, `menu_image`, `product_image`, `extended_image`) VALUES ('$name','$code','$time','$price','$menu_image','$shop_image','$extended_image')");

    $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} insert new product')");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Product';
                </script>";

}
