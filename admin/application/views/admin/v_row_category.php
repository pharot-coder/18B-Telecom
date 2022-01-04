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
                    <li class="breadcrumb-item active">Detail</li>
                </ol>

                <!-- Icon Cards-->
                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Category Details
                    </div>

                    <div class="card-body">
                        <div class="form">
                            <form method="post" action="<?php echo base_url(); ?>admin/Category_Con/UpdateCat">
                                <?php
                                foreach ($caterow as $key => $row) {
                                ?>
                                <div class="form-group">
                                    <label for="name"><strong>Category Name:</strong></label>
                                    <input type="text" class="form-control" name="categoryname" id="name"
                                        value="<?php echo $row->categoryname ?>">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="categoryid" id="categoryid"
                                        value="<?php echo $row->categoryid ?>">
                                </div>
                                <?php } ?>
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </form>
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

    <?php
    include("includes/scripts.php");
    ?>

</body>

</html>
<script type="text/javascript">
$(function() {

    $(document).on('click', '.desc', function(e) {
        $('#description').modal('show');
        e.preventDefault;
        var cityprovinceid = $(this).attr('data-id');
        getRow(cityprovinceid);
    });

    $(document).on('click', '.delete', function(e) {
        $('#DeleteModal').modal('show');
        e.preventDefault;
        var cityprovinceid = $(this).attr('data-id');
        getRow(cityprovinceid);
    });

});

function getRow(cityprovinceid) {
    $.ajax({
        url: "<?php echo base_url(); ?>City_Provinces/FetchRow",
        dataType: "JSON",
        method: "POST",
        data: {
            cityprovinceid: cityprovinceid
        },
        success: function(response) {
            $('.name').val(response.name);
            $('.desc').val(response.description);
            $('.cityprovinceid').val(response.cityprovinceid);
        }
    });
}
</script>