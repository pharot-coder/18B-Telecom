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
                        <a href="#">Invoice</a>
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
                <?php } elseif ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger mt-2" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>
                <!-- Icon Cards-->
                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Invoice Data View
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Invoice No</th>
                                        <th>Invoice Date</th>
                                        <th>Order No</th>
                                        <th>Customer Name</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Invoice No</th>
                                        <th>Invoice Date</th>
                                        <th>Order No</th>
                                        <th>Customer Name</th>
                                        <th>Tools</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    if (count($dataInvoice)) :
                                        $cnt = 1;
                                        foreach ($dataInvoice as $row) :

                                    ?>
                                    <tr>

                                        <td><?php echo $cnt ?></td>
                                        <td><?php echo date('d-M-Y', strtotime($row->date)) ?></td>
                                        <td><?php echo $row->orderid ?></td>
                                        <td><?php echo $row->customername ?></td>
                                        <td>
                                            <a href="" data-id="<?php echo $row->invoiceid ?>"
                                                class="btn btn-warning  btn-sm text-white viewInvoice"> <i
                                                    class="fa fa-eye"></i> View
                                            </a>
                                            |
                                            <a onclick="window.open('<?php echo base_url('invoice/print_invoice/' . $row->invoiceid . '') ?>')"
                                                href="#" class="btn btn-primary  btn-sm"> <i class="fa fa-print"></i>
                                                Print </a>
                                            |
                                            <a href="#remove" data-id="<?php echo $row->invoiceid ?>"
                                                class="btn btn-danger btn-sm remove"> <i class="fa fa-trash"></i>
                                                Remove
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
            </div>
            <!-- /.container-fluid -->
            <?php include('includes/invoice_modal.php') ?>
            <!-- Sticky Footer -->
            <?php include APPPATH . 'views/admin/includes/footer.php'; ?>

            <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <?php include("includes/supplier_modal.php");
        include("includes/scripts.php");
        ?>
        <script>
        $(document).ready(function() {

            $('.remove').click(function(e) {
                e.preventDefault();
                $('#deleteModal').modal('show');
                var invoiceid = $(this).data('id');
                getRow(invoiceid);
            });

            $('.viewInvoice').click(function(e) {
                e.preventDefault();
                $('#viewInvoiceModal').modal('show');
                var invoiceid = $(this).data('id');
                getDetailRow(invoiceid);
                getRow(invoiceid);
            });

        });

        function getDetailRow(invoiceid) {
            $.ajax({
                url: '<?php echo base_url() ?>admin/C_invoice/getDetailRow',
                method: 'get',
                dataType: 'JSON',
                data: {
                    invoiceid: invoiceid
                },
                success: function(data) {
                    $('#invoiceDeatil').html(data.detail);
                    $('#grandtotal').html(data.total);
                }
            });
        }

        function getRow(invoiceid) {
            $.ajax({
                url: '<?php echo base_url() ?>admin/C_invoice/getRow',
                method: 'GET',
                dataType: 'JSON',
                data: {
                    invoiceid: invoiceid
                },
                success: function(data) {
                    $('#customername').html(data.customername);
                    $('#orderdate').html(data.order_date);
                    $('.invoiceid').html(data.invoiceid);
                    $('#invoicedate').html(data.invoice_date);
                    $('#orderdate').html(data.order_date);
                    $('.invoiceid').val(data.invoiceid);
                    $('#orderid').html(data.orderid);
                }
            });
        }
        </script>

</body>

</html>