<!-- The Modal -->
<div class="modal fade" id="DeleteModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span> Deleting....</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php
            $arr_form = array('class' => 'form-horizontal', 'method' => 'POST');
            echo form_open('admin/C_Supplier/DeleteData', $arr_form);
            ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="text-center">
                    <h3 class="name"></h3>
                </div>
                <input type="hidden" name="supplierid" class="supplierid">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-danger', 'name' => 'delete', 'value' => 'Delete']) ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>