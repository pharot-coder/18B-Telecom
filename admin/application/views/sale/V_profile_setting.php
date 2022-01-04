<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sale Profile Setting</title>
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
                        <a href="<?php echo site_url('sale/Dashboard'); ?>">Admin</a>
                    </li>
                    <li class="breadcrumb-item active"> Profile Setting </li>
                </ol>

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

                <?php echo form_open('sale/C_profile_setting/editProfile', ['id' => 'profile_form', 'method' => 'POST']) ?>
                <?PHP foreach ($userData as $row) :
                    $userlevel  = ($row->userlevel == 1) ? 'Admin' : 'Sale';
                    $images = (empty($row->images))
                        ? '<img src=" ' . base_url('../assets/img/no_user_profile.jpg') . '" class="rounded-circle mt-5"
                        width="200" ">
                        '
                        : '<img src=" ' . base_url('../assets/img/' . $row->images) . '"
                        class="rounded-circle mt-5"  width="200" " alt="">
                        ';
                ?>
                <div class=" rounded bg-white mt-5">
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <?php echo $images ?>
                                <span><a href="#" id="editPhoto" data-id="<?php echo $row->userid ?>"
                                        class="fas fa-edit text-right"></a></span><span
                                    class="font-weight-bold"><?php echo $row->username ?></span><span
                                    class="text-black-50"> <?php echo $row->email ?> </span>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex flex-row align-items-center back"><i
                                            class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                    </div>
                                    <h6 class="text-right">Edit Profile</h6>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="first_name"> <b>First Name:</b></label>
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder=" Enter First Name" id="fname"
                                            value="<?php echo $row->first_name ?>">
                                        <?php echo form_error('first_name', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name"><b>Last Name:</b></label>
                                        <input type="text" name="last_name" id="lname" class="form-control"
                                            value="<?php echo $row->last_name ?>" placeholder="Enter Last Name">
                                        <?php echo form_error('last_name', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="username"><b>Username:</b></label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            placeholder="Username" value="<?php echo $row->username ?>">
                                        <?php echo form_error('username', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email"><b>Email:</b></label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Email" value="<?php echo $row->email ?>">
                                        <?php echo form_error('email', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="address"><b>Address:</b></label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            placeholder="address" value="<?php echo $row->address ?>">
                                        <?php echo form_error('address', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone_number"><b>Phone Number:</b></label>
                                        <input type="text " name="phone_number" id="phone_number" class="form-control"
                                            value="<?php echo $row->phone ?>" placeholder="Phone number">
                                        <?php echo form_error('phone_number', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="user_type"> <b>Type: </b></label>
                                        <input type="text" class="form-control" readonly placeholder="User Type"
                                            value="<?php echo $userlevel ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="user_type"> <b>Register Date: </b></label>
                                        <input type="text" class="form-control" readonly placeholder=" Regiser Date"
                                            value="<?php echo date('d-M-Y', strtotime($row->register_date)) ?>">
                                    </div>
                                </div>

                                <?php endforeach; ?>
                                <div class="mt-5 text-right">
                                    <?php echo form_submit(['class' => 'btn btn-primary', 'name' => 'save', 'id' => 'save_change', 'value' => 'Save Change']) ?>
                                </div>
                                <?php form_close() ?>
                            </div>
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
    <?php include('includes/scripts.php') ?>

    <script>
    $(document).ready(function() {

        $("#editPhoto").click(function(e) {
            e.preventDefault();
            var userid = $(this).data('id');
            $('#editphoto').modal('show');
            $('.userid').val(userid);
        });

    });
    </script>

</body>

</html>