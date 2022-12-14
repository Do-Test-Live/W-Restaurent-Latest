<?php require_once('session.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Products - Restaurants</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <?php require_once('includes/css.php') ?>
    <style>
        .bootstrap-tagsinput {
            width: 100% !important;
        }
    </style>
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
                        if (isset($_GET['product-id'])) {
                            ?>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Product</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <form action="Update" method="post" enctype="multipart/form-data">
                                                <?php
                                                $data = $db_handle->runQuery("SELECT * FROM product where id={$_GET['product-id']}");
                                                ?>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="hidden" value="<?php echo $data[0]['id'] ?>" name="id"/>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Restaurant Name</label>
                                                                <div class="dropdown bootstrap-select form-control default-select">
                                                                    <select id="inputState" class="form-control default-select"
                                                                            name="restaurant-id" required>
                                                                        <option selected>Choose...</option>
                                                                        <?php
                                                                        $restaurant_data = $db_handle->runQuery("SELECT * FROM restaurant order by id desc");
                                                                        $row_count = $db_handle->numRows("SELECT * FROM restaurant order by id desc");

                                                                        for ($i = 0; $i < $row_count; $i++) {
                                                                            ?>
                                                                            <option value="<?php echo $restaurant_data[$i]["id"]; ?>" <?php echo ($data[0]["restaurant_id"] == $restaurant_data[$i]["id"]) ? "selected" : ""; ?>><?php echo $restaurant_data[$i]["name"]; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Product Name</label>
                                                                <input type="text" class="form-control" name="name"
                                                                       placeholder="Product Name" value="<?php echo $data[0]['p_name'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Availability Time</label>
                                                                <div>
                                                                    <input type="text" class="form-control" name="time"
                                                                           value="<?php echo $data[0]['time'] ?>" data-role="tagsinput"
                                                                           placeholder="10:00 AM" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Product Price</label>
                                                                <div>
                                                                    <input type="text" class="form-control" name="price"
                                                                           placeholder="5.99"
                                                                           value="<?php echo $data[0]['price'] ?>" data-role="tagsinput" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Product Discount</label>
                                                                <input type="text" class="form-control" name="discount"
                                                                       placeholder="Product Discount" value="<?php echo $data[0]['discount'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label>Product Description</label>
                                                                <textarea class="form-control" placeholder="Product Description"
                                                                          name="description" required rows="5"><?php echo $data[0]['description'] ?></textarea>
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
                                                                <label>Product Image</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="image">
                                                                    <label class="custom-file-label">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 d-flex justify-content-end align-items-end">
                                                        <img src="../<?php echo $data[0]["image"]; ?>" style="height: 300px" class="img-fluid" alt=""/>
                                                    </div>
                                                </div>
                                                <button type="submit" name="product-edit" class="btn btn-primary">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Product List</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="display min-w850">
                                                <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Restaurant</th>
                                                    <th>Time</th>
                                                    <th>Discount</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th>Availability</th>
                                                    <th>Updated AT</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $product_data = $db_handle->runQuery("SELECT * FROM product as p, restaurant as r where r.id=p.restaurant_id order by p.id desc");
                                                $row_count = $db_handle->numRows("SELECT * FROM product as p, restaurant as r where r.id=p.restaurant_id order by p.id desc");

                                                for ($i = 0; $i < $row_count; $i++) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i + 1; ?></td>
                                                        <td>
                                                            <?php echo $product_data[$i]["p_name"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $product_data[$i]["name"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php $sb = explode(',', $product_data[$i]["time"]);
                                                            foreach ($sb as $bb) {
                                                                if ($bb == '') {
                                                                    echo '';
                                                                } else {
                                                                    echo $bb . '<br/>';
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $product_data[$i]["discount"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php $sb = explode(',', $product_data[$i]["price"]);
                                                            foreach ($sb as $bb) {
                                                                if ($bb == '') {
                                                                    echo '';
                                                                } else {
                                                                    echo $bb . '<br/>';
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="../<?php echo $product_data[$i]["image"]; ?>"
                                                               target="_blank">
                                                                product_image
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php echo $product_data[$i]["description"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($product_data[$i]["status"] == 0) {
                                                                ?>
                                                                <span class="badge light badge-danger">Not Available</span>
                                                                <?php
                                                            } else if ($product_data[$i]["status"] == 1) {
                                                                ?>
                                                                <span class="badge light badge-success">Available</span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $datetime = new DateTime($product_data[$i]["updated_at"]);
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
                                                                    <a class="dropdown-item"
                                                                       href="Products?product-id=<?php echo $product_data[$i]["id"]; ?>">Edit</a>
                                                                    <a class="dropdown-item"
                                                                       onclick="productDelete(<?php echo $product_data[$i]["id"]; ?>);">Delete</a>
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
                        <?php }
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
    function productDelete(id) {
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
                        product_id: id
                    },
                    success: function (data) {
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        ).then((result) => {
                            window.location = 'Products';
                        });
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your Product is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'Products';
                });
            }
        })
    }
</script>
</body>
</html>
