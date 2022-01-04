<div class="most-view-text mt-4">
    <div class="text-center mt-2">
      <h5> <span><i class="fas fa-dollar-sign"></i></span> Top Seller</h5>
  </div>
</div>
<hr>
<div class="owl-carousel owl-theme">
    <?php
    $month  = date('m');
    try {
        $sql = "SELECT p.productid,p.productname,p.price,p.images,od.productid as prodid ,SUM(od.qty) as TotalQuantity FROM tblproduct as p LEFT JOIN tblorder_detail as od on p.productid = od.productid LEFT JOIN tblorder as o 
        on od.orderid = o.orderid GROUP BY p.productid  ORDER BY TotalQuantity DESC LIMIT 6";
        $res = $mysqli->query($sql);
        while ($row = $res->fetch_assoc()) {
            echo '
            <a href="product_detail.php?productid=' . $row['productid'] . '">
            <div class="item">
            <div class="img-fluid">
            <img class="responsive" src="assets/img/' . $row['images'] . '" alt="' . $row['productname'] . '">
            </div>
            </div>
            </a>
            ';
        }
    } catch (Exception $e) {
        echo "This is problem connection" . $e->getMessage();
    }
    ?>
</div>