<div class="modal fade" id="editphoto">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name">Change Profile Photo</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo form_open('admin/C_profile_setting/editPhoto', ['method' => 'post', 'enctype' => '']) ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="images"> <strong> Photo: </strong> </label>
                    <input type="file" name="images" id="images" required>
                    <input type="hidden" name="userid" class="userid">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-success', 'value' => 'Change', 'name' => 'editphoto']) ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>