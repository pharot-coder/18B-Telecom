<!-- Status Modal -->
<div class="modal fade" id="statusmodal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php
            $arr_form = array('class' => 'form-horizontal', 'method' => 'post');
            echo form_open('admin/C_Customer/UpdateStatus', $arr_form) ?>
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
                <?php echo form_submit(['class' => 'btn btn-success', 'name' => 'updatestatus', 'value' => 'Save Chanage']) ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deletemodal">
    <div class="modal-dialog modal-notify modal-danger">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php
            $arr_form = array('class' => 'form-horizontal', 'method' => 'post');
            echo form_open('admin/C_Customer/deleteData', $arr_form) ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <h5 class="text-center text-danger">Are You want to delete ?</h5>
                    <p class="username text-center"></p>
                    <input type="hidden" name="customerid" class="customerid">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-danger', 'name' => 'delete', 'value' => 'Delete']) ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>



<!-- Status Modal -->
<div class="modal fade" id="addressmodal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p class="address"></p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editmodal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo form_open('admin/C_Customer/updateData', ['class' => 'form-horizontal', 'method' => 'post']) ?>
            <!-- Modal body -->
            <div class="modal-body">

                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" name="first_name" id="edit_first_name">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="firstname">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" id="edit_last_name">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" id="edit_uname">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="edit_email">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phonenumber">Phone Number:</label>
                            <input type="text" class="form-control" name="phonenumber" id="edit_phonenumber">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="edit_password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea name="address" class=" form-control address" rows="5"></textarea>
                </div>

                <input type="hidden" name="customerid" class="customerid">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-success', 'name' => 'updatestatus', 'value' => 'Save Chanage']) ?>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>