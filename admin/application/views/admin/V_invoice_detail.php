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
                        <a href="#"> Create Invoice </a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
                <!---- Success Message ---->
                <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success mt-2" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            </div>
            <?php } elseif ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger mt-2" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php } ?>
        </div>

        <div class="container-fluid">
            <?php echo form_open('admin/C_invoice/storeInvoice', ['class' => 'mt-2', 'method' => 'POST', 'id' => 'invoice_form']) ?>

            <div class="text-center mt-4 mb-4">
                <h4>
                    <i class="fas fa-file-invoice"></i>
                    Create Invoice
                </h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <img src="/assets/img/logo/Logo-18B-Telecom.png" height="50" width="200" alt="">
                        </div>
                        <div class="card-body">
                            <p> <i class="fa fa-map"></i> Address: ផ្ទះលេខ 51Eo ផ្លូវលេខ 432 សង្កាត់ទូលទំពូង ខណ្ឌចំការមន
                                រាជធានីភ្នំពេញ</p>
                            <p> <i class="fa fa-phone"></i> Phone Number: 012 / 016 / 081 26 17 18</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-header">
                            <h5> <i class="fas fa-file-invoice"></i>
                                Invoice To</h5>
                        </div>
                        <div class="card-body">
                            <?php foreach ($orderData as $row) { ?>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Customer Name:</span>
                                </div>
                                <input type="text" readonly class="form-control" value="<?php echo $row->username ?>">
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Payment Method:</span>
                                </div>
                                <input type="text" readonly class="form-control"
                                    value=" <?php echo $row->payment_method ?>">
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Order No:</span>
                                </div>
                                <input type="text" name="orderid" readonly class="form-control"
                                    value=" <?php echo $row->orderid ?>" id="orderid">
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Order Date:</span>
                                </div>
                                <input type="text" readonly class="form-control"
                                    value=" <?php echo $row->order_date ?>">
                            </div>
                            <?php   }  ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Icon Cards-->
            <!-- DataTables Example -->
            <div class="card mb-3 mt-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Order Detail
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th> Price </th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th> Price </th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php
                                if (count($detailorder) > 0) {
                                    $cnt = 0;
                                    $subtotal = 0;
                                    $total = 0;
                                    foreach ($detailorder as $row) :
                                        $subtotal = $row['qty'] * $row['price'];
                                        $total += $subtotal;
                                        $cnt++;

                                ?>
                                <tr>
                                    <td><input type="text" readonly class="form-control"
                                            value="<?php echo htmlentities($cnt); ?> "> </td>
                                    <td> <input type="text" class="form-control"
                                            value="<?php echo $row['productname'] ?>" readonly>
                                        <input type="hidden" class="form-control" name="product_id[]"
                                            value="<?php echo $row['productid'] ?>">
                                    </td>
                                    <td> <input type="text" name="price[]" id="price" class="form-control"
                                            value="<?php echo $row['price'] ?>" readonly> </td>
                                    <td> <input type="text" readonly name="quantity[]" value="<?php echo $row['qty'] ?>"
                                            class="form-control">
                                    </td>
                                    <td> <input type="text" class="form-control"
                                            value=" &#36; <?php echo number_format($subtotal, 2)  ?>" name="subtotal"
                                            id="subtotal" readonly> </td>

                                </tr>
                                <?php endforeach; ?>

                                <?php } else { ?>

                                <tr>
                                    <td colspan="6">No Record found</td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="text-right">
                        <h5 class="mt-4 mb-4"> Total: &#36;<?php echo number_format($total, 2) ?> </h5>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" id="close" type="button" class="btn btn-danger"> Close</a>
                    <?php echo form_submit(['class' => 'btn btn-success', 'value' => 'Save Invoice', 'name' => 'save']) ?>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include APPPATH . 'views/admin/includes/footer.php'; ?>

        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include("includes/scripts.php"); ?>

</body>

</html>