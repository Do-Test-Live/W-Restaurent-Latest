<?php require_once('session.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard - Add Admin</title>
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
                                    <h4 class="card-title">Add Admin</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="Insert" method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Admin Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                           placeholder="Name" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                           placeholder="abc@abc.com" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                           placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Role</label>
                                                    <div class="dropdown bootstrap-select form-control default-select">
                                                        <select id="inputState" class="form-control default-select"
                                                                name="role" required>
                                                            <option selected>Choose...</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="sales">Sales</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" name="admin-add" class="btn btn-primary">
                                                Submit
                                            </button>
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
