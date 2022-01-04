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
                        <a href="#">Order</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Order Status</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Add New Order Status</h5>
                                <hr>
                                <div class="card-body">
                                    <?php echo form_open('admin/C_order/addNewOrderStatus', [
                                        'method' => 'post'
                                    ]); ?>
                                    <div class="form-group">
                                        <label class="control-label" for="name"><strong>Order
                                                Status:</strong></label>
                                        <input type="text" name="order_status_name" class="form-control"
                                            id="order_status_name" placeholder="Enter New Status Order">
                                        <?php
                                        echo form_error('order_status_name', "<div style='color: red'>", "</div>");
                                        ?>
                                    </div>
                                    <div class="form-group text-center">
                                        <?php echo form_submit(['class' => 'btn btn-primary btn-block', 'value' => 'Save']) ?>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
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
                        <?php } ?>
                        <!-- Icon Cards-->
                        <!-- DataTables Example -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-table"></i>
                                Order Status View
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order Status Name</th>
                                                <th>Status</th>
                                                <th> Tools </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Order Status Name</th>
                                                <th>Status</th>
                                                <th> Tools </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php
                                            if (count($data)) :
                                                $cnt = 1;
                                                foreach ($data as $row) :

                                            ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo $row->order_status_name ?></td>
                                                <td class="text-center"><?php if (empty($row->status) || !$row->status) {
                                                                                    echo '<span class="badge badge-danger"> Deactive </span>';
                                                                                } else {
                                                                                    echo '<span class="badge badge-success"> Active </span>';
                                                                                }

                                                                                ?> <span><a
                                                            href="#<?php echo $row->order_status_name ?>"
                                                            data-toggle="tooltip" data-placement="top" title="Edit"
                                                            class="editstatus"
                                                            data-id="<?php echo $row->order_status_id ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </a></span> </td>
                                                <td>
                                                    <a href="<?php echo base_url('editcategory/' . $row->order_status_id . '') ?>"
                                                        class="fa fa-edit" data-toggle="tooltip" data-placement="top"
                                                        title="Edit"></a>
                                                    <a href="#delete" data-id="<?php echo $row->order_status_id ?>"
                                                        data-toggle="tooltip" data-placement="top" title="Delete"
                                                        class="fa fa-trash delete"></a>
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

        <?php include("includes/category_modal.php");
        include("includes/scripts.php");
        ?>

</body>

</html>
<script type="text/javascript">

</script>