<?php
require_once('admin/includes/dbController.php');
$db_handle = new DBController();

$restaurant_id = $_POST['restaurant_id'];

$order_data = $db_handle->runQuery("SELECT * FROM `product` where restaurant_id='$restaurant_id'");

$row = $db_handle->numRows("SELECT * FROM `product` where restaurant_id='$restaurant_id'");
?>
    <option selected>Choose..</option>
<?php
for ($i = 0; $i < $row; $i++) {
    ?>
    <option value="<?php echo $order_data[$i]['id']; ?>"><?php echo $order_data[$i]['p_name']; ?></option>
    <?php
}
