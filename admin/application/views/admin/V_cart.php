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
                        <a href="#">Cart</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
            </div>
            <!---- Success Message ---->
            <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success mt-2" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        </div>
        <?php } ?>
        <!---- Error Message ---->
        <?php if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger mt-2" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    </div>
    <?php } ?>

    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-shopping-cart"></i>
                Cart Detail
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Product Name </th>
                                <th>Photo</th>
                                <th> Price </th>
                                <th> QTY </th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th> Product Name </th>
                                <th>Photo</th>
                                <th> Price </th>
                                <th> QTY </th>
                                <th>Tools</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                        if (count($cartdata)) :
                            $cnt = 1;
                            foreach ($cartdata as $row) :
                        ?>
                            <tr>
                                <td><?php echo htmlentities($cnt); ?></td>
                                <td><?php echo $row->productname ?></td>
                                <td>
                                    <?php
                                        if (empty($row->images)) {
                                            echo '
                                        <img src=" ' . base_url('../assets/img/no_user_profile.jpg') . '" class="img-reponsive"
                                        width="60px" height="60px">
                                        ';
                                        } else {
                                            echo '
                                        <img src=" ' . base_url('../assets/img/' . $row->images) . '"
                                        class="img-responsive" width="60px" height="60px" alt="">
                                        ';
                                        }
                                        ?>
                                </td>
                                <td> &#36; <?php echo number_format($row->price, 2) ?></td>
                                <td><?php echo $row->qty ?></td>
                                <td><a href="#editcart" data-toggle="tooltip" data-placement="top" title="Edit Quantity"
                                        class="edit" data-id="<?php echo $row->cart_id ?>"><i class="fa fa-edit"></i>
                                    </a>
                                </td>
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
    <?php include("includes/cart_modal.php"); ?>
    <?php include("includes/scripts.php"); ?>

</body>

</html>
<script type="text/javascript">
$(function() {
    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        $('#updateqtymodal').modal('show');
        var cart_id = $(this).attr('data-id');
        getRow(cart_id);
    });

});

function getRow(cart_id) {
    $.ajax({
        url: "<?php echo base_url(); ?>admin/Cart_Con/FetchRow",
        dataType: "JSON",
        method: "POST",
        data: {
            cart_id: cart_id
        },
        success: function(response) {
            $('#qty').val(response.qty);
            $('.cart_id').val(response.cart_id);
        }
    });
}
</script>