<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
      <div class="carousel-item active">
          <img class="d-block w-100"  height="500" src="assets/img/2021-01-24 17.30.20.jpg"
          alt="First slide">
      </div>
      <?php 
      $sql = "select * from tblslider where status = 1";
      $result = $mysqli->query($sql);
      while ($row = $result->fetch_assoc()) {
         ?>
         <div class="carousel-item">
          <img class="d-block w-100" src="assets/img/<?php echo $row['image'] ?>"
          height="500" alt="Second slide">
      </div>

  <?php } ?>


</div>
<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>