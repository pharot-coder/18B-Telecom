<div class="modal fade" id="editphoto">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"> Change Product Photo </span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo form_open('admin/Product_Con/uploadPhoto', ['method' => 'post', 'enctype' => 'multipart/form-data']) ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="images"> <strong> Photo: </strong> </label>
                    <input type="file" name="images" id="images" required>
                    <input type="hidden" name="productid" class="productid" value="<?php echo $productid ?>">
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

<div class="modal fade" id="editphotogallery">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo form_open('admin/Product_Con/uploadPhotos', ['method' => 'post', 'enctype' => 'multipart/form-data']) ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="images"> <strong> Photos: </strong> </label>
                    <input type="file" name="galleryimages[]" id="galleryimages" required="Choose photos upload"
                        multiple="multiple">
                    <input type="hidden" name="productid" class="productid" value="<?php echo $productid ?>">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-success', 'value' => 'Upload', 'name' => 'upload']) ?>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>



<div class="modal fade" id="deletePhotoGalModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span class="name">Deleting.....</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo form_open('admin/Product_Con/delPhotoGallery', ['method' => 'post', 'enctype' => 'multipart/form-data']) ?>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <h5 class="text-center"> <i class="fas fa-trash"></i> Are you to remove all photos ? </h5>
                    <input type="hidden" name="productid" class="productid" value="<?php echo $productid ?>">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <?php echo form_submit(['class' => 'btn btn-danger', 'value' => 'Remove', 'name' => 'remove']) ?>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>