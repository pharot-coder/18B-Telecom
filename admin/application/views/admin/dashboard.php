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
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="mr-5"><?php echo htmlentities($tcount); ?> Customers </div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href="<?php echo base_url('customer'); ?>">
                                <span class="float-left">Total Customers</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-info o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="mr-5"><?php echo htmlentities($tusers); ?> Users </div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href="<?php echo base_url('users'); ?>">
                                <span class="float-left">Total Users</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-circle"></i>
                                </div>
                                <div class="mr-5"> <?php echo htmlentities($totalproduct) ?> Products</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href=" <?php echo base_url('product') ?> ">
                                <span class="float-left"> Total Products</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5"> <?php echo htmlentities($totalcategory) ?> Categories</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1"
                                href=" <?php echo base_url(('category')) ?> ">
                                <span class="float-left"> Total Product Categories </span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="far fa-file-alt"></i>
                                Daily Monthly Order <?php echo date('Y') ?>

                            </div>
                            <div class="card-body">
                                <canvas id="order-barChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="far fa-file-alt"></i>
                                Daily Monthly Vistors <?php echo date('Y') ?>

                            </div>

                            <!-- <hr> -->
                            <div class="card-body">
                                <canvas id="pieChart"></canvas>
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
        <!--  Order Data-->
        <?php
        $label = [];
        $data = [];
        foreach ($torder as $row) {
            $label[] = '' . $row['month'] . '';
            $data[] = ' ' . $row['count'] . ' ';
        }
        ?>
        <!-- Visitor Data -->
        <?php
        $date = [];
        $countVisitor = [];
        foreach ($tVisitor as $row) :
            $date[] = $row->date;
            $countVisitor[] = $row->countVisitor;
        endforeach;
        ?>
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
    // pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($date, JSON_NUMERIC_CHECK) ?>,
            datasets: [{
                data: <?php echo json_encode($countVisitor, JSON_NUMERIC_CHECK) ?>,
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", ' #ffff00',
                    '#993333', '#000099', '#ff33cc', '#ff99e6', '#33cc33', '#00ccff'
                ],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774",
                    ' #ffffcc', ' #d98c8c', '#6666ff', '#ff99e6', ' #ffb3d9', '#adebad', '#b3f0ff'
                ]
            }]
        },
        options: {
            responsive: true
        }
    });
    </script>


    <script>
    //bar
    var ctxB = document.getElementById("order-barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($label, JSON_NUMERIC_CHECK) ?>,

            datasets: [{
                label: 'Order',
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

    <script>
    $(function() {
        $('#select_year_order').on('change', () => {
            var val = $('#select_year_order').val();
            alert(val);
        });
    });
    </script>

</body>

</html>