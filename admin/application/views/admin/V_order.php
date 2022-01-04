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

    <style>
    .btn-circle {
        display: inline-block;
        border-radius: 100px;
        text-align: center;
        width: inherit;
    }

    .loadingdata {
        position: absolute;
        top: 50%;
        left: 50%;
        height: 200px;
        width: 230px;
        transform: translate(-50%, -50%);
    }
    </style>

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
                    <li class="breadcrumb-item active">Overview</li>
                </ol>
            </div>

            <div class="container-fluid">
                <div class="row justify-content-end mt-3 ">
                    <div class="col-md-6">
                        <form action="#" method="GET" class="form-inline">
                            <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')"
                                class="form-control mb-2 ml-2" id="startdate" placeholder="Choose Start Date">
                            <input type="text" class="form-control mb-2 ml-2" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="enddate" placeholder="Choose End Date">
                            <input type="submit" name="search" id="searchdate"
                                class="btn btn-success mb-2 ml-2 searchdate" value="Search">
                        </form>
                        <div class="alert alert-danger text-center mt-2" id="alert-message" style="display: none;">
                            <span class="message"></span>
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="filter-status-box">
                            <select name="filterstatus" id="filterstatus" class="form-control">
                                <option value="" selected> -- Select order status -- </option>
                                <option value="1"> Processing </option>
                                <option value="2"> Completed </option>
                                <option value="3"> Refund </option>
                                <option value="4"> Canceled </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href=" <?php echo base_url('admin/C_order/generate_pdf'); ?>"
                            class="btn btn-primary btn-block">
                            <span><i class="fas fa-print"></i></span> Export PDF</a>
                        <!-- <a href="#" class="btn btn-primary">
                            <span><i class="fas fa-print"></i></span> Export Excel</a> -->
                    </div>
                </div>
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
                        Order Info View
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order Date</th>
                                        <th>Payment Method</th>
                                        <th>Transaction Photo</th>
                                        <th>Order Status</th>
                                        <th>Customer Name</th>
                                        <th>Photo</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Order Date</th>
                                        <th>Payment Method</th>
                                        <th>Transaction Photo</th>
                                        <th>Order Status</th>
                                        <th>Customer Name</th>
                                        <th>Photo</th>
                                        <th>Tools</th>
                                    </tr>
                                </tfoot>
                                <tbody id="ordertbody">

                                    <?php
                                    if (count($orderdata)) :
                                        $cnt = 1;
                                        foreach ($orderdata as $row) :
                                            $orderid = $row->orderid;
                                            $images = (empty($row->images)) ? '<img src=" ' . base_url('../assets/img/no_user_profile.jpg') . '" class="img-reponsive"
width="50px" height="50px">' : '<img src=" ' . base_url('../assets/img/' . $row->images) . '"
class="img-responsive" width="50px" height="50px" alt="">';
                                            $tran_photo = (empty($row->payment_transaction_image)) ? ' <span> N/A </span> '
                                                : ' <a href="' . base_url('../assets/img/' . $row->payment_transaction_image)   . '"> <img src=" ' . base_url('../assets/img/' . $row->payment_transaction_image) . '" class="img-responsive" width="50px" height="50px" alt=""> </a>';
                                            $status =  ($row->status == 1
                                                ? '<span class="badge badge-info"> Processing </span>'
                                                : ($row->status == 2
                                                    ? '<span class="badge badge-success"> Completed </span>'
                                                    : ($row->status == 3
                                                        ? '<span class="badge badge-warning"> Refund </span>'
                                                        : '<span class="badge badge-danger"> Canceled </span>')));
                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo date('d-M-Y', strtotime($row->order_date)) ?></td>
                                        <td><?php echo $row->payment_method ?></td>
                                        <td> <?php echo $tran_photo ?> </td>
                                        <td class="text-center"><?php echo $status  ?>
                                            <span><a href="#editstatus" class="editstatus"
                                                    data-id="<?php echo $row->orderid ?>"> <i class="fa fa-edit"></i>
                                                </a></span>
                                        </td>
                                        <td><?php echo $row->username ?> <span> <a href="#" class="fas fa-eye username"
                                                    data-id="<?php echo $row->customerid ?>"></a></span> </td>
                                        <td> <?php echo $images  ?> </td>
                                        <td>
                                            <a href="#detail" class="fa fa-eye order_detail"
                                                data-id="<?php echo $row->orderid ?>" data-toggle="tooltip"
                                                data-placement="top" title="View Detail"></a>
                                            |
                                            <a href=" <?php echo base_url('order/create_invoice/' . $row->orderid . ' ') ?> "
                                                class=" create_invoice" data-id="<?php echo $row->orderid ?>"
                                                data-toggle="tooltip" data-placement="top" title="Create Invoice"><i
                                                    class="fas fa-file-invoice"></i></a>

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

        <?php
        include("includes/order_modal.php");
        include("includes/scripts.php");
        ?>
        <script>
        $(function() {

            $(document).on('click', '.editstatus', function(e) {
                e.preventDefault();
                $('#orderstatusmodal').modal('show');
                var orderid = $(this).attr('data-id');
                GetDataRow(orderid);
            });

            $(document).on('click', '.detail', function(e) {
                e.preventDefault();
                $('#orderdetailmodal').modal('show');
                var orderid = $(this).attr('data-id');
                GetDetailOrder(orderid)
            });

            $('#searchdate').on('click', function(e) {
                e.preventDefault();
                var start_date = $('#startdate').val();
                var end_date = $('#enddate').val();
                if (start_date == "" && end_date == "") {
                    $('#alert-message').show();
                    $('.message').html("Please select start date and end date");
                } else {
                    $.ajax({
                        url: '<?php echo base_url() ?>admin/C_order/FilterOrderDate',
                        method: 'GET',
                        dataType: 'JSON',
                        data: {
                            start_date: start_date,
                            end_date: end_date
                        },
                        beforeSend: function() {
                            $('#ordertbody').html(
                                '<img src="<?php echo base_url('assests/images/gif/loading.gif') ?>" class="loadingdata">'
                            );
                        },
                        success: function(response) {
                            $('#ordertbody').html(response);
                        }
                    });
                }
            });


            $(document).on('change', '#filterstatus', function(e) {
                e.preventDefault();
                var status = $('#filterstatus').val();
                if (status == "") {
                    document.location.reload();
                }
                GetStatus(status);

            });

            $(document).on('click', '.order_detail', function(e) {
                e.preventDefault();
                $('#orderdetailmodal').modal('show');
                var oderid = $(this).data('id');
                GetDetailOrder(oderid);
            });

            $(document).on('click', '.username', function(e) {
                e.preventDefault();
                $('#user_Modal').modal('show');
                var customerid = $(this).data('id');
                GetUserRow(customerid);
            });


            $('.close').click(function() {
                $('#alert-message').hide();
            });

        });

        function GetDataRow(orderid) {
            $.ajax({
                url: '<?php echo base_url() ?>admin/C_order/FetRowData',
                dataType: 'JSON',
                method: 'GET',
                data: {
                    orderid: orderid
                },
                success: function(response) {
                    $('#editorderstatus').val(response.status);
                    $('.orderid').val(response.orderid);
                }
            });
        }

        function GetDetailOrder(orderid) {
            $.ajax({
                url: '<?php echo base_url() ?>admin/C_order/GetDetailOrder',
                method: 'GET',
                dataType: 'JSON',
                data: {
                    orderid: orderid
                },
                success: function(response) {
                    $('#orderdetailtbody').html(response.detail);
                    $('.grandtotal').html(response.total);
                    $('.orderid').val(response.orderid);
                    $('.customerid').val(response.customerid);
                }
            });
        }

        function GetStatus(status) {
            $.ajax({
                url: '<?php echo base_url() ?>admin/C_order/filterStatus',
                method: 'GET',
                dataType: 'JSON',
                data: {
                    status: status
                },
                beforeSend: function() {
                    $('#ordertbody').html(
                        '<img src="<?php echo base_url('assests/images/gif/loading.gif') ?>" class="loadingdata">'
                    )
                },
                success: function(response) {
                    $('#ordertbody').html(response);
                }
            });
        }

        function GetUserRow(customerid) {
            $.ajax({
                url: '<?php echo base_url() ?>admin/C_order/getUserRow',
                method: 'POST',
                data: {
                    customerid: customerid
                },
                dataType: 'JSON',
                success: function(data) {
                    $('.uname').html(data.username);
                    $('.fname').html(data.first_name);
                    $('.lname').html(data.last_name);
                    $('.phonenumber').html(data.phone_number);
                    $('.email').html(data.email);
                    $('.address').html(data.address);
                    $('#userphoto').attr('src', data.images);
                }
            });
        }
        </script>

</body>

</html>