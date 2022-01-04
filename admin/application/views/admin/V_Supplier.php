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
                        <a href="#">Supplier</a>
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
                        Supplier View
                        <div class="d-flex justify-content-end">
                            <a href="<?php echo base_url('addsupplier'); ?>" class="btn btn-outline-primary mb-2 "><i
                                    class="fas fa-plus"></i> New </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Supplier Name</th>
                                        <th>Photo</th>
                                        <th>Phone-Number</th>
                                        <th> Email </th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Supplier Name</th>
                                        <th>Photo</th>
                                        <th>Phone-Number</th>
                                        <th> Email </th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    if (count($supplier)) :
                                        $cnt = 1;
                                        foreach ($supplier as $row) :

                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo $row->suppliername ?></td>
                                        <td>
                                            <?php
                                                    if (empty($row->photo)) {
                                                        echo '
                                        <img src=" ' . base_url('../assets/img/no_user_profile.jpg') . '" class="img-reponsive"
                                        width="50px" height="50px">
                                        ';
                                                    } else {
                                                        echo '
                                        <img src=" ' . base_url('../assets/img/' . $row->photo) . '"
                                        class="img-responsive" width="50px" height="50px" alt="">
                                        ';
                                                    }
                                                    ?><span><a href="#editphoto" title="Photo"
                                                    data-id="<?php echo $row->supplierid ?>"
                                                    class="fa fa-edit editphoto"></a>
                                            </span>
                                        </td>
                                        <td><?php echo $row->phone_number ?></td>
                                        <td><?php echo $row->email ?></td>
                                        <td><?php echo $row->address ?></td>
                                        <td class="text-center"><?php if (empty($row->status) || $row->status == null) {
                                                                            echo '<span class="badge badge-danger"> Deactive </span>';
                                                                        } else {
                                                                            echo '<span class="badge badge-success"> Active </span>';
                                                                        }
                                                                        ?>
                                            <span><a href="#<?php echo $row->suppliername ?>" class="editstatus"
                                                    data-id="<?php echo $row->supplierid ?>"> <i class="fa fa-edit"></i>
                                                </a></span>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('editcategory/' . $row->supplierid . '') ?>"
                                                class="fa fa-edit" data-toggle="tooltip" data-placement="top"
                                                title="Edit"></a>
                                            <a href="#delete" data-id="<?php echo $row->supplierid ?>"
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

        <?php include("includes/supplier_modal.php");
        include("includes/scripts.php");
        ?>
        <script>
        $(function() {

            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                var supplierid = $(this).attr('data-id');
                $('#DeleteModal').modal('show');
                GetDataRow(supplierid);
            });
        });

        function GetDataRow(supplierid) {
            $.ajax({
                url: '<?php echo base_url() ?>admin/C_Supplier/FetRowData',
                dataType: 'JSON',
                method: 'POST',
                data: {
                    supplierid: supplierid
                },
                success: function(response) {
                    // alert(response);
                    $('.supplierid').val(response.supplierid);
                    $('.name').html(response.suppliername);


                }
            });
        }
        </script>

</body>

</html>