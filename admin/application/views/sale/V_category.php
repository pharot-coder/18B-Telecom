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
                        <a href="#">Category</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
                <!---- Success Message ---->
                <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                <!---- Error Message ---->
                <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>
                <!-- Icon Cards-->
                <!-- DataTables Example -->
                <div class="card mb-3 ">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Category Detail
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    if (count($categoryData)) :
                                        $cnt = 1;
                                        foreach ($categoryData as $row) :
                                            $status = (empty($row->status)) ? '<span class="badge badge-danger"> Deactive </span>' : '<span class="badge badge-success"> Active </span>';
                                    ?>

                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo $row->categoryname ?></td>
                                        <td><?php echo $status ?> </td>
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
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include("includes/scripts.php");   ?>

</body>

</html>