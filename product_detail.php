<?php include("includes/connect.php");
session_start();
$current_link = (isset($_SERVER['https']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/header.php"); ?>
    <style type="text/css" media="screen">
    .product-gallery{
        width: 100%;
        display: flex;
        display: -ms-flex;
        display: -webkit-flex;
        flex-direction: row;
        justify-content: flex-start;
        overflow: auto;
    }

    .product-gallery-row{
        height: 80px;
        width: 80px;
        margin: 5px;
    }

    .product-gallery-row:hover{
       border: 2px solid red;
   }

</style>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '508566810522503',
                autoLogAppEvents: true,
                xfbml: true,
                version: 'v9.0'
            });
        };
    </script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0"
    nonce="YekCu7OY"></script>
    <?php
    try {
        $sqlproductdetail = "SELECT p.*, c.categoryname from tblproduct as p left join tblcategory as c on p.categoryid = c.categoryid where productid =" . $_GET['productid'];
        $result = $mysqli->query($sqlproductdetail);
        $rowproduct = $result->fetch_array();
    } catch (Exception $e) {
        echo "This is a problem" . $e->getMessage();
    }
    $now = date('Y-m-d');
    if ($rowproduct['date_view'] == $now) {
        $sqlviewcount = "update tblproduct set counter=counter+1 where productid =" . $_GET['productid'];
        $mysqli->query($sqlviewcount);
    } else {
        $sqlviewcount = "update tblproduct set counter=1, date_view = '$now' where productid =" . $_GET['productid'];
        $mysqli->query($sqlviewcount);
    }
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="allproducts.php">All Prodcuts</a></li>
            <li class="breadcrumb-item active"><?php echo $rowproduct['categoryname'] ?></li>
        </ol>
    </nav>

    <div class="container">

        <div class="text-left">
            <h5><?php echo $rowproduct['productname'] ?></h5>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-5 mt-2 mb-4">

                <img src="assets/img/<?php echo $rowproduct['images'] ?>" alt="<?php echo $rowproduct['productname'] ?>"
                class="zoom" width="100%" height="400"
                data-magnify-src="admin/assests/images/<?php echo $rowproduct['images'] ?>">
                <br><br>

                <div class="product-gallery">
                    <?php 
                    $proid = $rowproduct['productid'];
                    try {
                        $sqlProGallery = "select * from tblproduct_images where productid = ".$proid;
                        $resProGallery = $mysqli->query($sqlProGallery);
                        while($rowproGallery  = $resProGallery->fetch_assoc())
                        {
                            echo '
                            <a href="assets/img/'.$rowproGallery['images'].'" data-lightbox="productgallery" data-title="'.$rowproduct['productname'].'" >
                            <img src="assets/img/'.$rowproGallery['images'].'" class="product-gallery-row"  alt="'.$rowproduct['productname'].'">
                            </a>
                            ';
                        }

                    } catch (Exception $e) {
                        echo 'Error'. $e->getMessage();
                    }
                    ?>
                </div>

                <hr>
                <form class="form-inline" method="POST" id="cart-form">
                    <div class="form-group ">
                        <div class="input-group col-sm-6">
                            <span class="input-group-btn">
                                <button type="button" data-id="<?php echo $rowproduct['productid']; ?>" id="minus" class="btn btn-default btn-sm"><i
                                    class="fa fa-minus"></i></button>
                                </span>
                                <input type="text" name="quantity" id="quantity" class="form-control text-center input-sm quantity" data-id="<?php echo $rowproduct['productid']; ?>" value="1">
                                <span class="input-group-btn">
                                    <button type="button" data-id="<?php echo $rowproduct['productid']; ?>" id="add" class="btn btn-default btn-sm "><i class="fa fa-plus"></i>
                                    </button>
                                </span>
                                <input type="hidden" value="<?php echo $rowproduct['productid']; ?>" name="productid"  >
                            </div>
                            <button type="submit" class="btn btn-primary btn-md btn-flat"><i
                                class="fa fa-shopping-cart"></i> Add to Cart</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-6 mt-2 mb-4">
                        <h5><?php echo $rowproduct['categoryname']; ?></h5>
                        <h5 class="text-danger font-weight-bold" > &#36; <?php echo number_format($rowproduct['price'], 2) ?></h5>
                        <h5>Views: <?php echo $rowproduct['counter']; ?></h5>
                        <h5  class="text-primary" >Description:</h5>
                        <?php echo $rowproduct['description'] ?>
                    </div>
                </div>

                <div class="row">
                   <div class="share-button-box mt-4">
                    <p> <i class="fas fa-share-alt"></i> SHARE</p>
                    <hr>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_link ?>" title="Share on  
                        Facebook" target="_blank" class="btn btn-primary btn-sm"><i class="fa 
                        fa-facebook"></i> Facebook </a>

                        <a class="btn btn-primary btn-sm" href="https://t.me/share/url?url=<?php echo $current_link ?>&text=<?php echo $rowproduct['productname'] ?>
                        "> <i class="fab fa-telegram-plane"></i> <span>Telegram</span> </a>
                    </div>
                </div>
                <div class="row">
                    <div class="fb-comments"
                    data-href="http://localhost:8888/18B-Telecom/product_detail.php?productid=<?php echo $rowproduct['productid']; ?>"
                    data-numposts="5" data-width="100%"></div>
                </div>
                <!-- Scroll to Top Button-->
                <a class="scroll-to-top" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>
            </div>
            <?php
            include("includes/logout_modal.php");
            include("includes/cart_add_modal.php");
            include('includes/footer.php');
            include('includes/scripts.php');
            ?>
            <script>
                $(function() {
                    $('#add').click(function(e) {
                        e.preventDefault();
                        var quantity = $('#quantity').val();
                        var productid = $(this).data('id');
                        quantity++;
                        $('#quantity').val(quantity);
                        countQTY(productid,quantity);
                    });
                    $('#minus').click(function(e) {
                        e.preventDefault();
                        var quantity = $('#quantity').val();
                        var productid = $(this).data('id');
                        if (quantity > 1) {
                            quantity--;
                        }
                        $('#quantity').val(quantity);
                    });

                    $('#quantity').blur(function(e){
                        e.preventDefault();
                        var quantity = $('#quantity').val();
                        var productid = $(this).data('id');
                        countQTY(productid,quantity);
                    });

                    $('#cart-form').on('submit', function(e) {
                        e.preventDefault();
                        var product = $(this).serialize();
                        $.ajax({
                            url: 'cart_add.php',
                            type: 'POST',
                            dataType: 'JSON',
                            data: product,
                            success: function(response) {
                                $('.alert').show();
                                $('.message').html(response.message);
                                if (response.error) {
                                    $('.alert').removeClass('alert-success').addClass(
                                        'alert-danger');
                                    $('#cartaddmodalerror').modal('show');
                                } else {
                                    $('.alert').removeClass('alert-danger').addClass(
                                        'alert-success');
                                    $('#cartaddmodalsuccess').modal('show');
                                    getCart();
                                }
                            }
                        });
                    });
                    $('.close').click(function() {
                        $('#alert').hide();
                    });
                });

                function countQTY(productid, quantity)
                {
                    $.ajax({
                        url: 'count_qty.php',
                        method: 'get',
                        dataType: 'JSON',
                        data: {
                            productid: productid,
                            quantity: quantity
                        },
                        success: function (data)
                        {
                           $('.alert').show();
                           $('.message').html(data.message);
                           if(data.error)
                           {
                               $('.alert').removeClass('alert-success').addClass(
                                'alert-danger');
                               $('#alertQTYmodal').modal('show');
                               $('#quantity').val(data.current_qty);
                           }
                       }
                   });
                }

            </script>

        </body>
        </html>