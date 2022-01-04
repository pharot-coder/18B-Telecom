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

    <style>
    .product-image-gallery-item {
        display: inline-block;
        width: 70px;
        height: 70px;
        margin: 5px;
    }
    </style>

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
                        <a href="#">Edit Photo</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
            </div>

            <div class="container-fluid mb-4">

                <!---- Success Message ---->
                <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success mt-2" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                <!---- Error Message ---->
                <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger mt-2" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>

                <?php
                foreach ($imgdata as $row) {
                    $image = (empty($row->images)) ? '' . base_url('../assets/img/no-img.png') . '' : '' . base_url('../assets/img/' . $row->images) . '';
                    $productid = $row->productid;
                }
                ?>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header"> Product Photo</div>
                            <a href="<?php echo $image ?>">
                                <img src="<?php echo $image; ?>" class="img-fluid z-depth-1" alt="Responsive image">
                            </a>

                            <a href="#edit" id="edit" data-id="<?php echo $productid ?>" class="mt-4 mb-4 edit">
                                Click
                                here to edit photo </a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-header"> Product Gallery</div>
                            <div class="card-body">
                                <?php
                                if (count($imgGalleryData) > 0) {
                                    foreach ($imgGalleryData as $rowImg) {
                                        echo ' <div class="product-image-gallery-item">
                                        <a href="' . base_url('../assets/img/' . $rowImg->images . '') . '">
                                            <img src="' . base_url('../assets/img/' . $rowImg->images . '') . '" class="img-fluid z-depth-1"
                                                alt="e">
                                        </a>
                                    </div>
                                    ';
                                    }
                                    echo '<p class="mt-4 mb-4"><a href="#remove" id="delphotogallery"> Click here to remove all
                                    photos
                                </a></p>';
                                } else {
                                    echo ' <p> No product photo <p> ';
                                }
                                ?>
                                <a href="#upload" id="upload" class="btn btn-success"> Upload Photos </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <?php include APPPATH . 'views/admin/includes/footer.php'; ?>

        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include("includes/edit_productphoto_modal.php");
    include("includes/scripts.php");
    ?>
    <script type="text/javascript">
    // MDB Lightbox Init
    $(function() {
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");

        $('#edit').click(function() {
            var productid = $(this).attr('data-id');
            $('#editphoto').modal('show');
            $('productid').val(productid);
        });

        $('#delphotogallery').click(function() {
            $('#deletePhotoGalModal').modal('show');
        });

        $('#upload').click(function() {
            $('#editphotogallery').modal('show');
        });
    });
    </script>
</body>

</html>