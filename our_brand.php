<style>
    .item-brand {
        width: 100%;
        height: 100%;
        padding: 5px;
    }

    .img-fluid {
        width: 100%;
        height: 100%;
    }

    .brand-box {
        background-color: lightgray;
    }
</style>

<div class="brand-text-box">
    <div class="text-center mt-2">
        <h5> <span><i class="fas fa-list"></i></span> Our Brands</h5>
    </div>
</div>
<hr>
<div class="brand-box">
    <div class="owl-carousel owl-theme" id="our_brand">
        <?php
        try {
            $sqlstatement = "select * from tblbrand where status = 1";
            $result = $mysqli->query($sqlstatement);
            while ($rowbrand = $result->fetch_assoc()) {
               echo '
               <div class="item-brand">
               <div class="img-fluid">
               <div class="view overlay zoom">
               <a href="productbybrand.php?brandname='.$rowbrand['brandname'].'"  >
               <img class="rounded-circle" src="assets/img/'.$rowbrand['images'].'" alt="Motorola">
               </a>            
               </div>
               </div>
               </div>
               ';
           }

       } catch (Exception $e) {
        echo "This is a problem".$e->getMessage();
    }
    ?>

</div>
</div>