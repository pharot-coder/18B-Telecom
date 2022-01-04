
<ul class="sidebar navbar-nav toggled">
  <div class="d-flex justify-content-end">
    <a href="#" id="sidebarhideBtn"> <i class="fas fa-bars"></i></a>
  </div>
  <h4 class="text-left mt-4"><i class="fas fa-dollar-sign"></i>Filter Price</h4>
  <div class="filter-box d-flex justify-content-start">
    <form class="range-field" class="form-inline">
      <div class="form-row">
       <span id="minprice" >0</span>
       <input id="filterprice" class="border-0" type="range" min="0" max="200" />
       <span id="maxprice"></span>
     </div>
   </form>

 </div>
 <h4 class="text-left mt-4"><i class="fas fa-list"></i>Categories</h4>
 <?php
 $sql = "select * from tblcategory where status = 1";
 $result = $mysqli->query($sql);
 while ($row = $result->fetch_assoc()) {
  $categoryname = $row['categoryname'];
  $sqlcount = "SELECT count(*) as productcount from tblproduct where categoryid =" . $row['categoryid'];
  $rescount = $mysqli->query($sqlcount);
  $rowcount = $rescount->fetch_assoc();
  $total = $rowcount['productcount'];
  if ($total > 0) {
    echo '
    <li class="nav-item active"> 
    <a href="productbycategory.php?categoryname=' . $row['categoryname'] . ' ">
    ' . $categoryname . ' <span class="badge rounded-pill badge-notification bg-primary"> ' . $total . '</span>
    </a>
    </li>
    ';
  }
}
?>
<h4 class="text-left mt-2" ><i class="fas fa-list"></i>Brand</h4>
<?php
$sql = "select * from tblbrand where status = 1";
$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) {
  $brandname = $row['brandname'];
  $sqlcount = "SELECT count(*) as brandcount from tblproduct where brandid =" . $row['brandid'];
  $rescount = $mysqli->query($sqlcount);
  $rowcount = $rescount->fetch_assoc();
  $totalbrand = $rowcount['brandcount'];
  if ($total > 0) {
    echo '
    <li class="nav-item active"> 
    <a href="productbybrand.php?brandname='.$row['brandname'].' ">
    ' . $brandname . ' <span class="badge rounded-pill badge-notification bg-primary"> ' . $totalbrand . '</span>
    </a>
    </li>
    ';
  }
}
?>
</ul>