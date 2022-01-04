<!DOCTYPE html>
<html lang="en">

<head>

    <title>Admin - Dashboard</title>
    <!-- Bootstrap core CSS-->
    <?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
    <!-- Custom fonts for this template-->
    <?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
    <!-- Page level plugin CSS-->
    <?php echo link_tag('assests/vendor/datatables/dataTables.bootstrap4.css'); ?>
    <!-- Custom styles for this template-->
    <?php echo link_tag('assests/css/sb-admin.css'); ?>

</head>

<body id="page-top">
    <?php include APPPATH . 'views/admin/includes/header.php'; ?>

    <div id="wrapper">
        <!-- Sidebar -->
        <?php include APPPATH . 'views/admin/includes/sidebar.php'; ?>
        <div id="content-wrapper">

            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Add User</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
            </div>

            <div class="container-fluid">
                <div class="mt-2"></div>
                <!-- Icon Cards-->
                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="text-center">
                            <h5> <i class="fas fa-users"></i> Add New Customer </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="useradd-form">
                            <?php echo form_open('admin/C_Customer/addData', ['class' => 'post']) ?>
                            <div class="form-row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="fname"> First-Name: </label>
                                        <input type="text" class="form-control" name="first_name"
                                            placeholder="Enter First Name">
                                        <?php echo form_error('first_name', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="fname"> Last-Name: </label>
                                        <input type="text" class="form-control" name="last_name"
                                            placeholder="Enter Last Name">
                                        <?php echo form_error('last_name', '<div class="error text-danger">', '</div>'); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="fname"> User-Name: </label>
                                        <input type="text" class="form-control" name="username"
                                            placeholder="Enter User Name">
                                        <?php echo form_error('username', '<div class="error text-danger">', '</div>'); ?>

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="fname"> Email: </label>
                                        <input type="text" class="form-control" name="email" placeholder="Enter Email">
                                        <?php echo form_error('email', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="fname"> Phone Number: </label>
                                        <input type="text" class="form-control" name="phonenumber"
                                            placeholder="Enter Phone Number">
                                        <?php echo form_error('phonenumber', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="password"> Password: </label>
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Enter Password">
                                        <?php echo form_error('password', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <textarea name="address" class="form-control" rows="5"
                                            placeholder="Enter Address"></textarea>
                                        <?php echo form_error('address', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <a type="button" href="<?php echo base_url('customer'); ?>"
                                        class="btn btn-default btn-rounded">Close</a>
                                    <?php echo form_submit(['name' => 'save', 'class' => 'btn btn-primary', 'value' => 'Save']) ?>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <?php include APPPATH . 'views/admin/includes/footer.php'; ?>
                <div class="row">
                    <?php

                    ?>
                </div>
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <?php
        include("includes/scripts.php");
        ?>

</body>

</html>
<script type="text/javascript">
$(function() {
    $('#useraddform').on('submit', function(e) {
        e.preventDefault();
        var usertype = $('#usertype').val();
        alert(usertype);
    })
});
</script>