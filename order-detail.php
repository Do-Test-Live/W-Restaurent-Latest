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

    <title>Order Details - Restaurant</title>
</head>
<body>

<!-- Product Section Start -->
<section class="container mt-3 mb-5 pb-5">
    <div class="header">
        <ul class="nav d-flex justify-content-center">
            <li class="nav-item">
                <a class="nav-link active text-dark" aria-current="page" href="Booking">Booking</a>
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
    <div class="row mb-5">
        <div class="col-12 mt-3">
            <h2 class="text-center">Order Details</h2>
            <?php
            if (!isset($_GET['code'])) {
                header('location:Home');
            }
            $order_data = $db_handle->runQuery("SELECT * FROM `order_detail` where code='{$_GET['code']}'");
            ?>
        </div>
        <<div class="row mb-3">
            <div class="col-md-6">
                <p>Name</p>
                <h5>
                    <?php
                    echo $order_data[0]['name'];
                    ?>
                </h5>
            </div>
            <div class="col-md-6">
                <p>Food Name</p>
                <h5>
                    <?php
                    echo $order_data[0]['food'];
                    ?>
                </h5>
            </div>
            <div class="col-md-6">
                <p>Number</p>
                <h5>
                    <?php
                    echo $order_data[0]['number'];
                    ?>
                </h5>
            </div>
            <div class="col-md-6">
                <p>Email</p>
                <h5>
                    <?php
                    echo $order_data[0]['email'];
                    ?>
                </h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <p>Date</p>
                <h5>
                    <?php
                    echo $order_data[0]['date'];
                    ?>
                </h5>
            </div>
            <div class="col-md-4">
                <p>Time & Price</p>
                <h5>
                    <?php
                    echo $order_data[0]['time'].' HKD-'.$order_data[0]['price'];
                    ?>
                </h5>
            </div>
            <div class="col-md-4">
                <p>Seat(s)</p>
                <h5>
                    <?php
                    echo $order_data[0]['seat_number'];
                    ?>
                </h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6 text-center">
                <p>Occasion</p>
                <h5>
                    <?php
                    echo $order_data[0]['occasion'];
                    ?>
                </h5>
            </div>
            <div class="col-md-6 text-center">
                <p>Allergies</p>
                <h5>
                    <?php
                    echo $order_data[0]['alergies'];
                    ?>
                </h5>
            </div>
        </div>
    </div>
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

</body>
</html>
