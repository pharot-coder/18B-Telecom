<?php include('includes/connect.php');
session_start();

$vistorIP = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d');

try {
    $sql = "insert into tblvisitor (visitor_ip, date) values ( '$vistorIP', '$date' ) ";
    $mysqli->query($sql);

} catch (Exception $e) {
    echo "This is errro".$e->getMessage();
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php include('includes/header.php') ?>
</head>

<body>
    <?php include('includes/navbar.php'); ?>

    <div class="container mt-2">
        <div class="row">
            <div class="col-sm-8 col-md-8">
                <!-- Banner -->
                <?php include('includes/carousel.php'); ?>
            </div>
            <div class=" col-sm-4 col-md-4">
                <?php include('includes/sidebar.php'); ?>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
    <div class="mt-2"></div>
    <div class="container">
        <!-- News jumbotron -->
        <div class="jumbotron text-center hoverable p-4">
            <div class="row">
                <div class="col-md-4 offset-md-1 mx-3 my-3">
                    <div class="view overlay">
                        <img src="assets/img/logo/Logo-18B-Telecom.png" alt="" width="100%" height="100%"
                        class="img-responsive">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                </div>

                <div class="col-md-7 text-md-left ml-3 mt-3">
                    <a href="#!" class="green-text">
                        <h6 class="h6 pb-1"><i class="fas fa-desktop pr-1"></i> Work</h6>
                    </a>

                    <h4 class="h4 mb-4"> <span><i class="fas fa-door-open"></i></span> Welcome to 18B-TELECOM</h4>
                    <h5 class="h5 mb-4"> លក់ និងជួសជុលវិទ្យុទាក់ទង តំឡើងប្រព័ន្ធវិភឺធឺរ </h5>
                </div>

            </div>

        </div>
    </div>
    <div class="container mb-5">
        <div class="category-text-box mt-2">
            <div class="text-center mt-2">
               <h5> <span> <i class="fas fa-list"></i></span> Categories</h5>
           </div>
       </div>
       <hr>
       <div class="row">
        <div class="list-group-box">
            <ul class="list-group list-group-horizontal-lg justify-content-center">
                <?php
                $sql = "select * from tblcategory where status = 1";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_array()) {
                    $categoryname = $row['categoryname'];
                    $sqlcount = "SELECT count(*) as productcount from tblproduct where categoryid =" . $row['categoryid'];
                    $rescount = $mysqli->query($sqlcount);
                    $rowcount = $rescount->fetch_assoc();
                    $total = $rowcount['productcount'];
                    if ($total > 0) {
                        echo '
                        <a href="productbycategory.php?categoryname=' . $row['categoryname'] . ' ">
                        <li class="list-group-item"> ' . $categoryname . ' <span class="badge rounded-pill badge-notification bg-primary"> ' . $total . '</span></li>
                        </a>
                        ';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <?php include 'most_seller.php'; ?>
    <?php include("most_view.php"); ?>
    <?php include("our_brand.php"); ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>
<?php
include("includes/logout_modal.php");
include('includes/footer.php');
include('includes/scripts.php');
?>
</body>

</html>