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
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-xl-4 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="mr-5"> <?php echo $sumBrand ?> Brands </div>
                            </div>

                            <a class="card-footer text-white clearfix small z-1"
                                href="<?php echo base_url('sale/brand'); ?>">
                                <span class="float-left">Total Brand</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-circle"></i>
                                </div>
                                <div class="mr-5"> <?php echo htmlentities($sumProduct) ?> Products</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href=" <?php echo base_url('sale/product') ?> ">
                                <span class="float-left"> Total Products</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5"> <?php echo htmlentities($sumCategory) ?> Categories</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href=" <?php echo base_url(('sale/category')) ?> ">
                                <span class="float-left"> Total Product Categories </span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="far fa-file-alt"></i>
                        Monthly Order Report <?php echo date('Y') ?>
                    </div>

                    <dciv class="card-body">
                        <canvas id="sale-barChart" height="100%"></canvas>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


        <?php
        $label = [];
        $data = [];
        foreach ($totalSale as $row) {
            $label[] = '' . $row['month'] . '';
            $data[] = ' ' . $row['count'] . ' ';
        }
        ?>

        <!-- Sticky Footer -->
        <?php include APPPATH . 'views/sale/includes/footer.php'; ?>

    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assests/js/sb-admin.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/datatables-demo.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/chart-area-demo.js'); ?>"></script>

    <script>
    //bar
    var ctxB = document.getElementById("sale-barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($label, JSON_NUMERIC_CHECK) ?>,

            datasets: [{
                label: 'Sale',
                data: <?php echo json_encode($data, JSON_NUMERIC_CHECK) ?>,
                backgroundColor: "#0000FF",
                borderWidth: 2,
                borderColor: "#0000FF",
                pointBackgroundColor: "#0000FF",
                pointBorderColor: "#0000FF",
            }]
        },
        options: {
            // scales: {
            //     yAxes: [{
            //         ticks: {
            //             beginAtZero: true
            //         }
            //     }]
            // }
            responsive: true,
        }
    });
    </script>
</body>

</html>