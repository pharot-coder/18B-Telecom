<!-- Regiser Modal -->
<!-- Modal -->
<div class="modal fade" id="orderdetailmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel">
                   <i class="fas fa-shopping-cart mr-2" ></i>   <b>Order Detail Infomation</b>
               </h3>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!--Body-->
        <div class="modal-body">
            <table id="orderdetailtable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
            <tbody id="orderdetailtbody" >

            </tbody>
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
        </table>
        <div class="text-right">
            Total: <span class="ordertotal" ></span>
        </div>
    </div>
    <!--/.Content-->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger " data-dismiss="modal"> <span><i class="fas fa-times"></i></span>  Close</button>
    </div>
</div>
</div>
</div>
<!-- Modal -->