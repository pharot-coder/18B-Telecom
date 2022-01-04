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
                        <a href="#">Brand</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="text-center">
                                    <h5> <i class="fas fa-users"></i> Add New Brand Model </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="useradd-form">
                                    <?php
                                    $arr_form = array('method' => 'post', 'enctype' => 'multipart/form-data');
                                    echo form_open('admin/C_Brand/AddData', $arr_form); ?>
                                    <div class="form-group">
                                        <label for="suppliername"> Brand Name: </label>
                                        <input type="text" class="form-control" name="brandname"
                                            placeholder="Enter Brand Name">
                                        <?php echo form_error('brandname', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo"> Brand Photo: </label>
                                        <input type="file" class="form-control" name="photo">
                                        <?php echo form_error('photo', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-center">
                                            <?php echo form_submit(['name' => 'save', 'class' => 'btn btn-primary btn-block', 'value' => 'Save']) ?>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="div col-sm-8">
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
                                Brand Detail
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th> Tools </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th> Tools </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php
                                            if (count($branddata)) :
                                                $cnt = 1;
                                                foreach ($branddata as $row) :
                                                    $status = (empty($row->status)) ? '<span class="badge badge-danger"> Deactive </span>' : '<span class="badge badge-success"> Active </span>';
                                            ?>

                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo $row->brandname ?></td>
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
                                                    <span><a href="#editbrandphoto"><i
                                                                class="fa fa-edit"></i></a></span>
                                                </td>

                                                <td class="text-center"><?php echo $status ?> <a class="ml-2 status"
                                                        data-id="<?php echo $row->brandid ?>"
                                                        href="#editstatus"><span><i class="fa fa-edit "></i></span></a>
                                                </td>

                                                <td><?php echo  anchor("admin/Category_Con/GetRow/{$row->brandid}", ' ', 'class="fa fa-edit"') ?>
                                                    <a href="#delete" title="Delete"
                                                        data-id="<?php echo $row->brandid ?>"
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
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php
    include("includes/brand_modal.php");
    include("includes/scripts.php");
    ?>
    <script>
    $(function() {


        $(document).on('click', '.status', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $('#editstatus_modal').modal('show');
            getRow(id);
        });

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            $('#delete_modal').modal('show');
            var id = $(this).attr('data-id');
            getRow(id);
        });
    })

    function getRow(id) {
        $.ajax({
            url: ' <?php echo base_url() ?>admin/C_Brand/fetchRow',
            dataType: 'JSON',
            method: 'POST',
            data: {
                brandid: id
            },
            success: function(data) {
                $('.brandname').html(data.brandname);
                $('.brandid').val(data.brandid);
                $('.editstatus').val(data.status);
            }
        });
    }
    </script>

</body>

</html>