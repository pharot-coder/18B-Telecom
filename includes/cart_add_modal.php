<!-- Cart Delete Modal -->
<div class="modal fade" id="cartaddmodalerror" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-notify modal-danger">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="heading lead" id="exampleModalLabel"><i class='fa fa-shopping-cart'
                style='font-size:30px'></i> <span>CART</span></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-times fa-4x mb-3"></i>
                <div class="alert alert-danger" role="alert" style="display: none;">
                    <span class="message"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light " data-dismiss="modal"> <i class='fa fa-home'
                    style='font-size:16px'></i> <span>Continue Shopping</span> </button>
                    <?php 
                    if(!empty($_SESSION['CID'])){
                        echo '<a href="cart_view.php" name="cart_del" class="btn btn-info"><i class="fa fa-shopping-cart"
                        style="font-size:16px"></i> <span>View Your Cart</span>
                        </a>';
                    }else{
                        echo '<a href="./login.php"  class="btn btn-info"><i class="fa fa-user"
                        style="font-size:16px"></i> <span>Login</span>
                        </a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


    <!-- Cart Add Success Modal -->
    <div class="modal fade" id="cartaddmodalsuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="heading lead" id="exampleModalLabel"><i class='fa fa-shopping-cart'
                    style='font-size:30px'></i> <span>CART</span></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                  <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                  <div class="alert alert-danger" role="alert" style="display: none;">
                    <span class="message"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light " data-dismiss="modal"> <i class='fa fa-home'
                    style='font-size:16px'></i> <span>Continue Shopping</span> </button>
                    <?php 
                    if(!empty($_SESSION['CID'])){
                        echo '<a href="cart_view.php" name="cart_del" class="btn btn-info"><i class="fa fa-shopping-cart"
                        style="font-size:16px"></i> <span>View Your Cart</span>
                        </a>';
                    }else{
                        echo '<a href="./login.php"  class="btn btn-info"><i class="fa fa-user"
                        style="font-size:16px"></i> <span>Login</span>
                        </a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


    <!-- Cart Delete Modal -->
    <div class="modal fade" id="alertQTYmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="heading lead" id="exampleModalLabel"><i class='fa fa-shopping-cart'
                    style='font-size:30px'></i> <span>CART</span></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-times fa-4x mb-3"></i>
                    <div class="alert alert-danger" role="alert" style="display: none;">
                        <span class="message"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light " data-dismiss="modal"> <i class='fa fa-home'
                        style='font-size:16px'></i> <span>Continue Shopping</span> </button>
                    </div>
                </div>
            </div>
        </div>



