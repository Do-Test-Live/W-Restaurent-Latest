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

    <title>Booking - Restaurant</title>
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
    <form action="Reservation" method="get">
        <div class="row mb-5">
            <div class="col-12 mt-3">
                <label class="form-label">Seat(s)</label>
                <select class="form-select" aria-label="Default select example" name="seat_number" required>
                    <option selected>Choose..</option>
                    <?php
                    for ($i = 1; $i < 21; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i . ' Seat(s)' ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Date</label>
                <input type="text" class="form-control form-home" data-language='en'
                       data-date-format="dd - mm - yyyy" placeholder="Today" name="date"
                       min="<?php echo date("Y-m-d"); ?>" onfocus="(this.type = 'date')" id="date" required/>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Restaurant</label>
                <select class="form-select" name="restaurant" id="restaurant" onchange="setProduct(this.value);"
                        required>
                    <option value="">Choose..</option>
                    <?php
                    $order_data = $db_handle->runQuery("SELECT * FROM `restaurant` where status='1'");
                    $row = $db_handle->numRows("SELECT * FROM `restaurant` where status='1'");
                    for ($i = 0; $i < $row; $i++) {
                        ?>
                        <option value="<?php echo $order_data[$i]['id']; ?>"><?php echo $order_data[$i]['name']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Product</label>
                <select class="form-select" name="food_name" id="food" onchange="setFoodPrice(this.value);" required>
                    <option value="" disabled>Select Date and Restaurant First</option>
                </select>
            </div>
            <div class="col-12 mt-3">
                <label class="form-label">Time & Price</label>
                <select class="form-select" name="price" id="price" required>
                    <option value="" disabled>Select Date, Restaurant and Product First</option>
                </select>
            </div>
            <div class="col-12 mt-3 d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-primary btn-lg custom-button">Submit</button>
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

<!-- JQuery JS -->
<script src="assets/vendors/jquery/jquery.min.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>
<script>
    function setFoodPrice(value) {
        let date = $('#date').val();

        $.ajax({
            type: 'post',
            url: 'Get-Product-Price-And-Time',
            data: {
                product_id: value, date: date
            },
            success: function (data) {
                $('#price').html(data);
            }
        });
    }

    function setProduct(value) {
        $.ajax({
            type: 'post',
            url: 'Get-Restaurant',
            data: {
                restaurant_id: value
            },
            success: function (data) {
                $('#food').html(data);
            }
        });
    }
</script>
</body>
</html>
