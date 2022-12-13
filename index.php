<?php
require_once('includes/db-configure.php');
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/all.min.css"/>

    <!-- Swiper CSS -->
    <link rel='stylesheet' href='assets/vendors/swiper/css/swiper.min.css'>

    <!-- Style CSS -->
    <link rel='stylesheet' href='assets/css/style.css'>

    <link rel="icon" type="image/png" sizes="16x16" href="admin/images/favicon.png">

    <title>Home - Restaurant</title>
</head>
<body>

<!-- Product Section Start -->
<section class="container mt-3 pt-2 mb-5 pb-5">
    <?php
    $restaurant_data = $db_handle->runQuery("SELECT * FROM restaurant where status=1 order by id desc");
    $row_count = $db_handle->numRows("SELECT * FROM restaurant where status=1 order by id desc");
    $c = 0;
    for ($i = 0; $i < $row_count; $i++) {
        ?>
        <?php if ($i == 0) { ?>
            <div class="row <?php if ($i + 1 == $row_count) {
                echo 'mb-5';
            } ?> ">
                <div class="col-4 d-flex justify-content-center justify-content-center">
                </div>
                <div class="col-4 d-flex justify-content-center justify-content-center img-text">
                    <img src="<?php echo $restaurant_data[$i]["image"]; ?>" class="rounded-circle product-image">
                    <div class="centered">
                        <a href="Product?restaurant_id=<?php echo $restaurant_data[$i]["id"]; ?>"
                           class="product-link"><?php echo $restaurant_data[$i]["brand"]; ?></a>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center justify-content-center">
                </div>
            </div>
        <?php } else if ($c == 0) {
            $c = 1;
            ?>
            <div class="row product-margin <?php if ($i + 1 == $row_count) {
                echo 'mb-5';
            } ?> ">
                <div class="col-4 d-flex justify-content-center justify-content-center img-text">
                    <img src="<?php echo $restaurant_data[$i]["image"]; ?>" class="rounded-circle product-image">
                    <div class="centered">
                        <a href="Product?restaurant_id=<?php echo $restaurant_data[$i]["id"]; ?>"
                           class="product-link"><?php echo $restaurant_data[$i]["brand"]; ?></a>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center justify-content-center">
                    <?php $i++; ?>
                </div>
                <div class="col-4 d-flex justify-content-center justify-content-center img-text">
                    <?php if ($i < $row_count) { ?>
                        <img src="<?php echo $restaurant_data[$i]["image"]; ?>" class="rounded-circle product-image">
                        <div class="centered">
                            <a href="Product?restaurant_id=<?php echo $restaurant_data[$i]["id"]; ?>"
                               class="product-link"><?php echo $restaurant_data[$i]["brand"]; ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php
        } else {
            $c = 0;
            ?>
            <div class="row product-margin <?php if ($i + 1 == $row_count) {
                echo 'mb-5';
            } ?> ">
                <div class="col-4 d-flex justify-content-center justify-content-center">
                </div>
                <div class="col-4 d-flex justify-content-center justify-content-center img-text">
                    <img src="<?php echo $restaurant_data[$i]["image"]; ?>" class="rounded-circle product-image">
                    <div class="centered">
                        <a href="Product?restaurant_id=<?php echo $restaurant_data[$i]["id"]; ?>"
                           class="product-link"><?php echo $restaurant_data[$i]["brand"]; ?></a>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center justify-content-center">
                </div>
            </div>
        <?php } ?>
        <?php
    }
    ?>
</section>
<!-- Product Section End -->

<footer class="fixed-bottom pb-3 pt-3 bg-custom">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <button type="button" class="btn btn-info btn-lg custom-button" onclick="window.location.href='Booking'">
                Booking
            </button>
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

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="assets/js/toaster-init.js"></script>

</body>
</html>
