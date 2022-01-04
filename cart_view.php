<?php
include("includes/connect.php");
session_start();
if (empty($_SESSION['CID'])) {
    header('location: http://localhost:8888/18B-Telecom/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/header.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php") ?>
    <div class="container">
        <div class="text left mt-4">
            <h3>Your Cart <span><i class='fa fa-shopping-cart' style='font-size:30px'></i></span> </h3>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-9">
                <div class="cart-form">
                    <table id="carttable" class="table table-striped table-bordered table-sm" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="200">Name</th>
                            <th>Photo</th>
                            <th>Price</th>
                            <th width="180" class="text-center">QTY</th>
                            <th class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th width="200">Name</th>
                            <th>Photo</th>
                            <th>Price</th>
                            <th width="180" class="text-center">QTY</th>
                            <th class="text-center">Subtotal</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="text-left">
               <span class="checkoutbtn" ></span>
           </div>
       </div>

   </div>
   <?php include("most_view.php"); ?>

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
</div>

<?php
include("includes/footer.php");
include('includes/cart_modal.php');
?>
<?php
include("includes/logout_modal.php");
include('includes/scripts.php');
?>
<script>

    $(function() {

       carttotal();
       getDetails();

       $(document).on('click', '.cartdel', function(e) {
        e.preventDefault();
        $('#cartdelmodal').modal('show');
        var cart_id = $(this).attr('data-id');
        getRow(cart_id);
    });

       $(document).on('click', '.add', function(e) {
        e.preventDefault();
        var $el = $(this).closest('tr');
        var cartid = $(this).data('id');
        var qty = $el.find('.qty').val();
        var productid = $el.find('.productid').val();
        qty++;
        $el.find('.qty').val(qty);
        $.ajax({
            url: 'cart_update.php',
            method: 'POST',
            dataType: "json",
            data: {
                cartid: cartid,
                qty: qty,
                productid: productid
            },
            success: function(data) {
             $('.alert').show();
             $('.message').html(data.message);
             if (data.error) {
               $('.alert').removeClass('alert-success').addClass(
                'alert-danger');
               $('#alertQTYmodal').modal('show');
               $el.find('.qty').val(data.current_qty);
           }else{
               getCart();
               carttotal();
               getDetails();
           }
       }
   });
    });

       $(document).on('click', '.minus', function(e) {
        e.preventDefault();
        var $el = $(this).closest('tr');
        var cartid = $(this).data('id');
        var qty = $el.find('.qty').val();
        var productid = $el.find('.productid').val();
        if (qty > 1) {
            qty--;
        }
        $el.find('.qty').val(qty);
        $.ajax({
            url: 'cart_update.php',
            method: 'POST',
            dataType: "json",
            data: {
                cartid: cartid,
                qty: qty,
                productid: productid
            },
            success: function(data) {
              if(!data.error)
              {
                getCart();
                carttotal();
                getDetails();
            }
        }
    });

    });

       $(document).on('blur', '.qty', function(e) {
        e.preventDefault();
        var $el = $(this).closest('tr');
        var cartid = $(this).data('id');
        var qty = $el.find('.qty').val();
        var productid = $el.find('.productid').val();
        $.ajax({
            url: 'cart_update.php',
            method: 'POST',
            dataType: "json",
            data: {
                cartid: cartid,
                qty: qty,
                productid: productid
            },
            success: function(data) {
             $('.alert').show();
             $('.message').html(data.message);
             if (data.error) {
               $('.alert').removeClass('alert-success').addClass(
                'alert-danger');
               $('#alertQTYmodal').modal('show');
               $el.find('.qty').val(data.current_qty);
           }else{
               getCart();
               carttotal();
               getDetails();
           }
       }
   });

    });
   });


    function getRow(cart_id) {
        $.ajax({
            url: 'cart_fetch.php',
            method: 'post',
            dataType: 'json',
            data: {
                cart_id: cart_id
            },
            success: function(response) {
                $('.productname').html(response.productname);
                $('.cart_id').val(response.cart_id);
            }
        });
    }

    function getDetails(){
        $.ajax({
            type: 'POST',
            url: 'cart_data.php',
            dataType: 'json',
            success: function(response){
             $('#tbody').html(response.cartdata);
             $('#carttable').DataTable();
             $('.checkoutbtn').html(response.checkoutbtn);
             getCart();
         }
     });
    }

    function carttotal(){
        $.ajax({
            url: 'cart_total.php',
            method: 'GET',
            dataType: 'JSON',
            success: function(response){
                $('.total').html(response.total.toFixed(2));
            }
        });
    }
</script>
</body>

</html>