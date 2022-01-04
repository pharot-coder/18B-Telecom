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
                        <a href="#">Sale Order</a>
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
                    <i class="fas fa-table"></i> Create Sale Order
                </div>
                <?php echo form_open('sale/C_sale_sale/storeData', ['id' => 'invoice_form', 'method' => 'post']) ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="2" align="center">
                                <h2 style="margin-top:10.5px">Create Sale Order</h2>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-md-8">
                                        To,<br />
                                        <b>RECEIVER (BILL TO)</b><br />
                                        <input type="text" name="phone_number" id="receiver_phonenumber"
                                            class="form-control input-sm" placeholder="Enter Receiver Phone Number" />
                                        <textarea name="place" id="order_receiver_address" class="form-control mt-2"
                                            placeholder="Enter Customer Address"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mt-2" for="date"> <b>Date:</b> </label>
                                        <input type="text" name="sale_date" id="order_date"
                                            class="form-control input-sm" readonly
                                            value="<?php echo date('Y-m-d') ?>" />
                                        <label class="mt-2" for="date"> <b>Delivery Type:</b> </label>
                                        <input type="text" name="delivery_type" id="delivery_type"
                                            class="form-control input-sm" placeholder="Enter Delivery Type" />
                                        <label class="mt-2" for="date"> <b>Cash In: </b> </label>
                                        <input type="text" name="cash_in" id="cash_in" class="form-control input-sm"
                                            placeholder="Enter Cash In" />
                                    </div>
                                </div>
                                <br />
                                <table id="order-item-table" class="table table-bordered">
                                    <tr>
                                        <th width="5%">Sr No.</th>
                                        <th width="15%">Item Name</th>
                                        <th width="5%">Quantity</th>
                                        <th width="8%">Price</th>
                                        <th width="10%">Actual Amt.</th>
                                        <th width="10.5%">Total</th>
                                        <th width="3%" rowspan="1"></th>
                                    </tr>

                                    <tr>
                                        <td><span id="sr_no">1</span></td>
                                        <td>
                                            <select name="product_id[]" id="product_name1" class="form-control pid">
                                                <option value="0">-- Select Product --</option>
                                            </select>
                                        </td>

                                        <td><input type="text" name="order_item_quantity[]" id="order_item_quantity1"
                                                data-srno="1" class="form-control input-sm order_item_quantity" /></td>

                                        <td><input type="text" name="order_item_price[]" id="order_item_price1"
                                                data-srno="1"
                                                class="form-control input-sm number_only order_item_price" /></td>

                                        <input type="hidden" class="form-control cost" name="cost" value="" id="cost1"
                                            readonly>


                                        <input type="hidden" class="form-control sub_cost" name="sub_cost" value=""
                                            id="sub_cost1" readonly>


                                        <td><input type="text" name="order_item_actual_amount[]"
                                                id="order_item_actual_amount1" data-srno="1"
                                                class="form-control input-sm order_item_actual_amount" readonly />
                                        </td>

                                        <td><input type="text" name="order_item_final_amount[]"
                                                id="order_item_final_amount1" data-srno="1" readonly
                                                class="form-control input-sm order_item_final_amount" /></td>
                                        <td></td>
                                    </tr>
                                </table>
                                <div align="right">
                                    <button type="button" name="add_row" id="add_row"
                                        class="btn btn-success btn-xs">+</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>Delivery Fee:</td>
                            <td align="right"> <input type="text" name="delivery_fee" id="delivery_fee"
                                    class="form-control delivery_fee order_item_price" placeholder="Enter Deilvery Fee">
                            </td>
                        </tr>

                        <input type="hidden" name="total_cost" id="total_cost" class="form-control total_cost" readonly>

                        <tr>
                            <td align="right"><b>Grand Total:</td>
                            <td align="right"> <input type="text" name="total" id="final_total_amt"
                                    class="form-control final_total_amt" readonly> </td>
                        </tr>

                        <input type="hidden" id="total_income" class="form-control" name="income" readonly>
                        <tr>
                            <td align="right"><b>Remark:</td>
                            <td align="right"> <input type="text" id="remark" class="form-control" name="remark"> </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="hidden" name="total_item" id="total_item" value="1" />
                                <?php echo form_submit(['id' => 'create_invoice', 'value' => 'Create Order', 'name' => 'create_invoice', 'class' => 'btn btn-success btn-block']) ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php echo form_close(); ?>
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

    <?php include("includes/scripts.php");  ?>
    <script>
    $(document).ready(function() {
        var final_total_amt = $('#final_total_amt').text();
        var count = 1;
        getProduct();

        $(document).on('click', '#add_row', function() {
            count++;
            $('#total_item').val(count);
            var html_code = '';
            html_code += '<tr id="row_id_' + count + '">';
            html_code += '<td><span id="sr_no">' + count + '</span></td>';

            html_code += ' <td> <select id="product_name' + count +
                '" data-srno="' + count +
                '"  class="form-control pid" name="product_id[]" >  <option value="0">-- Select Product --</option> </select> </td> ';
            html_code += '<td><input type="text" name="order_item_quantity[]" id="order_item_quantity' +
                count + '" data-srno="' + count +
                '" class="form-control input-sm number_only order_item_quantity" /></td>';

            html_code += '<td><input type="text" name="order_item_price[]" id="order_item_price' +
                count + '" data-srno="' + count +
                '" class="form-control input-sm number_only order_item_price" /></td>';

            html_code += '<input type="hidden" name="cost[]" id="cost' +
                count + '" data-srno="' + count +
                '" class="form-control input-sm number_only cost" readonly />';

            html_code += '<input type="hidden" name="sub_cost[]" id="sub_cost' +
                count + '" data-srno="' + count +
                '" class="form-control input-sm number_only sub_cost" readonly />';

            html_code +=
                '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount' +
                count + '" data-srno="' + count +
                '" class="form-control input-sm order_item_actual_amount" readonly /></td>';

            html_code +=
                '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount' +
                count + '" data-srno="' + count +
                '" readonly class="form-control input-sm order_item_final_amount" /></td>';

            html_code += '<td><button type="button" name="remove_row" id="' + count +
                '" class="btn btn-danger btn-xs remove_row">X</button></td>';

            html_code += '</tr>';
            $('#order-item-table').append(html_code);
            getProduct();
        });

        $(document).on('click', '.remove_row', function() {
            var row_id = $(this).attr("id");
            var total_item_amount = $('#order_item_final_amount' + row_id).val();
            var final_amount = $('#final_total_amt').text();
            var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
            $('#final_total_amt').text(result_amount);
            $('#row_id_' + row_id).remove();
            count--;
            $('#total_item').val(count);
        });

        function cal_final_total(count) {
            var final_item_total = 0;
            var totalAll = 0;
            var delivery_fee = $('.delivery_fee').val();

            for (j = 1; j <= count; j++) {
                var quantity = 0;
                var price = 0;
                var actual_amount = 0;
                var item_total = 0;
                quantity = $('#order_item_quantity' + j).val();
                if (quantity > 0) {
                    price = $('#order_item_price' + j).val();
                    $('#sub_cost' + j).val(quantity * $('#cost' + j).val());
                    if (price > 0) {
                        actual_amount = parseFloat(quantity) * parseFloat(price);
                        $('#order_item_actual_amount' + j).val(actual_amount);
                        item_total = parseFloat(actual_amount);
                        final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                        $('#order_item_final_amount' + j).val(item_total);
                    }
                }
            }
            if (delivery_fee == 0) {
                $('#final_total_amt').val(final_item_total);
            } else {
                totalAll = parseFloat(final_item_total) + parseFloat(delivery_fee);
                $('#final_total_amt').val(totalAll);
            }
        }

        function getProduct() {
            $.ajax({
                url: '<?php echo base_url() ?>sale/C_sale_sale/getProduct',
                method: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    $('.pid').append(data);
                }
            });
        }

        function cal_totalCost(count) {
            totalCost = 0;
            final_total_cost = 0;
            var delivery_fee = $('.delivery_fee').val();
            if ($('.sub_cost').val() == '') {
                $('#total_cost').val(totalCost);
            } else {
                for (var n = 1; n <= count; n++) {
                    var cost = 0;
                    cost = $('#sub_cost' + n).val();
                    totalCost += parseFloat(cost);
                }
                if (delivery_fee == 0) {
                    $('#total_cost').val(totalCost);
                } else {
                    final_total_cost = parseFloat(totalCost) + parseFloat(delivery_fee);
                    $('#total_cost').val(final_total_cost);
                }
            }
        }

        function getIncome() {
            var total_cost = $('.total_cost').val();
            var grand_total = $('.final_total_amt').val();
            var total_income = 0;
            total_income = parseFloat(grand_total) - parseFloat(total_cost);
            $('#total_income').val(total_income);
        }

        $(document).on('blur', '.order_item_price ', function() {
            cal_final_total(count);
            cal_totalCost(count);
            getIncome();
        });

        $('.order_item_quantity').change(function() {
            cal_final_total(count);
            cal_totalCost(count);
        });

        $('#order-item-table').delegate('.order_item_quantity', 'blur', function(e) {
            e.preventDefault();
            var tr = $(this).parent().parent();
            var qty = tr.find('.order_item_quantity').val();
            var productid = tr.find('.pid').val();
            $.ajax({
                url: '<?php echo base_url() ?>sale/C_sale_sale/countQty',
                method: 'get',
                dataType: 'JSON',
                data: {
                    productid: productid,
                    qty: qty
                },
                success: function(data) {
                    if (data.error) {
                        alert(data.message);
                        tr.find('.order_item_quantity').val(data.current_qty);
                        tr.find('.sub_cost').val(0);
                    }
                    cal_final_total(count);
                    cal_totalCost(count);
                    getIncome();
                }
            });
        });


        $('#order-item-table').delegate('.pid', 'change', function(e) {
            e.preventDefault();
            var productid = $(this).val();
            var tr = $(this).parent().parent();
            $.ajax({
                url: '<?php echo base_url(); ?>sale/C_sale_sale/getCostProduct',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    productid: productid
                },
                success: function(data) {
                    tr.find('.cost').val(data.cost);
                    calculate(0, 0);
                }
            });
        });

        $('#create_invoice').click(function() {
            for (var no = 1; no <= count; no++) {
                if ($('#product_name' + no).val() == 0) {
                    alert("Please Select Product");
                    return false;
                }

                if ($.trim($('#order_item_quantity' + no).val()).length == 0) {
                    alert("Please Enter Quantity");
                    $('#order_item_quantity' + no).focus();
                    return false;
                }

                if ($.trim($('#order_item_price' + no).val()).length == 0) {
                    alert("Please Enter Price");
                    $('#order_item_price' + no).focus();
                    return false;
                }

            }

            $('#invoice_form').submit();

        });

    });
    </script>
</body>

</html>