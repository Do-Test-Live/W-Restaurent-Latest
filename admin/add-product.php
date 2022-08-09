<?php require_once ('includes/session.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Add Product - Restaurants</title>
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
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Product</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Restaurant Name</label>
                                                    <div class="dropdown bootstrap-select form-control default-select">
                                                        <select id="inputState" class="form-control default-select" required>
                                                            <option selected>Choose...</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Product Name</label>
                                                    <input type="text" class="form-control" placeholder="Product Name" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Product Price</label>
                                                    <input type="text" class="form-control" placeholder="Product Price" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Product Description</label>
                                                    <textarea class="form-control" placeholder="Product Description" required rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Product Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
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
