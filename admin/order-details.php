<?php require_once ('includes/session.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Order Details - Restaurants</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <?php require_once ('includes/css.php')?>
</head>
<body>

<!--*******************
    Preloader start
********************-->
<?php require_once ('includes/preloader.php')?>
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
    <?php require_once ('includes/logoDetails.php')?>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <?php require_once ('includes/header.php')?>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <?php require_once ('includes/sidebar.php')?>
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

                            <div class="card">
                                <div class="card-header"> Order Details <strong>01/01/01/2018</strong> <span class="float-right">
                                    <strong>Status:</strong> Pending</span> </div>
                                <div class="card-body">
                                    <div class="row mb-5">
                                        <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div><strong>Name</strong> </div>
                                            <div>Email: </div>
                                            <div>Phone:</div>
                                            <div>Occasion: </div>
                                            <div>Allergies:</div>
                                        </div>
                                        <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                            <div class="row align-items-center">
                                                <div class="col-lg-12 mt-3">
                                                    <img src="images/qr.png" class="img-fluid width110">
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
                                                <td class="left strong">Origin License</td>
                                                <td class="left">Extended License</td>
                                                <td class="right">$999,00</td>
                                                <td class="center">1</td>
                                                <td class="right">$999,00</td>
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
    <?php require_once ('includes/footer.php')?>
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
<?php require_once ('includes/js.php')?>
</body>
</html>
