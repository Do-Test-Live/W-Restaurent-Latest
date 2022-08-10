<?php require_once('includes/session.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admins - Restaurants</title>
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
                        if (isset($_GET['admin-id'])) {
                            ?>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Admin</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <form action="Update" method="post" enctype="multipart/form-data">
                                                <?php
                                                $data = $db_handle->runQuery("SELECT * FROM admin_login where id={$_GET['admin-id']}");
                                                ?>
                                                <input type="hidden" value="<?php echo $data[0]['id'] ?>" name="id"/>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>Admin Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                               placeholder="Name" value="<?php echo $data[0]["name"]; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                               placeholder="abc@abc.com" value="<?php echo $data[0]["email"]; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" name="password"
                                                               placeholder="Password" value="<?php echo $data[0]["password"]; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label>Role</label>
                                                        <div class="dropdown bootstrap-select form-control default-select">
                                                            <select id="inputState" class="form-control default-select"
                                                                    name="role" required>
                                                                <option selected>Choose...</option>
                                                                <option value="admin" <?php echo ($data[0]["role"] == 'admin') ? "selected" : ""; ?>>Admin</option>
                                                                <option value="sales" <?php echo ($data[0]["role"] == 'sales') ? "selected" : ""; ?>>Sales</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" name="admin-edit" class="btn btn-primary">
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
                                        <h4 class="card-title">Admin List</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="display min-w850">
                                                <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Updated AT</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $admin_data = $db_handle->runQuery("SELECT * FROM admin_login order by id desc");
                                                $row_count = $db_handle->numRows("SELECT * FROM admin_login order by id desc");

                                                for ($i = 0; $i < $row_count; $i++) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i + 1; ?></td>
                                                        <td>
                                                            <?php echo $admin_data[$i]["name"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $admin_data[$i]["email"]; ?>
                                                        </td>
                                                        <td style="text-transform: capitalize">
                                                            <?php echo $admin_data[$i]["role"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            $datetime = new DateTime($admin_data[$i]["updated_at"]);
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
                                                                       href="Admins?admin-id=<?php echo $admin_data[$i]["id"]; ?>">Edit</a>
                                                                    <?php if ($_SESSION['user_id'] != $admin_data[$i]["id"]) { ?>
                                                                        <a class="dropdown-item"
                                                                           onclick="adminDelete(<?php echo $admin_data[$i]["id"]; ?>);">Delete</a>
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
                        <?php } ?>
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
    function adminDelete(id) {
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
                        admin_id: id
                    },
                    success: function (data) {
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        ).then((result) => {
                            window.location = 'Admins';
                        });
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your admin is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'Admins';
                });
            }
        })
    }
</script>
</body>
</html>
