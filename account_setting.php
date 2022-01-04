
<div class="card">
    <div class="card-title  mt-4 mb-4 ml-4">
        <h5> <i class="fas fa-user" ></i>  Profile Setting</h5>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="edit_account_action.php" method="post" >
            <div class="form-group">
                <label for="fname" class="mr-sm-2">First Name:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="editfname" name="fname" value="<?php echo $rowuser['first_name'] ?>" >

                <label for="lname" class="mr-sm-2">Last Name:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="editlname" name="lname" value="<?php echo $rowuser['last_name'] ?>" >
            </div>

            <div class="form-group mt-2">
                <label for="uname" class="mr-sm-2">User Name:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="edituname" name="uname" value="<?php echo $rowuser['username'] ?>" >

                <label for="phone" class="mr-sm-2">Phone:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="editphone" name="phonenumber" value="<?php echo $phonenumber ?>" >
            </div>

            <div class="form-group mt-2">
                <label for="email" class="mr-sm-2">Email:</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="editemail" name="email" value="<?php echo $rowuser['email'] ?>" >

            </div>

            <div class="form-group mt-2">
                <label for="address" class="mr-sm-2">Address:</label>
                <textarea name="address" id="editaddress" class="form-control" name="address" rows="3"><?php echo $rowuser['address'] ?></textarea>

            </div>
            <div class="text-center">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit" name="change_submit">Save Change</button>
            </div>
        </form>
    </div>
</div>


