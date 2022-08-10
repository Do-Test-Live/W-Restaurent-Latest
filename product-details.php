<?php
require_once('includes/db-configure.php');
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta p_name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/all.min.css"/>

    <!-- Swiper CSS -->
    <link rel='stylesheet' href='assets/vendors/swiper/css/swiper.min.css'>

    <!-- Style CSS -->
    <link rel='stylesheet' href='assets/css/style.css'>

    <title>Product Details - Restaurant</title>
</head>
<body>

<!-- Product Section Start -->
<section class="container mt-3 mb-5 pb-5">
    <?php
    if (isset($_GET['product_id'])) {
        $product_data = $db_handle->runQuery("SELECT * FROM product where id={$_GET['product_id']} order by id desc");
        $row_count = $db_handle->numRows("SELECT * FROM product where id={$_GET['product_id']} order by id desc");

        $restaurant_id = '';
        for ($i = 0; $i < $row_count; $i++) {
            $restaurant_id = $product_data[$i]["restaurant_id"];
            ?>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <img src="<?php echo $product_data[$i]["image"]; ?>" class="card-img-top card-product-image"
                             alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title"><?php echo $product_data[$i]["p_name"]; ?></h5>
                                </div>
                                <div class="col-6 text-end">
                                    <h5 class="card-title"><?php echo $product_data[$i]["price"]; ?></h5>
                                </div>
                            </div>
                            <p class="card-text"><?php echo $product_data[$i]["description"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row mb-5">
            <?php
            $product_data = $db_handle->runQuery("SELECT * FROM product where restaurant_id={$restaurant_id} order by RAND() limit 4");
            $row_count = $db_handle->numRows("SELECT * FROM product where restaurant_id={$restaurant_id} order by RAND() desc limit 4");
            for ($i = 0; $i < $row_count; $i++) {
                ?>
                <div class="col-6 mt-3">
                    <div class="card">
                        <img src="<?php echo $product_data[$i]["image"]; ?>" class="card-img-top card-product-image" alt="...">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <p class="card-title"><?php echo $product_data[$i]["p_name"]; ?></p>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="card-title"><?php echo $product_data[$i]["price"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php
    } ?>
</section>
<!-- Product Section End -->

<footer class="fixed-bottom pb-3 pt-3 bg-custom">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <button type="button" class="btn btn-info btn-lg custom-button">Booking</button>
        </div>
        <div class="row mt-4">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <i class="fa-brands fa-bandcamp"></i>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-bell"></i>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-award"></i>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap JS -->
<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Swiper JS -->
<script src="assets/vendors/swiper/js/swiper.min.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>

</body>
</html>
