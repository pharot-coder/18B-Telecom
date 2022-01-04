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
                        <a href="#">Slider Banner</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

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
        <!-- Icon Cards-->
        <!-- DataTables Example -->
        <div class="card mb-3 mt-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Slider Banner

                <div class="d-flex justify-content-end">
                    <a href="<?php echo base_url('addbanner'); ?>" class="btn btn-outline-primary"><i
                            class="fas fa-plus"></i>
                        New </a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th> Tools </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th> Tools </th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                        if (count($data)) :
                            $cnt = 1;
                            foreach ($data as $row) :
                                $status = (empty($row->status)) ? '<span class="badge badge-danger"> Deactive </span>' : '<span class="badge badge-success"> Active </span>';
                        ?>

                            <tr>
                                <td><?php echo htmlentities($cnt); ?></td>
                                <td>
                                    <?php
                                        if (empty($row->image)) {
                                            echo '
                                        <img src=" ' . base_url('../assets/img/no_user_profile.jpg') . '" class="img-reponsive"
                                        width="60px" height="60px">
                                        ';
                                        } else {
                                            echo '
                                        <img src=" ' . base_url('../assets/img/' . $row->image) . '"
                                        class="img-responsive" width="100px" height="60px" alt="">
                                        ';
                                        }
                                        ?>
                                    <span><a href="#editbrandphoto"><i class="fa fa-edit"></i></a></span>
                                </td>

                                <td class="text-center"><?php echo $status ?><a class="ml-2 edit_status"
                                        data-id="<?php echo $row->sliderid ?>" href="#editstatus"><span><i
                                                class="fa fa-edit"></i></span></a></td>

                                <td>
                                    <!-- <a href="#" class="fa fa-edit"></a> | -->
                                    <a href="#" data-id="<?php echo $row->sliderid ?>" class="fa fa-trash delete"></a>
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
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php include APPPATH . 'views/admin/includes/footer.php'; ?>
    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal -->
    <?php include("includes/slider_modal.php") ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php
    include("includes/scripts.php");
    ?>

    <script>
    $(function() {
        $(document).on('click', '.descBtn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#description').modal('show');
            getRow(id);
        });

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            $('#deleteModal').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.edit_status', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#statusmodal').modal('show');
            getRow(id);
        });
    });

    function getRow(id) {
        $.ajax({
            url: '<?php echo base_url() ?>/admin/C_banner/getRow',
            method: 'GET',
            dataType: 'jSON',
            data: {
                id: id
            },
            success: function(data) {
                $('.sliderid').val(data.sliderid);
                $('.status').val(data.status);
            }
        });
    }
    </script>

</body>

</html>