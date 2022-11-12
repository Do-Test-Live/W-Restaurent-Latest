<?php require_once('includes/session.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Restaurants - Restaurants</title>
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
                        <?php
                        if (isset($_GET['restaurant-id'])) {
                            ?>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Restaurant</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <form action="Update" method="post" enctype="multipart/form-data">
                                                <?php
                                                $data = $db_handle->runQuery("SELECT * FROM restaurant where id={$_GET['restaurant-id']}");
                                                ?>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="hidden" value="<?php echo $data[0]['id'] ?>" name="id"/>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Restaurant Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                       placeholder="Restaurant Name" value="<?php echo $data[0]['name'] ?>" required/>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Status</label>
                                                                <div class="dropdown bootstrap-select form-control default-select">
                                                                    <select id="inputState" class="form-control default-select"
                                                                            name="status" required>
                                                                        <option>Choose...</option>
                                                                        <option value="1" <?php echo ($data[0]["status"] == 1) ? "selected" : ""; ?>>Available</option>
                                                                        <option value="0" <?php echo ($data[0]["status"] == 0) ? "selected" : ""; ?>>Not Available</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Contact Number</label>
                                                                <input type="text" class="form-control" name="contact_number"
                                                                       placeholder="Contact Number" value="<?php echo $data[0]['number'] ?>" required/>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Restaurant Image</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="image"/>
                                                                    <label class="custom-file-label">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Address</label>
                                                                <input type="text" class="form-control" name="address"
                                                                       placeholder="Address" value="<?php echo $data[0]['address'] ?>" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 d-flex justify-content-end align-items-end">
                                                        <img src="../<?php echo $data[0]["image"]; ?>" style="height: 300px" class="img-fluid" alt=""/>
                                                    </div>
                                                </div>
                                                <button type="submit" name="restaurant-edit" class="btn btn-primary">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Restaurant List</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="display min-w850">
                                                <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Image</th>
                                                    <th>Address</th>
                                                    <th>Availability</th>
                                                    <th>Updated AT</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $restaurant_data = $db_handle->runQuery("SELECT * FROM restaurant order by id desc");
                                                $row_count = $db_handle->numRows("SELECT * FROM restaurant order by id desc");

                                                for ($i = 0; $i < $row_count; $i++) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i + 1; ?></td>
                                                        <td><?php echo $restaurant_data[$i]["name"]; ?></td>
                                                        <td><?php echo $restaurant_data[$i]["number"]; ?></td>
                                                        <td><a href="../<?php echo $restaurant_data[$i]["image"]; ?>"
                                                               target="_blank">restaurant_image</a></td>
                                                        <td><?php echo $restaurant_data[$i]["address"]; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($restaurant_data[$i]["status"] == 0) {
                                                                ?>
                                                                <span class="badge light badge-danger">Not Available</span>
                                                                <?php
                                                            } else if ($restaurant_data[$i]["status"] == 1) {
                                                                ?>
                                                                <span class="badge light badge-success">Available</span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $datetime = new DateTime($restaurant_data[$i]["updated_at"]);
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
                                                                            <rect x="0" y="0" width="24"
                                                                                  height="24"></rect>
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
                                                                    <a class="dropdown-item" href="Restaurants?restaurant-id=<?php echo $restaurant_data[$i]["id"]; ?>">Edit</a>
                                                                    <a class="dropdown-item" onclick="restaurantDelete(<?php echo $restaurant_data[$i]["id"]; ?>);">Delete</a>
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
                            <?php
                        }
                        ?>
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
<script>
    function restaurantDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: 'Delete',
                    data: {
                        restaurant_id: id
                    },
                    success: function (data) {
                        if (data.toString() === 'P') {
                            Swal.fire(
                                'Not Deleted!',
                                'Your have product in this restaurants.',
                                'error'
                            ).then((result) => {
                                window.location = 'Restaurants';
                            });
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location = 'Restaurants';
                            });
                        }
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your Restaurant is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'Restaurants';
                });
            }
        })
    }
</script>
</body>
</html>
