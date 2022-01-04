<!DOCTYPE html>
<html lang="en">

<head>

    <title>Sale - Dashboard</title>

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
    <?php include APPPATH . 'views/sale/includes/header.php'; ?>

    <div id="wrapper">
        <!-- Sidebar -->
        <?php include APPPATH . 'views/sale/includes/sidebar.php'; ?>
        <div id="content-wrapper">

            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Product</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
            </div>

            <div class="container-fluid">
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
            </div>
            <?php } ?>
            <!-- Icon Cards-->
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Product Details
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                            if (count($productData)) :
                                $cnt = 1;
                                foreach ($productData as $row) :
                                    $status = empty($row->status) ? '<span class="badge badge-danger"> Deactive </span>' : '<span class="badge badge-success"> Active </span>';
                            ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td><?php echo $row->productname ?></td>
                                    <td><a href="#description" id="desc" class="btn btn-primary description"
                                            data-id="<?php echo $row->productid ?>"> View </a></td>
                                    <td><?php echo $row->categoryname ?></td>
                                    <td><img src="<?php echo base_url('../assets/img/' . $row->images); ?>"
                                            class="img-responsive" width="50px" height="50px"
                                            alt=" <?php echo $row->productname ?>">
                                    </td>
                                    <td>&#36;<?php echo number_format($row->price, 2) ?></td>
                                    <td><?php echo $row->qty ?></td>
                                    <td> <?php echo $status ?> </td>
                                </tr>
                                <?php
                                    $cnt++;
                                endforeach;
                            else : ?>
                                <tr>
                                    <td colspan="6">No Record found</td>
                                </tr>
                                <?php
                            endif;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include APPPATH . 'views/sale/includes/footer.php'; ?>
        <?php include('includes/Product_Modal.php') ?>
    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include("includes/scripts.php");  ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.description').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#descriptionmodal').modal('show');
            getRow(id);
        });
    });

    function getRow(id) {
        $.ajax({
            url: '<?php echo base_url() ?>sale/getrow_product',
            method: 'GET',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data) {
                $('.desc').html(data.description);
                $('.name').html(data.productname);
            }
        });
    }
    </script>
</body>

</html>