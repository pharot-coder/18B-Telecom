<!-- Description -->
<div class="modal fade" id="address_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="customername"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p class="addr"></p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span> Deleting....</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="{{ route('destroy_customer') }}">
                <!-- Modal body -->
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Are You want to sure to delete ?</h5>
                        <h3 class="customername"></h3>
                    </div>
                    <input type="hidden" name="customerid" class="customerid">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-danger btn-flat pull-right" name="delete"><i
                            class="fa fa-trash"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Status Modal -->
<div class="modal fade" id="statusmodal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="customername"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="{{ route('edit_customer_status') }}">
                {{ csrf_field() }}
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status"> <strong> Status: </strong> </label>
                        <select name="status" class="form-control status" id="status">
                            <option value="1"> Active </option>
                            <option value="0"> Deactive </option>
                        </select>
                        <input type="hidden" name="customerid" class="customerid">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-success btn-flat pull-right" name="delete"><i
                            class="fa fa-edit"></i> Update </button>
                </div>
            </form>
        </div>
    </div>
</div>
