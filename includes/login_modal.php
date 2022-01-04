<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign
                        in</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mx-4">
                <!--Body-->
                <form method="GET" action="login_verify.php">
                    <div class="md-form mb-5">
                        <input type="email" id="Form-email1" name="email" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="Form-email1">Your email</label>
                    </div>

                    <div class="md-form pb-3">
                        <input type="password" name="password" id="Form-pass1" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
                        <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#"
                                class="blue-text ml-1">
                                Password?</a></p>
                    </div>

                    <div class="text-center mb-3">
                        <input type="submit" name="login" class="btn blue-gradient btn-block btn-rounded z-depth-1a"
                            value="Login" />
                    </div>
                </form>
                <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in
                    with:</p>

                <div class="row my-3 d-flex justify-content-center">
                    <!--Facebook-->
                    <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i
                            class="fab fa-facebook-f text-center"></i></button>
                    <!--Twitter-->
                    <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i
                            class="fab fa-twitter"></i></button>
                    <!--Google +-->
                    <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i
                            class="fab fa-google-plus-g"></i></button>
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="#"
                        class="blue-text ml-1" id="notmemberbutton">
                        Sign Up</a></p>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal -->



<!-- Regiser Modal -->
<!-- Modal -->
<div class="modal fade" id="registermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel">
                    <strong>Register</strong>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mx-4">
                <!--Body-->
                <form>
                    <div class="md-form">
                        <input type="text" id="Form-fname" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="Form-email1">First Name</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="Form-lname" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="Form-email1">Last Name</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="Form-lname" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="Form-email1">User Name</label>
                    </div>
                    <div class="md-form">
                        <input type="email" id="Form-email1" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="Form-email1">Your email</label>
                    </div>
                    <div class="md-form">
                        <input type="password" id="Form-pass1" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="Form-pass1"> password</label>
                        <!--  <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#"
                                class="blue-text ml-1">
                                Password?</a></p> -->
                    </div>
                    <div class="md-form">
                        <input type="password" id="Form-pass1" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="Form-pass1">Confirm password</label>
                        <!--  <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#"
                                class="blue-text ml-1">
                                Password?</a></p> -->
                    </div>

                    <div class="text-center mb-3">
                        <button type="button" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Sign
                            in</button>
                    </div>
                </form>
                <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in
                    with:</p>

                <div class="row my-3 d-flex justify-content-center">
                    <!--Facebook-->
                    <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i
                            class="fab fa-facebook-f text-center"></i></button>
                    <!--Twitter-->
                    <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i
                            class="fab fa-twitter"></i></button>
                    <!--Google +-->
                    <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i
                            class="fab fa-google-plus-g"></i></button>
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="#"
                        class="blue-text ml-1">
                        Sign Up</a></p>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal -->