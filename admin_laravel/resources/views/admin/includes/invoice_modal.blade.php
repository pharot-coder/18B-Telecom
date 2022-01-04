<!-- The Modal -->

<div class="modal fade " id="deleteModal">
    <div class="modal-dialog ">
        <div class="modal-content ">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span> Deleting....</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('destroy_invoice') }}">
                {{ csrf_field() }}
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center">
                        <p class="text-center">Are You sure to want remove ?</p>
                    </div>
                    <input type="hidden" name="invoiceid" class="invoiceid">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-danger" name="delete"> <i class="fa fa-trash"></i> Remove
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--  Detail Order Modal -->
<div class="modal fade" id="viewInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 dark-grey-text" id="myModalLabel">
                    <i class="fas fa-file-invoice"></i> Invoice Detail
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <img src="/assets/img/logo/Logo-18B-Telecom.png" height="50" width="200" alt="">
                                </div>
                                <div class="card-body">
                                    <p> <i class="fa fa-map"></i> Address: ផ្ទះលេខ 51Eo ផ្លូវលេខ 432
                                        សង្កាត់ទូលទំពូង
                                        ខណ្ឌចំការមន
                                        រាជធានីភ្នំពេញ</p>
                                    <p> <i class="fa fa-phone"></i> Phone Number: 012 / 016 / 081 26 17 18</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6><i class="fas fa-file-invoice"></i> Invoice To</h6>
                                </div>
                                <div class="card-body">
                                    <p> <i class="fas fa-file-invoice"></i> Invoice No: <span
                                            class="invoiceid"></span>
                                    </p>
                                    <p> <i class="fas fa-shopping-cart"></i> Order No: <span id="orderid"></span> </p>
                                    <p> <i class="fas fa-calendar-minus"></i> Invoice Date: <span
                                            id="invoicedate"></span> </p>
                                    <p> <i class="fas fa-calendar-minus"></i> Order Date: <span id="orderdate"></span>
                                    </p>
                                    <p> <i class="fa fa-user"></i> Customer Name: <span id="customername"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered" id="InvoiceDetailTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="th-sm">#
                                    </th>
                                    <th class="th-sm">Product Name
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
                                    <th>Price
                                    </th>
                                    <th>QTY
                                    </th>
                                    <th>Subtotal
                                    </th>
                                </tr>
                            </tfoot>
                            <tbody id="invoiceDeatil">
                            </tbody>
                        </table>
                    </div>

                    <div class="text-right mt-4">
                        Total: <span id="grandtotal" class="grandtotal"></span>
                    </div>
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
