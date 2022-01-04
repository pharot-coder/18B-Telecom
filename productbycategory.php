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
  <div class="wrapper">
    <?php include 'includes/sidenav.php'; ?>
    <div class="content-wrapper">
      <!-- Sidebar -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $_GET['categoryname']; ?></li>
        </ol>
      </nav>
      <a href="#" id="sidebarshowBtn"  ><i class="fas fa-bars"></i></a>

      <div class="container d-flex-justify-content-center mt-4 mb-4">
        <div class="d-flex justify-content-end">
          <div class="btn-group">
           <button class="btn btn-sm" id="btnlist" ><i class="fa fa-bars"></i> </button> 
           <button class="btn btn-sm" id="btngrid" ><i class="fa fa-th-large"></i> </button>
         </div>
       </div>
       <div class="text-left">
        <h5> Category: <?php echo $_GET['categoryname']; ?> </h5>
      </div>
      <hr>
      <div class="row productrow">
        <?php
        $limit = 12;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $categoryname = $_GET['categoryname'];
        try {
          $sqlproduct = "select p.*,c.categoryname from tblproduct as p inner join tblcategory as c on p.categoryid = c.categoryid where c.categoryname = '" . $categoryname . "' and p.status = 1 LIMIT $start, $limit";
          $res = $mysqli->query($sqlproduct);
          while ($row = $res->fetch_assoc()) {
            echo '
            <div class="col-lg-3 col-md-6 mb-md-6 mb-4">
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
            <p><strong> &#36;  ' . number_format($row['price'], 2) . ' </strong></p>
            <a href="product_detail.php?productid=' . $row['productid'] . '" class="btn btn-primary btn-sm">Read More....</a>
            </div>
            </div>

            ';
          }
        } catch (Exception $e) {
          echo "This is problem" . $e->getMessage();
        }
        $sql1 = "select p.*,c.categoryname from tblproduct as p inner join tblcategory as c on p.categoryid = c.categoryid where c.categoryname = '" . $categoryname . "' and p.status = 1";
        $result1 = $mysqli->query($sql1);
        $totalpage = mysqli_num_rows($result1);
        $pages = ceil( $totalpage / $limit );
        $Previous = $page - 1;
        $Next = $page + 1;

        ?>

      </div>

      <!-- Pagination-->
      <div class="d-flex justify-content-center">
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
              <a href="productbycategory.php?categoryname='.$categoryname.'&page='.$Previous.'" class="page-link" tabindex="1">Previous</a>
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
            <li class="page-item '.$active.' "><a class="page-link" href="productbycategory.php?categoryname='.$categoryname.'&page='.$i.'" > '.$i.' </a></li>
            ';
          } 

          ?>

          <?php 
          if($page != $pages){
            echo '
            <li class="page-item ">
            <a href="productbycategory.php?categoryname='.$categoryname.'&page='.$Next.'" class="page-link">Next</a>
            </li>
            ';
          }else{
            echo '
            <li class="page-item disabled">
            <a class="page-link">Next</a>
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

    $(document).on('input change','#filterprice',function(){
      var minprice = $('#minprice').html();
      var maxprice = $('#maxprice');
      var categoryname = '<?php echo $categoryname ?>';
      var filterprice = $('#filterprice').val();
      maxprice.html(filterprice);
      maxprice = filterprice;
      pricefilter(minprice,maxprice,categoryname);
    });

  });

  function pricefilter(minprice,maxprice,categoryname){
   $.ajax({
    url: 'pricefilterbyCategory.php',
    method: 'GET',
    dataType: 'JSON',
    data: {
      minprice: minprice,
      maxprice:  maxprice,
      categoryname: categoryname
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