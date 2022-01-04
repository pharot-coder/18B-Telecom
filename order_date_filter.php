<?php
include 'includes/connect.php';
session_start();
if(empty($_SESSION['CID'])){
	header('location: http://localhost:8888/18B-Telecom');
}

$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];
$customerid = $_SESSION['CID'];
$output = '';

try {

	$sql = "SELECT * from tblorder where order_date BETWEEN '$from_date' and '$to_date' and customerid = ".$customerid." ORDER BY order_date DESC" ;
	$result = $mysqli->query($sql);
	$cnt = 0;
	if($result->num_rows > 0){

		while($row = $result->fetch_assoc()){
			$orderid = $row['orderid'];
			$status = ($row['status'] == 1
				? '<span class="badge badge-info"> Processing </span>'
				: ($row['status'] == 2
					? '<span class="badge badge-success"> Completed </span>'
					: ($row['status'] == 3
						? '<span class="badge badge-warning"> Refund </span>'
						: '<span class="badge badge-danger"> Canceled </span>')));
			$sqlorder = "SELECT od.*,p.productid as prodid,p.productname,p.price as proprice from tblorder_detail as od LEFT JOIN tblproduct as p on od.productid = p.productid where od.orderid = ".$orderid."";
			$resorder = $mysqli->query($sqlorder);
			$cnt++;
			$subtotal = 0;
			$total = 0;
			while($roworder = $resorder->fetch_assoc()){
				$subtotal = $roworder['proprice'] * $roworder['qty'];
				$total += $subtotal;
			}

			$output .= "
			<tr>
			<td> ".$cnt." </td>
			<td>".date('M d, Y', strtotime($row['order_date']))."</td>
			<td style='font-size: 20px;'>".$status."</td>
			<td>&#36; ".number_format($total, 2)."</td>
			<td><button class='btn btn-sm btn-flat btn-info transact' data-id='".$row['orderid']."'><i class='fa fa-search'></i> View Detail </button></td>
			</tr>
			";
		}

	}else{

		$output .= '
		<tr>
		<td colspan="6" class="text-center" > No data found </td>
		</tr>
		';
	}


} catch (Exception $e) {
	
	$output.= $e->getMessage();

}
echo json_encode($output);

