 <?php
 include('includes/connect.php');
 session_start();
 if(empty($_SESSION['CID'])){
    header('location: http://localhost:8888/18B-Telecom');
}
if (isset($_SESSION['CID'])) {
    $output = array();
    try {
        $total = 0;
        $subtotal = 0;
        $sql = "SELECT c.*,c.cart_id as cartid,p.productid,p.productname,p.images,p.price from tblcart as c INNER JOIN  tblproduct as p on c.productid = p.productid where c.customerid = " . $_SESSION['CID'];
        $res = $mysqli->query($sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {

           while ($row = $res->fetch_array()) {
            $subtotal = $row['qty'] * $row['price'];
            $total += $subtotal;
            $output['cartdata'] .= '
            <tr>
            <td> <button class="btn btn-danger btn-sm cartdel"
            data-id=" '.$row['cart_id'].' "><i class="fa fa-trash"></i></button>
            </td>

            <td>
            <a href="product_detail.php?productid='.$row['productid'].'"  >
            '.$row['productname'].' </a>
            <input type="hidden" class="form-control productid" value="'.$row['productid'].'" />
            </td>

            <td> <img src="assets/img/'.$row['images'].'" height="50px"
            width="60px"> </td>

            <td class="price">&#36; '.number_format($row['price'], 2).' </td>

            <td class="input-group">
            <span class="input-group-btn"> <button class="btn btn-info minus btn-sm" id="minus"
            data-id="'.$row['cart_id'].'"> <i class="fa fa-minus"></i>
            </button> </span>

            <input type="text" class="form-control form-control-sm qty text-center" id="qty_'.$row['cart_id'].'" data-id="'.$row['cart_id'].'"
            value="'.$row['qty'].'" maxlength="100">

            <span class="input-group-btn"> <button class="btn btn-info btn-sm add" id="add"
            data-id=" '.$row['cart_id'].'"> <i class="fa fa-plus"></i>
            </button>
            </span>
            </td>

            <td align="center"> &#36;'.number_format($subtotal, 2).' </td>


            </tr>
            ';
        }

        $output['checkoutbtn'] .= '
        <h5> <b>Total: &#36;</b> <b class="total"> '.number_format($total,2).' </b> </h5>
        <a href="checkout_page.php" id="checkoutbtn" class="btn btn-success btn-lg"> <i class="fa fa-shopping-cart"></i> Check Out</a>
        ';
        
    } else {
        $output['cartdata'].= '
        <tr>
        <td colspan="6" class="text-center" > No product to show </td>
        </tr>
        ';
    }
    } catch (Exception $e) { //throw $th; echo "This is a problem" .
    echo "Error".$e->getMessage();
}
}
echo json_encode($output);
?>