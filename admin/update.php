<?php
session_start();
require_once("includes/dbController.php");
$db_handle = new DBController();
if (isset($_POST['pass_update'])) {
    $new_pass = $db_handle->checkValue($_POST['new_pass']);
    $cnfrm_pass = $db_handle->checkValue($_POST['cnfrm_pass']);
    $old_pass = $db_handle->checkValue($_POST['old_pass']);

    if ($new_pass == $cnfrm_pass) {
        $update = $db_handle->insertQuery("update admin_login set password='$new_pass' where id='{$_SESSION['user_id']}' and password='$old_pass'");

        $log = $db_handle->insertQuery("INSERT INTO `activity_log`(`log_text`) VALUES ('{$_SESSION['name']} IP: {$_SERVER['REMOTE_ADDR']} change his password')");


        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Change-Password';
                </script>";
    }
}

if (isset($_POST['restaurant-edit'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['name']);
    $status = $db_handle->checkValue($_POST['status']);

    $update_value = '';

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

        $data = $db_handle->runQuery("SELECT * FROM `restaurant` WHERE id='$id'");
        unlink('../' . $data[0]["image"]);

        $update_value .= ",`image`='" . $image . "'";
    }

    $update = $db_handle->insertQuery("update restaurant set name='$name'" . $update_value . ", status='$status' where id='{$id}'");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Restaurants';
                </script>";

}

if (isset($_POST['product-edit'])) {
    $id = $db_handle->checkValue($_POST['id']);

    $restaurant_id = $db_handle->checkValue($_POST['restaurant-id']);

    $name = $db_handle->checkValue($_POST['name']);

    $time = $db_handle->checkValue($_POST['time']);

    $price = $db_handle->checkValue($_POST['price']);

    $description = $db_handle->checkValue($_POST['description']);

    $status = $db_handle->checkValue($_POST['status']);

    $update_value = '';

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

        $product = $db_handle->runQuery("SELECT * FROM `product` WHERE id='$id'");
        unlink('../' . $product[0]["image"]);

        $update_value .= ",`image`='" . $image . "'";
    }


    $update = $db_handle->insertQuery("UPDATE `product` SET `time`='$time',`p_name`='$name',`restaurant_id`='$restaurant_id',`description`='$description',`price`='$price'" . $update_value . ",`status`='$status' WHERE `id`='$id'");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Products';
                </script>";

}

if (isset($_POST['admin-edit'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['name']);
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);
    $role = $db_handle->checkValue($_POST['role']);

    $update = $db_handle->insertQuery("update admin_login set name='$name', email='$email', password='$password', role='$role' where id='{$id}'");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Admins';
                </script>";

}

if (isset($_POST['password-change'])) {
    $id = $db_handle->checkValue($_SESSION['user_id']);
    $password = $db_handle->checkValue($_POST['old-password']);
    $new_password = $db_handle->checkValue($_POST['new-password']);
    $confirm_password = $db_handle->checkValue($_POST['confirm-password']);

    $data = $db_handle->runQuery("SELECT * FROM `admin_login` WHERE id='$id'");

    if ($password == $data[0]['password'] && $new_password == $confirm_password) {
        $update = $db_handle->insertQuery("update admin_login set password='$password' where id='{$id}'");

        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Admins';
                </script>";
    } else {
        echo "<script>
                document.cookie = 'alert = 2;';
                window.location.href='Admins';
                </script>";
    }
}

if (isset($_GET['approve_order_id'])) {
    $id = $db_handle->checkValue($_GET['approve_order_id']);

    $update = $db_handle->insertQuery("update order_detail set status='1' where id='{$id}'");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Pending-Orders';
                </script>";
}

if (isset($_GET['decline_order_id'])) {
    $id = $db_handle->checkValue($_GET['decline_order_id']);

    $update = $db_handle->insertQuery("update order_detail set status='2' where id='{$id}'");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Pending-Orders';
                </script>";
}

if (isset($_POST['export-data'])) {
    $s_date = $db_handle->checkValue($_POST['s_date']);
    $e_date = $db_handle->checkValue($_POST['e_date']);

    $order_data = $db_handle->runQuery("SELECT * FROM `order_detail` where date>='$s_date' and date<='$e_date' order by id desc");
    $row_count = $db_handle->numRows("SELECT * FROM `order_detail` where date>='$s_date' and date<='$e_date' order by id desc");

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=order_details' . date("_Ymdhisa") . '.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('Order Number','Name', 'Restaurant', 'Food', 'Date', 'Time', 'Seat Number', 'Number', 'Email', 'Price', 'Occasion', 'Allergies'));

    for ($i = 0; $i < $row_count; $i++) {
        fputcsv($output, array($order_data[$i]["id"], $order_data[$i]["name"], $order_data[$i]["restaurant"], $order_data[$i]["food"],
            $order_data[$i]["date"], $order_data[$i]["time"], $order_data[$i]["seat_number"],
            $order_data[$i]["number"], $order_data[$i]["email"],$order_data[$i]["price"],
            $order_data[$i]["occasion"],$order_data[$i]["alergies"]));
    }
    fclose($output);
}



