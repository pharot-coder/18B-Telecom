<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Manage Users</title>

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
        <?php include APPPATH . 'views/admin/includes/sidebar.php'; ?>

        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo site_url('admin/Dashboard'); ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Customer</li>
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
        <!-- DataTables Example -->
        <div class="card mb-3 mt-2">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Customer Details
                <div class="d-flex justify-content-end">
                    <a href="<?php echo base_url('addcustomer'); ?>" id="useradd" class="btn btn-outline-primary"><i
                            class="fas fa-plus"></i> New
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fist-Name</th>
                                <th>Last-Name</th>
                                <th>User-Name</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>Regiser-Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Fist-Name</th>
                                <th>Last-Name</th>
                                <th>User-Name</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>Regiser-Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                        if (count($customer)) :
                            $count = 1;
                            foreach ($customer as $row) :
                        ?>
                            <tr>
                                <td><?php echo htmlentities($count); ?></td>
                                <td><?php echo $row->first_name ?></td>
                                <td><?php echo $row->last_name ?></td>
                                <td><?php echo htmlentities($row->username) ?></td>
                                <td><a href="#address" data-id="<?php echo $row->customerid ?>"
                                        class="btn btn-info add"> View </a></td>
                                <td><?php echo $row->phone_number ?></td>
                                <td><?php echo htmlentities($row->email) ?></td>
                                <td>
                                    <?php
                                        if (empty($row->images)) {
                                            echo '
                                        <img src=" ' . base_url('../assets/img/no_user_profile.jpg') . '" class="img-reponsive"
                                        width="50px" height="50px">
                                        ';
                                        } else {
                                            echo '
                                        <img src=" ' . base_url('../assets/img/' . $row->images) . '"
                                        class="img-responsive" width="50px" height="50px" alt="">
                                        ';
                                        }
                                        ?><span><a href="#editphoto" title="Photo"
                                            data-id="<?php echo $row->customerid ?>" class="fa fa-edit editphoto"></a>
                                    </span>
                                </td>
                                <td><?php echo date('d-M-Y', strtotime($row->register_date)) ?></td>
                                <td><?php if (empty($row->status)) {
                                            echo '<span class="badge badge-danger"> Deactive </span>';
                                        } else {
                                            echo '<span class="badge badge-success"> Active </span>';
                                        }
                                        ?> <a href="#editstatus" class="editstatus" data-toggle="tooltip"
                                        data-placement="top" title="Edit Status"
                                        data-id="<?php echo $row->customerid ?>">
                                        <span><i class="fa fa-edit "></i></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('cart/show_cart_detail/' . $row->customerid . ''); ?>"
                                        data-toggle="tooltip" data-placement="top" title="View Cart">
                                        <span><i class="fa fa-shopping-cart"></i></span> </a>
                                    <a href="#" class="edit" data-id="<?php echo $row->customerid ?>"
                                        data-toggle="tooltip" data-placement="top" title="Edit User">
                                        <span><i class="fa fa-edit"></i></span> </a>
                                    <a href="#" class="delete" data-toggle="tooltip"
                                        data-id="<?php echo $row->customerid ?>" data-placement="top" title="Delete">
                                        <span><i class="fa fa-trash" style="color: red;"></i></span> </a>

                                </td>
                            </tr>
                            <?php
                                $count++;
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

    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php include("includes/customer_modal.php"); ?>
    <?php include("includes/scripts.php"); ?>
    <script>
    $(function() {

        $(document).on('click', '.editstatus', function(e) {
            e.preventDefault();
            var customerid = $(this).attr('data-id');
            $('#statusmodal').modal('show');
            GetDataRow(customerid);
        });

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var customerid = $(this).data('id');
            $('#deletemodal').modal('show');
            GetDataRow(customerid);
        });

        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            var customerid = $(this).data('id');
            $('#editmodal').modal('show');
            GetDataRow(customerid);
        });

        $(document).on('click', '.add', function(e) {
            e.preventDefault();
            var customerid = $(this).attr('data-id');
            $('#addressmodal').modal('show');
            GetDataRow(customerid);
        });
    });

    function GetDataRow(customerid) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/C_Customer/FetchRow',
            method: 'POST',
            dataType: 'JSON',
            data: {
                customerid: customerid
            },
            success: function(response) {
                $('.customerid').val(response.customerid);
                $('.username').html(response.username);
                $('#status').val(response.status);
                $('.name').html(response.first_name + ' ' + response.last_name);
                $('.address').html(response.address);
                $('#edit_first_name').val(response.first_name);
                $('#edit_last_name').val(response.last_name);
                $('#edit_password').val(response.password);
                $('#edit_uname').val(response.username);
                $('#edit_email').val(response.email);
                $('#edit_phonenumber').val(response.phone_number);
            }
        });
    }
    </script>

</body>

</html>