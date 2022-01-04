<!-- Edit Profile Photo modal -->
<!-- Modal -->
<div class="modal fade" id="editpfilephotomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Change Profile Photo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="edit_userphoto.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-3" for="userphoto"><b>Photo:</b></label>
                    <input type="file" name="images" id="editphoto" class="form-control" required>
                </div>
                <input type="hidden" id="customerid" name="customerid" class="customerid" readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                <button type="submit" name="upload" class="btn btn-primary">Save Change </button>
            </div>
        </form>
    </div>
</div>
</div>