<?php require_once('session.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Order Details - Restaurants</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <?php require_once('includes/css.php') ?>
</head>
<body>

<!--*******************
    Preloader start
********************-->
<?php require_once('includes/preloader.php') ?>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <?php require_once('includes/logoDetails.php') ?>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <?php require_once('includes/header.php') ?>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <?php require_once('includes/sidebar.php') ?>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if (!isset($_GET['order_id'])) {
                                header('location:Dashboard');
                            }
                            $order_data = $db_handle->runQuery("SELECT * FROM `order_detail` where id='{$_GET['order_id']}'");
                            ?>
                            <div class="card">
                                <div class="card-header"> Order Details
                                    <strong>
                                        <?php
                                        echo $order_data[0]['updated_at'];
                                        ?>
                                    </strong>
                                    <span class="float-right">
                                        <strong>Status:</strong>
                                        <?php
                                        if ($order_data[0]["status"] == 0) {
                                            ?>
                                            Pending
                                            <?php
                                        } else if ($order_data[0]["status"] == 1) {
                                            ?>
                                            Approve
                                            <?php
                                        } else if ($order_data[0]["status"] == 2) {
                                            ?>
                                            Decline
                                            <?php
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-5">
                                        <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div>
                                                <strong>
                                                    <?php
                                                    echo $order_data[0]['name'];
                                                    ?>
                                                </strong>
                                            </div>
                                            <div>
                                                <strong>Email: </strong>
                                                <?php
                                                echo $order_data[0]['email'];
                                                ?>
                                            </div>
                                            <div>
                                                <strong>Restaurant: </strong>
                                                <?php
                                                echo $order_data[0]['restaurant'];
                                                ?>
                                            </div>
                                            <div>
                                                <strong>Phone: </strong>
                                                <?php
                                                echo $order_data[0]['number'];
                                                ?>
                                            </div>
                                            <div>
                                                <strong>Occasion: </strong>
                                                <?php
                                                echo $order_data[0]['occasion'];
                                                ?>
                                            </div>
                                            <div>
                                                <strong>Allergies: </strong>
                                                <?php
                                                echo $order_data[0]['alergies'];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                            <div class="row align-items-center">
                                                <div class="col-lg-12 mt-3">
                                                    <?php
                                                    $url = $_SERVER['SERVER_NAME'] . '/Order-Detail?code=' . $order_data[0]['code'];
                                                    ?>
                                                    <img src='https://chart.googleapis.com/chart?chof=.svg&choe=UTF-8&cht=qr&chs=250x250&chl=<?php echo $url; ?>'
                                                         class="img-fluid"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Food</th>
                                                <th>Date</th>
                                                <th class="right">Time</th>
                                                <th class="center">Seat Numbers</th>
                                                <th class="right">Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="center">1</td>
                                                <td class="left strong">
                                                    <?php
                                                    echo $order_data[0]['food'];
                                                    ?>
                                                </td>
                                                <td class="left">
                                                    <?php
                                                    echo $order_data[0]['date'];
                                                    ?>
                                                </td>
                                                <td class="right">
                                                    <?php
                                                    echo $order_data[0]['time'];
                                                    ?>
                                                </td>
                                                <td class="center">
                                                    <?php
                                                    echo $order_data[0]['seat_number'];
                                                    ?>
                                                </td>
                                                <td class="right">
                                                    <?php
                                                    echo 'HKD' . $order_data[0]['price'];
                                                    ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <!--**********************************
        Footer start
    ***********************************-->
    <?php require_once('includes/footer.php') ?>
    <!--**********************************
        Footer end
    ***********************************-->

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<?php require_once('includes/js.php') ?>
</body>
</html>
