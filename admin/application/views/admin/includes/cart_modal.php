<!-- The Modal -->
<div class="modal fade" id="updateqtymodal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span> Updating....</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php
            $arr_form = array('class' => 'form-horizontal', 'method' => 'post');
            echo form_open('admin/Cart_Con/UpdateQTY', $arr_form); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="qty"> <b>Quantity:</b> </label>
                    <input type="text" name="qty" id="qty" class="form-control" placeholder="Enter Quantity Value"
                        required>
                    <?php echo form_error('qty', '<div class="error text-danger">', '</div>'); ?>
                </div>
                <input type="hidden" name="cart_id" class="cart_id">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-success', 'name' => 'updateqty', 'value' => 'Update']); ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>