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

    <title>Product - Restaurant</title>
</head>
<body>

<!-- Product Section Start -->
<section class="container mt-3 mb-5 pb-5">
    <div class="header">
        <ul class="nav d-flex justify-content-center">
            <li class="nav-item">
                <a class="nav-link active text-dark" aria-current="page" href="#">Booking</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">Recommend</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">Reservation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">New Restaurant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">Take Away</a>
            </li>
        </ul>
    </div>
    <?php
    if (isset($_GET['restaurant_id'])) {
        $product_data = $db_handle->runQuery("SELECT * FROM restaurant, product where product.restaurant_id=restaurant.id and product.restaurant_id={$_GET['restaurant_id']} order by product.id desc");
        $row_count = $db_handle->numRows("SELECT * FROM product, restaurant where product.restaurant_id=restaurant.id and product.restaurant_id={$_GET['restaurant_id']} order by product.id desc");

        for ($i = 0; $i < $row_count; $i++) {
            ?>

            <div class="row mt-3 <?php if ($i + 1 == $row_count) {
                echo 'mb-5';
            } ?>">
                <div class="col-12">
                    <div class="card">
                        <a href="Product-Details?product_id=<?php echo $product_data[$i]["id"]; ?>" class="product-link">
                            <img src="<?php echo $product_data[$i]["image"]; ?>" class="card-img-top card-product-image"
                                 alt="...">
                        </a>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title"><?php echo $product_data[$i]["p_name"]; ?></h5>
                                    <p><?php echo $product_data[$i]["name"]; ?></p>
                                    <p><?php echo $product_data[$i]["brand"]; ?></p>
                                    <p><?php echo $product_data[$i]["address"]; ?></p>
                                    <p><?php echo $product_data[$i]["number"]; ?></p>
                                </div>
                                <div class="col-6 text-end">
                                    <h5 class="card-title"><?php echo $product_data[$i]["price"]; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } ?>
</section>
<!-- Product Section End -->

<footer class="fixed-bottom pb-3 pt-3 bg-custom">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <button type="button" class="btn btn-info btn-lg custom-button" onclick="window.location.href='Booking'">Booking</button>
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
