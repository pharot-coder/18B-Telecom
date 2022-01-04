<!-- Status Modal -->
<div class="modal fade" id="orderstatusmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"> Edit Status Order </span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php
            $arr_form = array('class' => 'form-horizontal', 'method' => 'post');
            echo form_open('admin/C_order/UpdateStatus', $arr_form) ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="status"> <strong> Status: </strong> </label>
                    <select name="status" class="form-control status" id="editorderstatus">
                        <option value="1"> Processing </option>
                        <option value="2"> Completed </option>
                        <option value="3"> Refund </option>
                        <option value="4"> Canceled </option>
                    </select>
                    <input type="hidden" name="orderid" class="orderid">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-success', 'name' => 'update', 'value' => 'Update']); ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- User Detail Modal -->
<div class="modal fade" id="user_Modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="uname"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- Card -->
                <div class="card testimonial-card">

                    <!-- Background color -->
                    <div class="card-up indigo lighten-1"></div>

                    <!-- Avatar -->
                    <div class="avatar mx-auto white">
                        <img src="" class="rounded-circle" id="userphoto" width="200" height="200" alt="">
                    </div>

                    <!-- Content -->
                    <div class="card-body">
                        <!-- Name -->
                        <h4 class="card-title text-center uname"></h4>
                        <hr>
                        <!-- Quotation -->
                        <p><b>First Name:</b> <span class="fname"></span> </p>
                        <p><b>Last Name:</b> <span class="lname"></span> </p>
                        <p><b>Telephone:</b> <span class="phonenumber"></span> </p>
                        <p><b>Email:</b> <span class="email"></span> </p>
                        <p><b>Address:</b> <span class="address"></span> </p>
                    </div>

                </div>
                <!-- Card -->
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!--  Detail Order Modal -->
<div class="modal fade" id="orderdetailmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text" id="myModalLabel">
                    <i class="fas fa-shopping-cart mr-2"></i> Detail Product Order
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="order_detail_table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="th-sm">#
                                </th>
                                <th class="th-sm">Product Name
                                </th>
                                <th class="th-sm">Photo
                                </th>
                                <th class="th-sm">Price
                                </th>
                                <th class="th-sm">QTY
                                </th>
                                <th class="th-sm">Subtotal
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#
                                </th>
                                <th>Product Name
                                </th>
                                <th>Photo
                                </th>
                                <th>Price
                                </th>
                                <th>QTY
                                </th>
                                <th>Subtotal
                                </th>
                            </tr>
                        </tfoot>
                        <tbody id="orderdetailtbody">
                        </tbody>
                    </table>
                </div>

                <div class="text-right mt-4">
                    Total: <span class="grandtotal"></span>
                </div>
            </div>
            <!--/.Content-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal"> <span><i
                            class="fas fa-times"></i></span> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!--  Detail Order Modal -->
<div class="modal fade" id="createInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text" id="myModalLabel">
                    <i class="fas fa-shopping-cart mr-2"></i> Detail Product Order
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="order_detail_table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="th-sm">#
                                </th>
                                <th class="th-sm">Product Name
                                </th>
                                <th class="th-sm">Photo
                                </th>
                                <th class="th-sm">Price
                                </th>
                                <th class="th-sm">QTY
                                </th>
                                <th class="th-sm">Subtotal
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#
                                </th>
                                <th>Product Name
                                </th>
                                <th>Photo
                                </th>
                                <th>Price
                                </th>
                                <th>QTY
                                </th>
                                <th>Subtotal
                                </th>
                            </tr>
                        </tfoot>
                        <tbody id="orderdetailtbody">
                        </tbody>
                    </table>
                </div>

                <div class="text-right mt-4">
                    Total: <span class="grandtotal"></span>
                </div>
            </div>
            <!--/.Content-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal"> <span><i
                            class="fas fa-times"></i></span> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->