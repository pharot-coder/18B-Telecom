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
                        <a href="#">Categories</a>
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
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Product Details
                    <div class="d-flex justify-content-end">
                        <a href="#addproduct" data-toggle="modal" id="add" class="btn btn-outline-primary mb-2"><i
                                class="fas fa-plus"></i> New </a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th>Cost</th>
                                    <th>QTY</th>
                                    <th>Inputer</th>
                                    <th>Status</th>
                                    <th> Tools </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th>Cost</th>
                                    <th>QTY</th>
                                    <th>Inputer</th>
                                    <th>Status</th>
                                    <th> Tools </th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                            if (count($product)) :
                                $cnt = 1;
                                foreach ($product as $row) :
                            ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td><?php echo $row->productname ?></td>
                                    <td><a href="#description" id="desc" class="btn btn-primary des"
                                            data-id="<?php echo $row->productid ?>"> View </a></td>
                                    <td><?php echo $row->categoryname ?></td>
                                    <td><img src="<?php echo base_url('../assets/img/' . $row->images); ?>"
                                            class="img-responsive" width="50px" height="50px" alt="">
                                        <span><a href="<?php echo base_url('editproductphoto/' . $row->productid . '') ?>"
                                                title="Photo" data-id="<?php echo $row->productid ?>"> <i
                                                    class="fa fa-edit"></i> </a> </span>
                                    </td>
                                    <td>&#36;<?php echo number_format($row->price, 2) ?></td>
                                    <td>&#36;<?php echo number_format($row->cost, 2) ?></td>
                                    <td><?php echo $row->qty ?></td>
                                    <td><?php echo $row->username ?></td>
                                    <td class="text-center"><?php if (empty($row->status) || $row->status == null) {
                                                                    echo '<span class="badge badge-danger"> Deactive </span>';
                                                                } else {
                                                                    echo '<span class="badge badge-success"> Active </span>';
                                                                }
                                                                ?>
                                        <span><a href="#<?php echo $row->productname ?>" class="editstatus"
                                                data-id="<?php echo $row->productid ?>"> <i class="fa fa-edit"></i>
                                            </a></span>
                                    </td>
                                    <td><a href="#editproduct" class="edit" data-id="<?php echo $row->productid ?>"><i
                                                class="fa fa-edit"></i>
                                        </a>
                                        <a href="#delete" title="Delete" data-id="<?php echo $row->productid ?>"
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

    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include("includes/Product_Modal.php");
    include("includes/scripts.php");
    ?>
    <script type="text/javascript">
    $(function() {

        $(document).on('click', '.des', function(e) {
            $('#descriptionmodal').modal('show');
            e.preventDefault();
            var productid = $(this).attr('data-id');
            GetProductRow(productid);
        });

        $(document).on("click", ".edit", function(e) {
            e.preventDefault();
            $('#editproduct').modal("show");
            var productid = $(this).attr("data-id");
            GetProductRow(productid);
        });

        $(document).on('click', '.delete', function(e) {
            $('#DeleteModal').modal('show');
            e.preventDefault();
            var productid = $(this).attr("data-id");
            GetProductRow(productid);
        });

        // $(document).on('click', '.editphoto', function(e) {
        //     e.preventDefault();
        //     $('#editphoto').modal('show');
        //     var productid = $(this).attr("data-id");
        //     GetProductRow(productid);
        // });

        $(document).on("click", "#add", function(e) {
            e.preventDefault();
            GetCategory();
        })

        $(document).on('click', '.editstatus', function(e) {
            e.preventDefault();
            $('#statusmodal').modal('show');
            var productid = $(this).attr('data-id');
            GetProductRow(productid);
        })
    });

    function GetProductRow(productid) {
        $.ajax({
            url: "<?php echo base_url(); ?>admin/Product_Con/FetchRow",
            dataType: "JSON",
            method: "POST",
            data: {
                productid: productid
            },
            success: function(response) {
                $('.name').html(response.productname);
                $('.categoryid').val(response.categoryid);
                $('.desc').html(response.description);
                $('#editproductname').val(response.productname);
                $('#editcategory').val(response.categoryid);
                $('#editprice').val(response.price);
                $('.status').val(response.status);
                $('#editcost').val(response.cost);
                $('#editsupplier').val(response.supplierid);
                $('#editbrand').val(response.brandid);
                $('#editqty').val(response.qty);
                CKEDITOR.instances["editor2"].setData(response.description);
                $('.productid').val(response.productid);
            }
        });
    }
    </script>
</body>

</html>