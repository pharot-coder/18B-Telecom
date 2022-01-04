<!-- Regiser Modal -->
<!-- Modal -->
<div class="modal fade" id="editaccmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel">
                    <strong>Account Infomation</strong>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <!--Body-->
                <form class="form-horizontal" action="#">
                    <div class="form-group">
                        <label for="fname" class="mr-sm-2">First Name:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="editfname">

                        <label for="lname" class="mr-sm-2">Last Name:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="editlname">
                    </div>

                    <div class="form-group mt-2">
                        <label for="uname" class="mr-sm-2">User Name:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="edituname">

                        <label for="phone" class="mr-sm-2">Phone:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="editphone">
                    </div>

                    <div class="form-group mt-2">
                        <label for="email" class="mr-sm-2">Email:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="editemail">

                    </div>

                    <div class="form-group mt-2">
                        <label for="address" class="mr-sm-2">Address:</label>
                        <textarea name="address" id="editaddress" class="form-control" rows="3"></textarea>

                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-success" type="submit" name="save_edit">Save Change</button>
                    </div>
                </form>
            </div>
            <!--/.Content-->
        </div>
    </div>
</div>
<!-- Modal -->