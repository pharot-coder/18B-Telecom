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

            <div class="container">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Category</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Add Category</h5>
                        <hr>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data"
                                action="<?php echo base_url(); ?>admin/Category_Con/InsertData">
                                <div class="form-group">
                                    <label class="control-label" for="name"><strong>Category
                                            Name:</strong></label>
                                    <input type="text" name="categoryname" class="form-control" id="categoryname"
                                        placeholder="Enter Category Name">
                                    <?php
                                    echo form_error('categoryname', "<div style='color: red'>", "</div>");
                                    ?>
                                </div>
                                <div class="form-group text-center">
                                    <a href="<?php echo base_url('admin/Category_Con') ?>" class="btn btn-light"><i
                                            class="fa fa-arrow-circle-left"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">​​ Save ​</button>
                                </div>
                            </form>
                        </div>

                        <?php if (isset($msg)) {
                            echo "
  <div class='alert alert-success text-center'>
    $msg
  </div>
  ";
                        }
                        unset($msg);
                        ?>
                    </div>

                </div>
            </div>
        </div>


        <?php include("includes/scripts.php"); ?>
</body>

</html>