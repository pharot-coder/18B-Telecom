
<div class="card">
  <div class="card-header">
   <h5> <span><i class="fas fa-shopping-cart mr-2 mt-2" ></i></span>Order Detail History</h5>
 </div>
 <div class="card-body">
  <div class="alert alert-danger mt-2" id="alert" style="display: none;" >
    <span class="message"></span>
    <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <form id="formorder" class="mb-4 mt-4 form-inline justify-content-end" method="get" accept-charset="utf-8">
    <label for=""> <b>From Date:</b> 
      <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control  ml-2 mr-2"  id="from_date" placeholder="Choose Start Date" >   </label>     

      <label for=""> <b>To Date:</b> 
        <input type="text" class="form-control ml-2 mr-2"  id="to_date" placeholder="Choose End Date" onfocus="(this.type='date')" onblur="(this.type='text')"></label>

        <input type="submit" class="btn btn-success btn-sm" id="filterdate" value="Search" >
      </form>
      <table id="ordertable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">#
            </th>
            <th class="th-sm"> Date
            </th>
            <th class="th-sm text-center"> Order Status
            </th>
            <th class="th-sm">Total Price
            </th>
            <th class="th-sm">Modify</th>
          </tr>
        </thead>
        <tbody id="ordertbody">
          <?php 
          try {
            $customerid = $_SESSION['CID'];
            $sql = "SELECT * from tblorder where customerid = ".$customerid." ORDER BY order_date desc, status asc, orderid desc";
            $result = $mysqli->query($sql);
            $cntrow = 0;
            if($result->num_rows > 0){
             while ($row = $result->fetch_assoc()) { 
              $orderid = $row['orderid'];
              $cntrow++;
              $sql1 = "SELECT od.*,p.productid as prodid,p.productname,p.price as proprice from tblorder_detail as od LEFT JOIN tblproduct as p on od.productid = p.productid where od.orderid =".$orderid."";
              $result1 = $mysqli->query($sql1);
              $subtotalorder = 0;
              $totalprice = 0;
              while($row1 = $result1->fetch_assoc()){
                $subtotalorder = $row1['qty'] * $row1['proprice'];
                $totalprice += $subtotalorder;
              } ?>

              <tr>
                <td> <?php echo $cntrow ?> </td>
                <td> <?php echo date('d-M-Y', strtotime($row['order_date'])) ?> </td>

                <td style='font-size: 18px;' class="text-center" > <?php 
                if($row['status'] == 1 ){
                  echo '<span class="badge badge-default">Processing</span>';
                }elseif($row['status'] == 2){
                  echo '<span class="badge badge-success"> Completed </span>';
                }elseif($row['status'] == 3){
                  echo '<span class="badge badge-warning"> Refund </span>';
                }else{
                  echo '<span class="badge badge-danger"> Canceled </span>';
                }
              ?> </td>

              <td>&#36; <?php echo number_format($totalprice, 2) ?> </td>
              <td><button class='btn btn-sm btn-flat btn-info transact' data-id=<?php echo $row['orderid'] ?>><i class='fa fa-search'></i> View Detail </button></td>
            </tr>

          <?php }

        }else{
          echo '
          <tr>
          <td colspan="6" class="text-center" > No Order </td>
          </tr>
          ';
        }

      } catch (Exception $e) {
        echo "Error".$e->getMessage();
      }

      ?>
    </tbody>
    <tfoot>
      <tr>
        <th>#
        </th>
        <th> Date
        </th>
        <th> Order Status
        </th>
        <th>Total Price
        </th>
        <th>Modify</th>
      </tr>
    </tfoot>
  </table>
</div>
</div>
