<?php include('includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/header.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>

    <!-- Sidebar -->
    <div id="wrapper" class="wrapper" >

        <?php include 'includes/sidenav.php'; ?>

        <div id="content-wrapper" class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">All Products</li>
                </ol>
            </nav>
            <a href="#" id="sidebarshowBtn"  ><i class="fas fa-bars"></i></a>
            <div class="container">
                <div class="d-flex justify-content-end">
                    <div class="btn-group">
                        <button class="btn btn-sm" id="btnlist" ><i class="fa fa-bars"></i> </button> 
                        <button class="btn btn-sm" id="btngrid" ><i class="fa fa-th-large"></i> </button>
                    </div>
                </div>
                <section class="text-center">
                    <!-- Section heading -->
                    <h3 class="h2-responsive font-weight-bold text-left">All Products</h3>
                    <hr>
                    <div class="d-flex justify-content-end" >


                    </div>
                    <div class="row productrow">

                        <?php
                        try {
                            $limit = 12;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start = ($page - 1) * $limit;
                            $sqlproduct =  "SELECT * from tblproduct WHERE `status`=1 LIMIT $start, $limit ";
                            $res = $mysqli->query($sqlproduct);
                            while ($row = $res->fetch_assoc()) {
                                echo '
                                <div class="col-lg-3 col-md-6 mb-md-6 mb-4 ">
                                <!-- Card -->
                                <div class="card hoverable align-items-center product-grid">
                                <div class="view overlay zoom">
                                <img src="assets/img/' . $row['images'] . '" height="300"
                                class="card-img-top" alt="' . $row['productname'] . '">
                                </div>

                                <div class="card-body text-center">
                                <h5>
                                <strong>
                                <a href="product_detail.php?productid=' . $row['productid'] . '" class="dark-grey-text"> ' . $row['productname'] . '
                                </a>
                                </strong>
                                </h5>

                                <h4 class="font-weight-bold blue-text">
                                <strong> &#36;  ' . number_format($row['price'], 2) . ' </strong>
                                </h4>
                                </div>
                                </div>
                                </div>

                                <div class="product-list-view">
                                <img src="assets/img/' . $row['images'] . '" class="product-list-img" alt="">
                                <div class="product-list-body">
                                <h5>' . $row['productname'] . '</h5>
                                <p>
                                
                                </p>
                                <p><strong> &#36;  ' . number_format($row['price'], 2) . ' </strong></p>
                                <a href="product_detail.php?productid=' . $row['productid'] . '" class="btn btn-primary btn-sm">Read More....</a>
                                </div>
                                </div>

                                ';
                            }
                        } catch (Exception $e) {
                            echo "This is problem" . $e->getMessage();
                        }

                        $sql1 = "SELECT * FROM tblproduct";
                        $result1 = $mysqli->query($sql1);
                        $totalpage = mysqli_num_rows($result1);
                        $pages = ceil( $totalpage / $limit );
                        $Previous = $page - 1;
                        $Next = $page + 1;
                        ?>

                    </div>
                </section>
                <div class="d-flex justify-content-md-end">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-circle pg-amber">
                            <?php

                            if($Previous == 0){
                                echo '
                                <li class="page-item disabled">
                                <a class="page-link" tabindex="-1">Previous</a>
                                </li>
                                ';
                            }else{
                                echo '
                                <li class="page-item ">
                                <a href="allproducts.php?page='.$Previous.'" class="page-link" tabindex="1">Previous</a>
                                </li>
                                ';
                            }
                            ?>
                            <?php for($i = 1; $i <= $pages; $i++){
                               if ($i == $page) {
                                $active = "active";
                            }else{
                                $active = "";
                            }

                            echo '
                            <li class="page-item '.$active.' "><a class="page-link" href="allproducts.php?page='.$i.'" > '.$i.' </a></li>
                            ';
                        } 

                        ?>

                        <?php 
                        if($page != $pages){
                            echo '
                            <li class="page-item ">
                            <a href="allproducts.php?page='.$Next.'" class="page-link">Next</a>
                            </li>
                            ';
                        }else{
                            echo '
                            <li class="page-item disabled">
                            <a href="allproducts.php?page='.$Next.'" class="page-link">Next</a>
                            </li>
                            ';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
    </div>
</div>


<?php
include("includes/logout_modal.php");
include('includes/footer.php');
include('includes/scripts.php');
?>

<script type="text/javascript">

    $(function(){

        var i;

        $(document).on('input change','#filterprice',function(){
            var minprice = $('#minprice').html();
            var maxprice = $('#maxprice');
            var filterprice = $('#filterprice').val();
            maxprice.html(filterprice);
            maxprice = filterprice;
            pricefilter(minprice,maxprice);
        });

    });

    function pricefilter(minprice,maxprice){
     $.ajax({
        url: 'filterprice.php',
        method: 'GET',
        dataType: 'JSON',
        data: {
            minprice: minprice,
            maxprice:  maxprice
        },
        beforeSend: function() {
            $('.productrow').html("<img src='assets/img/loadingSpinner.gif' id='ajaxloading'/>");
            $('.pagination').hide();
        },
        success: function(response){
            $('.productrow').html(response);
            $('.pagination').show();
        }
    });
 }
</script>

</body>

</html>