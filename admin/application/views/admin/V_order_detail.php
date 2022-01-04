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
                        <a href="#">Order Detail</a>
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

        <div class="container">

            <!-- Icon Cards-->
            <!-- DataTables Example -->
            <div class="card mb-3">
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
                                    <th>Photo</th>
                                    <th> Price </th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Photo</th>
                                    <th> Price </th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                                if (count($detailorder) > 0) {
                                    $cnt = 1;
                                    $subtotal = 0;
                                    $total = 0;
                                    foreach ($detailorder as $row) {
                                        $subtotal = $row['qty'] * $row['price'];
                                        $total += $subtotal;
                                ?>

                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td><?php echo $row['productname'] ?></td>
                                    <td>
                                        <?php
                                                if (empty($row['images'])) {
                                                    echo '
                                        <img src=" ' . base_url('../assets/img/no_user_profile.jpg') . '" class="img-reponsive"
                                        width="50px" height="50px">
                                        ';
                                                } else {
                                                    echo '
                                        <img src=" ' . base_url('../assets/img/' . $row['images']) . '"
                                        class="img-responsive" width="50px" height="50px" alt="">
                                        ';
                                                }
                                                ?>
                                    </td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['qty'] ?></td>
                                    <td> &#36; <?php echo number_format($subtotal, 2)  ?></td>

                                </tr>
                                <?php } ?>

                                <?php } else { ?>

                                <tr>
                                    <td colspan="6">No Record found</td>
                                </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="text-right">
                        <h5 class="mt-4 mb-4"> <b>Total: &#36;</b> <b> <?php echo number_format($total, 2) ?> </b> </h5>
                    </div>
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

    <?php
    include("includes/scripts.php");
    ?>
    <script>

    </script>

</body>

</html>