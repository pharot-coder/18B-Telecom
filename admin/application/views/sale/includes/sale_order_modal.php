<!-- Description -->
<div class="modal fade" id="placeModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="phone_number"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p class="place"></p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!--  Detail Order Modal -->
<div class="modal fade" id="sale_order_detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 dark-grey-text" id="myModalLabel">
                    <i class="fas fa-shopping-cart mr-2"></i> Detail Sale Order
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="sale_order_detail_table" width="100%" cellspacing="0">
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
                        <tbody id="sale_detailtbody">
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