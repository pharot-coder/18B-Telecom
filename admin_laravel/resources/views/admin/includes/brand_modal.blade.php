<!-- Description -->
<div class="modal fade" id="edit_brand_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="brandname"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action=" {{ route('edit_data') }} " method="POST" id="edit_data_form" >

                {{ csrf_field() }}
                
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for=""> <b>Brand Name:</b></label>
                    <input type="text" name="brandname" id="brandname" class=" form-control brandname">
                </div>
                <input type="hidden" class="brandid" name="brandid" >
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-success" type="submit" id="update_btn" name="update"> <i class="fa fa-edit" ></i> Update</button>
            </div>
</form>
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
            <form action="{{ route('destroyBrand') }}" method="POST" >

                {{ csrf_field() }}

            <div class="modal-body">
                <div class="form-group">
                    <div class="text-center">
                        <p>Are you sure to delete</p>
                        <h5 class="brandname"></h5>
                    </div>
                </div>
                <input type="hidden" name="brandid" class="brandid">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger"> <i class="fa fas-trash" ></i> Delete </button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editphoto_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="brandname"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="">
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
<div class="modal fade" id="editstatus_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="brandname"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action=" {{route(('edit_status_brand'))}} " method="POST" >
                {{ csrf_field() }}
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="status"> <strong> Status: </strong> </label>
                    <select name="status" class="form-control editstatus" id="editstatus">
                        <option value="1"> Active </option>
                        <option value="0"> Deactive </option>
                    </select>
                    <input type="hidden" name="brandid" class="brandid">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <button class="btn btn-success" > Update </button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    $(function(){
       
    });
</script>