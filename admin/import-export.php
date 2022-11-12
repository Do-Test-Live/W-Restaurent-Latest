<?php require_once ('includes/session.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Import Export Order Details - Restaurants</title>
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
                                    <h4 class="card-title">Export Order Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="Update" method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Start Date</label>
                                                    <input type="date" class="form-control" name="s_date" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>End Date</label>
                                                    <input type="date" class="form-control" name="e_date" required>
                                                </div>
                                            </div>
                                            <button type="submit" name="export-data" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Import Order Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="Insert" method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <label>Import CSV File</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="order_details" accept=".csv" required/>
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="form-row mt-3">
                                                <div class="form-group col-md-12">
                                                    <button type="submit" name="import-data" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Report</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                            <div class="form-row mt-3">
                                                <div class="form-group col-6">
                                                    <a href="report.php?dailyReport=1" class="btn btn-primary">Daily Report</a>
                                                </div>

                                                <div class="form-group col-6">
                                                    <a href="report.php?monthlyReport=1" class="btn btn-primary">Monthly Report</a>
                                                </div>
                                            </div>
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
