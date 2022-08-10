<?php
session_start();
require_once("includes/dbController.php");
$db_handle = new DBController();
if (isset($_GET['restaurant_id'])) {
    $id = $db_handle->checkValue($_GET['restaurant_id']);

    $product = $db_handle->numRows("select * FROM `product` WHERE restaurant_id='{$id}'");

    if ($product == 0) {
        $delete = $db_handle->insertQuery("DELETE FROM `restaurant` WHERE id='{$id}'");

        echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Restaurants';
                </script>";
    } else {
        echo 'P';
    }

}

if (isset($_GET['product_id'])) {
    $id = $db_handle->checkValue($_GET['product_id']);

    $product = $db_handle->runQuery("select * FROM `product` WHERE id='{$id}'");

    unlink('../'.$product[0]["image"]);

    $delete = $db_handle->insertQuery("DELETE FROM `product` WHERE id='{$id}'");

    echo "<script>
                document.cookie = 'alert = 1;';
                window.location.href='Products';
                </script>";
}
