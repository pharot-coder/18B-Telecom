<!-- Description -->
<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p class="desc"></p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span> Deleting....</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo form_open('admin/C_banner/destroy', ['method' => 'post']) ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="text-center">
                    <h3 class="name"></h3>
                </div>
                <input type="hidden" name="sliderid" class="sliderid">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-danger', 'value' => 'Delete', 'name' => 'delete']); ?>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>


<div class="modal" id="editphoto">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>admin/Category_Con/UpdatePhoto">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="images"> <strong> Photo: </strong> </label>
                        <input type="file" name="images" id="images" required>
                        <input type="hidden" name="categoryid" class="categoryid">
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

<!-- Status Modal -->
<div class="modal fade" id="statusmodal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name">Edit Status</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo form_open('admin/C_banner/editStatus', ['method' => 'post']) ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="status"> <strong> Status: </strong> </label>
                    <select name="status" class="form-control status" id="status">
                        <option value="1"> Active </option>
                        <option value="0"> Deactive </option>
                    </select>
                    <input type="hidden" name="sliderid" class="sliderid">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['name' => 'save', 'class' => 'btn btn-success', 'value' => 'Update']) ?>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>