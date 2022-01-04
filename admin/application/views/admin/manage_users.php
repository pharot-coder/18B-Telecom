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
                    <li class="breadcrumb-item active">Manage Users</li>
                </ol>
                <a href="<?php echo base_url('useradd'); ?>" id="useradd" class="btn btn-outline-primary"><i
                        class="fas fa-plus"></i> New
                </a>
                <!---- Success Message ---->
                <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success mt-2" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            </div>
            <?php } ?>
            <!-- DataTables Example -->
            <div class="card mb-3 mt-2">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Users Details
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="Order-Table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fist Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Fist Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                            if (count($userdetails)) :
                                $count = 1;
                                foreach ($userdetails as $row) :
                            ?>
                                <tr>
                                    <td><?php echo htmlentities($count); ?></td>
                                    <td><?php echo $row->first_name ?></td>
                                    <td><?php echo $row->last_name ?></td>
                                    <td><?php echo htmlentities($row->username) ?></td>
                                    <td><?php echo $row->phone ?></td>
                                    <td><?php echo htmlentities($row->email) ?></td>
                                    <td>
                                        <?php
                                            if ($row->userlevel == 1) {
                                                echo "Admin";
                                            } elseif ($row->userlevel == 2) {
                                                echo "Sale";
                                            } else {
                                                echo "User";
                                            }
                                            ?>
                                    </td>
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
                                                data-id="<?php echo $row->userid ?>" class="fa fa-edit editphoto"></a>
                                        </span>
                                    </td>
                                    <td><?php if (empty($row->status)) {
                                                echo '<span class="badge badge-danger"> Deactive </span>';
                                            } else {
                                                echo '<span class="badge badge-success"> Active </span>';
                                            }
                                            ?> <a href="#editstatus" class="eidtstatus"
                                            data-id="<?php echo $row->userid ?>">
                                            <span><i class="fa fa-edit"></i></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('cart/show_cart_detail/' . $row->userid . ''); ?>"
                                            data-toggle="tooltip" data-placement="top" title="View Cart">
                                            <span><i class="fa fa-shopping-cart"></i></span> </a>

                                        <a href="admin/Manage_Users/getuserdetail/{$row->userid}" data-toggle="tooltip"
                                            data-placement="top" title="Edit User"> <span><i
                                                    class="fa fa-edit"></i></span> </a>

                                        <a href="#delete<?php echo $row->username ?>"
                                            data-id="<?php echo $row->userid ?>" data-toggle="tooltip"
                                            data-placement="top" title="Delete" class="deleteuser"> <span><i
                                                    class="fa fa-trash" style="color: red;"></i></span> </a>

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
    <?php include("includes/user_modal.php"); ?>
    <?php include("includes/scripts.php"); ?>
    <script>
    $(function() {


        $(document).on('click', '.deleteuser', function(e) {
            e.preventDefault();
            $('#DeleteModal').modal('show');
            var userid = $(this).attr('data-id');
            GetRow(userid);
        });

        $(document).on('click', '.eidtstatus', function(e) {
            e.preventDefault();
            var userid = $(this).data('id');
            $('#statusmodal').modal('show');
            GetRow(userid);
        });
    });

    function GetRow(userid) {
        $.ajax({
            url: '<?php echo base_url() ?>admin/Manage_Users/GetRow',
            method: 'GET',
            dataType: 'JSON',
            data: {
                userid: userid
            },
            success: function(response) {
                $('.name').html(response.username);
                $('.userid').val(response.userid);
                $('.status').val(response.status);
            }
        });
    }
    </script>

</body>

</html>