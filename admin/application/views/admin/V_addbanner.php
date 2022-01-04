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
                        <a href="#">Add Banner</a>
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
                            <h5> <i class="fas fa-list"></i> New Slide Banner </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="useradd-form">
                            <?php
                            $arr_form = array('method' => 'post', 'enctype' => 'multipart/form-data');
                            echo form_open('admin/C_banner/addData', $arr_form); ?>

                            <div class="form-row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="photo"> Banner Photo: </label>
                                        <input type="file" class="form-control" name="photo">
                                        <?php echo form_error('photo', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <a type="button" href="<?php echo base_url('banner'); ?>"
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
    })
});
</script>