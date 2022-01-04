<div class="most-view-text mt-4">
    <div class="text-center mt-2">
        <h5> <span><i class="fas fa-eye"></i></span> Popular View</h5>
    </div>
</div>
<hr>
<div class="owl-carousel owl-theme">
    <?php
    try {
        $sqlview = "SELECT * from tblproduct ORDER BY counter asc LIMIT 8";
        $res = $mysqli->query($sqlview);
        while ($rowview = $res->fetch_assoc()) {
            echo '
            <a href="product_detail.php?productid=' . $rowview['productid'] . '">
            <div class="item">
            <div class="img-fluid">
            <img class="responsive" src="assets/img/' . $rowview['images'] . '" alt="' . $rowview['productname'] . '">
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