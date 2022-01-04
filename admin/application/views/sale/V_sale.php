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
                        <a href="#">Sale Order</a>
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
                    <i class="fas fa-table"></i> Sale Order Details
                    <div class="d-flex justify-content-end">
                        <a href="<?php echo base_url('sale/add_new_sale_order') ?>" class="btn btn-primary"> <i
                                class="fas fa-plus"></i> New
                            Order</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="11%">Sale Date</th>
                                    <th>Phone</th>
                                    <th>Place</th>
                                    <th>Delevery</th>
                                    <th>Delivery Fee</th>
                                    <th>Income</th>
                                    <th>Cash In</th>
                                    <th>Remark</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Sale Date</th>
                                    <th>Phone</th>
                                    <th>Place</th>
                                    <th>Delevery</th>
                                    <th>Delivery Fee</th>
                                    <th>Income</th>
                                    <th>Cash In</th>
                                    <th>Remark</th>
                                    <th>Tools</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                            if (count($saleData)) :
                                $cnt = 1;
                                foreach ($saleData as $row) :
                            ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td><?php echo date('d-M-Y', strtotime($row->sale_date)) ?></td>
                                    <td><?php echo $row->phone_number ?></td>
                                    <td><a href="#" id="place" data-id="<?php echo $row->sale_orderid ?>"
                                            class="btn btn-primary btn-sm placeBtn"> View</a></td>
                                    <td><?php echo $row->delivery_type ?></td>
                                    <td>&#36; <?php echo $row->delivery_fee ?> </td>
                                    <td>&#36; <?php echo $row->income ?></td>
                                    <td><?php echo $row->cash_in ?></td>
                                    <td><?php echo $row->remark ?></td>
                                    <td>
                                        <a href="#view" data-id="<?php echo $row->sale_orderid ?>"
                                            class="fas fa-eye sale_detail"></a>
                                        |
                                        <a href="#"
                                            onclick="window.open('<?php echo base_url('sale/sale_order/create_invoice/' . $row->sale_orderid . '') ?>')"
                                            class="fas fa-print"></a>
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
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include APPPATH . 'views/sale/includes/footer.php'; ?>
        <?php include('includes/sale_order_modal.php') ?>
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

        $('.placeBtn').click(function(e) {
            e.preventDefault();
            var sale_id = $(this).data('id');
            $('#placeModal').modal('show');
            getRow(sale_id);
        });


        $('.sale_detail').click(function(e) {
            e.preventDefault();
            $('#sale_order_detail_modal').modal('show');
            var sale_id = $(this).data('id');
            getDetail(sale_id);
        });

    });


    function getDetail(sale_id) {
        $.ajax({
            url: '<?php echo base_url() ?>sale/C_sale_sale/getDetailSale',
            method: 'get',
            dataType: 'json',
            data: {
                sale_id: sale_id
            },
            success: function(data) {
                $('#sale_detailtbody').html(data.detail);
                $('.grandtotal').html(data.total);
            }
        });
    }


    function getRow(sale_id) {
        $.ajax({
            url: '<?php echo base_url() ?>sale/C_sale_sale/getRow',
            method: 'get',
            dataType: 'json',
            data: {
                sale_id: sale_id
            },
            success: function(data) {
                $('.place').html(data.place);
                $('.phone_number').html(data.phone_number);
            }
        });
    }
    </script>
</body>

</html>