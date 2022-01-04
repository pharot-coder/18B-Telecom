<!-- Cart Delete Modal -->
<div class="modal fade" id="cartdelmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Deleting......</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="cart_del.php" method="post">
            <div class="modal-body">
                <div class="text-center">
                    <p>Are You sure to want delete from cart ?</p>
                    <h3 class="productname"></h3>
                </div>
                <input type="hidden" name="cart_id" id="cart_id" class="cart_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                <button type="submit" name="cart_del" class="btn btn-danger"> <i class="fa fa-trash"
                    style="font-size: 16px;"></i>
                Delete</button>

            </div>
        </form>

    </div>
</div>
</div>
</div>


<!-- QTY Alert -->
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
                    style='font-size:16px'></i> <span>Continue Cart</span> </button>
                </div>
            </div>
        </div>
    </div>
