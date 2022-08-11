<?php
require_once('admin/includes/dbController.php');
$db_handle = new DBController();

$product_id = $_POST['product_id'];
$date = $_POST['date'];

$order_data = $db_handle->runQuery("SELECT * FROM `product` where id='$product_id'");

$price=explode(',', $order_data[0]["price"]);
$time=explode(',', $order_data[0]["time"]);
?>
    <option selected>Choose..</option>
<?php
for ($i = 0; $i < count($time); $i++) {
    $dateTime = new DateTime(($date.' '.$time[$i]));
    $date_new= $dateTime->format('Y-m-d H:i:s');

    $date_current=date('Y-m-d H:i:s');
    ?>
    <option value="<?php echo $time[$i].', HKD-'.$price[$i]; ?>" <?php if($date_new<$date_current){ echo 'disabled'; } ?>><?php echo $time[$i].', HKD-'.$price[$i]; ?></option>
    <?php
}
