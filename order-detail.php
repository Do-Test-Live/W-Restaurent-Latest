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
    <form action="Email" method="post">
        <div class="row mb-5">
            <div class="col-12 mt-3">
                <h2 class="text-center">BOOK A TABLE</h2>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Date</label>
                <h5>
                    <?php
                    if (!isset($_GET['date'])) {
                        header('location:Home');
                    }

                    if (isset($_GET['date'])) {
                        echo $_GET['date'];
                    }
                    ?>
                </h5>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Time & Price</label>
                <h5>
                    <?php
                    if (isset($_GET['price'])) {
                        echo $_GET['price'];
                    }
                    ?>
                </h5>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Seat(s)</label>
                <h5>
                    <?php
                    if (isset($_GET['seat_number'])) {
                        echo $_GET['seat_number'];
                    }
                    ?>
                </h5>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Restaurant Name</label>
                <h5>
                    <?php
                    if (isset($_GET['restaurant'])) {
                        $order_data = $db_handle->runQuery("SELECT * FROM `restaurant` where id={$_GET['restaurant']}");
                        echo $order_data[0]['name'];
                    }
                    ?>
                </h5>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Food Name</label>
                <h5>
                    <?php
                    if (isset($_GET['food_name'])) {
                        $order_data = $db_handle->runQuery("SELECT * FROM `product` where id={$_GET['food_name']}");
                        echo $order_data[0]['p_name'];
                    }
                    ?>
                </h5>
            </div>
            <input type="hidden" value="<?php echo $_GET['date']; ?>" name="date"/>
            <input type="hidden" value="<?php echo $_GET['price']; ?>" name="time"/>
            <input type="hidden" value="<?php echo $_GET['seat_number']; ?>" name="seat_number"/>
            <input type="hidden" name="restaurant" value="<?php
            $order_data = $db_handle->runQuery("SELECT * FROM `restaurant` where id={$_GET['restaurant']}");
            echo $order_data[0]['name'];
            ?>"/>
            <input type="hidden" name="food" value="<?php
            $order_data = $db_handle->runQuery("SELECT * FROM `product` where id={$_GET['food_name']}");
            echo $order_data[0]['p_name'];
            ?>"/>
            <div class="col-12 mt-3">
                <h2 class="text-center">Customer Information</h2>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Dinner Name</label>
                <input type="text" class="form-control"  name="name" required/>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="number" required/>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" required/>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Special Occasion</label>
                <textarea class="form-control" placeholder="Special Occasion" rows="5" name="occasion"></textarea>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Food Allergies</label>
                <textarea class="form-control" placeholder="Food Allergies" rows="5" name="alergies"></textarea>
            </div>
            <div class="col-12 mt-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg custom-button" name="submit">Book Now</button>
            </div>
        </div>
    </form>
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
