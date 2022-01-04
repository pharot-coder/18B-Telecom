<!-- The Modal -->
<div class="modal fade" id="qty_cartModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span> Updating....</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action=" {{ route('update_cart') }} " method="POST">
                {{ csrf_field() }}
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="qty"> <b>Quantity:</b> </label>
                        <input type="text" name="qty" id="qty" class="form-control qty"
                            placeholder="Enter Quantity Value" required>
                    </div>
                    <input type="hidden" name="cart_id" class="cart_id">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Close</button>
                    <button class="btn btn-success" type="submit" name="updateCart">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
