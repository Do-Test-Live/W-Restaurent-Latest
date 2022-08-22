<?php require_once ('includes/session.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard - Restaurants</title>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Orders List</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="display min-w850">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Food</th>
                                                <th>Number</th>
                                                <th>Email</th>
                                                <th>Price</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Updated AT</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $order_data = $db_handle->runQuery("SELECT * FROM order_detail order by id desc");
                                            $row_count = $db_handle->numRows("SELECT * FROM order_detail order by id desc");

                                            for ($i = 0; $i < $row_count; $i++) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $i+1; ?></td>
                                                    <td><?php echo $order_data[$i]["name"]; ?></td>
                                                    <td><?php echo $order_data[$i]["food"]; ?></td>
                                                    <td><?php echo $order_data[$i]["number"]; ?></td>
                                                    <td><?php echo $order_data[$i]["email"]; ?></td>
                                                    <td><?php echo $order_data[$i]["price"]; ?></td>
                                                    <td><?php echo $order_data[$i]["time"]; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($order_data[$i]["status"] == 0) {
                                                            ?>
                                                            <span class="badge light badge-info">Accept</span>
                                                            <?php
                                                        } else if ($order_data[$i]["status"] == 1) {
                                                            ?>
                                                            <span class="badge light badge-success">Accept</span>
                                                            <?php
                                                        } else if ($order_data[$i]["status"] == 2) {
                                                            ?>
                                                            <span class="badge light badge-success">Not Accept</span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php

                                                        $datetime = new DateTime($order_data[$i]["updated_at"]);
                                                        $la_time = new DateTimeZone('America/New_York');
                                                        $datetime->setTimezone($la_time);

                                                        echo $datetime->format('d/m/Y h:i A'); ?>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown ml-auto text-right">
                                                            <div class="btn-link" data-toggle="dropdown">
                                                                <svg width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                                        </circle>
                                                                        <circle fill="#000000" cx="12" cy="12"
                                                                                r="2"></circle>
                                                                        <circle fill="#000000" cx="19" cy="12"
                                                                                r="2"></circle>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="Order-Details?order_id=<?php echo $order_data[$i]["id"]; ?>">View</a>
                                                                <?php if ($order_data[$i]["status"] == '0') { ?>
                                                                    <a class="dropdown-item"
                                                                       href="Update?approve_order_id=<?php echo $order_data[$i]["id"]; ?>">Accept</a>
                                                                    <a class="dropdown-item"
                                                                       href="Update?decline_order_id=<?php echo $order_data[$i]["id"]; ?>">Not Accept</a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
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
