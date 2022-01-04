<!-- Status Modal -->
<div class="modal fade" id="orderstatusmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"> Edit Status Order </span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('update_status_order') }}" method="POST">
                {{ csrf_field() }}
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
                    <button class="btn btn-success" type="submit" name="save"> <i class="fa fa-edit"></i> Save
                        Change</button>
            </form>
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
                    <table class="table table-bordered" id="orderdetail_table" width="100%" cellspacing="0">
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
{{-- <div class="modal fade" id="createInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
</div> --}}


<!-- Export PDF Modal -->
<div class="modal fade " id="export_pdf_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"> Export PDF </span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('generate_orderPDF') }}" id="form_export_to_pdf" method="GET">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        {{-- <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="exportradio1" checked="checked" name="exportPDF"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">All</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="exportPDFbyDate2" name="exportPDF" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2"> By Date </label>
                        </div> --}}
                        <label for="export_pdf"> Export </label>
                        <select class="form-control mb-3" id="export_pdf">
                            <option value="Export All">All</option>
                            <option value="Export By Date">By Date</option>
                        </select>

                        <div class="input-daterange datepicker row align-items-center " id="export_pdf_filter_date">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control" name="start_date" id="export_start_date"
                                            type="text" placeholder=" Start Date">
                                    </div>
                                </div>
                            </div>
                            <p class="text-wieght-bold"><b>To:</b></p>
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control" name="end_date" id="export_end_date" type="text"
                                            placeholder="End Date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Close</button>
                    <button class="btn btn-success" type="submit" id="export_pdf_btn"> <i class="fa fa-edit"></i>
                        Export
                    </button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
