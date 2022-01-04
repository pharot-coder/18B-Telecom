<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_order');
        $this->load->helper('url_helper');

        if (empty($this->session->userdata('adid'))) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        $data['orderdata'] = $this->M_order->GetData();
        $this->load->view('admin/V_order', $data);
    }

    public function UpdateStatus()
    {
        $status = $this->input->post('status');
        $orderid = $this->input->post('orderid');
        $StatusUpdate = $this->M_order->UpdateStatus($status, $orderid);
        if ($StatusUpdate == true) {
            $this->session->set_flashdata('error', 'Order Status Update Fail !');
            return redirect('order');
        } else {
            $this->session->set_flashdata('success', 'Order Status Update Successfully');
            return redirect('order');
        }
    }

    public function FetRowData()
    {
        $output = array();
        $orderid = $this->input->get('orderid');
        $data = $this->M_order->FetRowData($orderid);
        foreach ($data as $row) {
            $output['orderid'] = $row->orderid;
            $output['order_date'] = $row->order_date;
            $output['status'] = $row->status;
            $output['customerid'] = $row->customerid;
        }
        echo json_encode($output);
    }

    public function GetDetailOrder()
    {
        $orderid = $this->input->get('orderid');
        $output = array('detail' => '', 'total' => '');
        $cnt = 0;
        $data = $this->M_order->GetDetailOrder($orderid);
        $count = count($data);
        $subtotal = 0;
        $total  = 0;
        if ($count > 0) {
            foreach ($data as $row) {
                $cnt++;
                $subtotal = $row['qty'] * $row['price'];
                $total += $subtotal;
                $image = (empty($row['images'])) ? '<img src=" ' . base_url('../assets/img/no_user_profile.jpg') . '"
                 class="img-reponsive"  width="50px" height="50px">'
                    : '<img src=" ' . base_url('../assets/img/' . $row['images']) . '"
                class="img-responsive" width="50px" height="50px" alt="">';
                $output['detail'] .= '
                                    <tr>
                                        <td> ' . $cnt . ' </td>
                                        <td> ' . $row['productname'] . ' </td>
                                        <td> ' . $image . ' </td>
                                        <td> ' . $row['price'] . ' </td>
                                        <td> ' . $row['qty'] . '</td>
                                        <td> &#36; ' . number_format($subtotal, 2) . ' </td>
                                    </tr>
                ';
            }

            $output['total'] .= '
            &#36;  ' . number_format($total, 2) . '
           ';
        } else {
            $output['detail'] .= '
            <tr>
                <td colspan="6"> No data found </td>
            </tr>
            ';
            $output['total'] .= '
            &#36;  ' . number_format($total, 2) . '
           ';
        }
        echo json_encode($output);
    }

    public function filterStatus()
    {
        $status = $this->input->get('status');
        $output = '';
        $count = 0;
        $data = $this->M_order->filterStatus($status);
        $countdata = count($data);
        if ($countdata > 0) {
            foreach ($data as $row) {
                $count++;
                $images = empty($row['images']) ? '  <img src=" ' . base_url('../assets/img/no_user_profile.jpg') . '" class="img-reponsive"
                    width="50px" height="50px">' : '   <img src=" ' . base_url('../assets/img/' . $row['images']) . '"
                    class="img-responsive" width="50px" height="50px" alt="">';
                $tran_photo = (empty($row['payment_transaction_image'])) ? 'N/A' : '<img src=" ' . base_url('../assets/img/' . $row['payment_transaction_image']) . '"
                    class="img-responsive" width="50px" height="50px" alt="">';
                $statusrow =  ($row['status'] == 1
                    ? '<span class="badge badge-info"> Processing </span>'
                    : ($row['status'] == 2
                        ? '<span class="badge badge-success"> Completed </span>'
                        : ($row['status'] == 3
                            ? '<span class="badge badge-warning"> Refund </span>'
                            : '<span class="badge badge-danger"> Canceled </span>')));
                $output .= '
                    <tr>
                    <td> ' . $count . ' </td>
                    <td> ' .  date('d-M-Y', strtotime($row['order_date'])) . ' </td>
                    <td>' . $row['payment_method'] . '</td>
                    <td> <a href=" ' . base_url('../assets/img/' . $row['payment_transaction_image']) . ' "> ' . $tran_photo . ' </a>  </td>
                 
<td> ' . $statusrow . ' <span><a href="#editstatus" class="editstatus" data-id="' . $row['orderid'] . '"> <i
                class="fa fa-edit"></i>
        </a></span> </td>
<td> ' . $row['username'] . ' <span> <a href="#" class="fas fa-eye username"
data-id="' . $row['customerid'] . '"></a></span></td>
<td> ' . $images . ' </td>
<td> <a href="#detail " class="fa fa-eye order_detail" data-toggle="tooltip" data-placement="top" title="View Detail"
        data-id="' . $row['orderid'] . '"></a>
        |
        <a href=" ' . base_url('order/create_invoice/' . $row['orderid'] . ' ') . ' "
            class=" create_invoice" data-id="<?php echo $row->orderid ?>"
data-toggle="tooltip" data-placement="top" title="Create Invoice"><i class="fas fa-file-invoice"></i></a>
</td>
</tr>
';
}
} else {
$output .= '
<tr>
    <td colspan="6"> No data found </td>
</tr>
';
}
echo json_encode($output);
}

public function FilterOrderDate()
{
$startdate = $this->input->get('start_date');
$enddate = $this->input->get('end_date');
$out = '';
$count = 1;
$data = $this->M_order->FilterOrderDate($startdate, $enddate);
$countdata = count($data);
if ($countdata > 0) {
foreach ($data as $row) {
$count++;
$images = empty($row['images']) ? ' <img src=" ' . base_url('../assets/img/no_user_profile.jpg') . '"
    class="img-reponsive" width="50px" height="50px">' : ' <img
    src=" ' . base_url('../assets/img/' . $row['images']) . '" class="img-responsive" width="50px" height="50px"
    alt="">';
$tran_photo = (empty($row['payment_transaction_image'])) ? 'N/A' : '<img
    src=" ' . base_url('../assets/img/' . $row['payment_transaction_image']) . '" class="img-responsive" width="50px"
    height="50px" alt="">';
$statusrow = ($row['status'] == 1
? '<span class="badge badge-info"> Processing </span>'
: ($row['status'] == 2
? '<span class="badge badge-success"> Completed </span>'
: ($row['status'] == 3
? '<span class="badge badge-warning"> Refund </span>'
: '<span class="badge badge-danger"> Canceled </span>')));
$out .= '
<tr>
    <td> ' . $count . ' </td>
    <td> ' . date('d-M-Y', strtotime($row['order_date'])) . ' </td>
    <td>' . $row['payment_method'] . '</td>
    <td> <a href=" ' . base_url('../assets/img/' . $row['payment_transaction_image']) . ' "> ' . $tran_photo . ' </a>
    </td>
    <td> ' . $statusrow . ' <span><a href="#editstatus" class="editstatus" data-id="' . $row['orderid'] . '"> <i
                    class="fa fa-edit"></i>
            </a></span> </td>
    <td> ' . $row['username'] . '<span> <a href="#" class="fas fa-eye username"
                data-id="' . $row['customerid'] . '"></a></span> </td>
    <td> ' . $images . ' </td>
    <td>
        <a href="#detail" class="fa fa-eye order_detail" data-toggle="tooltip" data-placement="top" title="View Detail"
            data-id="' . $row['orderid'] . '"></a>
        |
        <a href=" ' . base_url('order/create_invoice/' . $row['orderid'] . ' ') . ' " class=" create_invoice"
            data-id="<?php echo $row->orderid ?>" data-toggle="tooltip" data-placement="top" title="Create Invoice"><i
                class="fas fa-file-invoice"></i></a>
    </td>
</tr>
';
}
} else {
$out .= '
<tr>
    <td colspan="6"> No data found </td>
</tr>
';
}

echo json_encode($out);
}

public function getUserRow()
{

$customerid = $this->input->post('customerid');
$data = $this->M_order->getUserRow($customerid);
$output = array();
foreach ($data as $row) {
$image = empty($row->images) ? '' . base_url('../assets/img/no_user_profile.jpg') . '' : '' . base_url('../assets/img/'
. $row->images . '') . '';
$output['first_name'] = $row->first_name;
$output['last_name'] = $row->last_name;
$output['username'] = $row->username;
$output['phone_number'] = $row->phone_number;
$output['address'] = $row->address;
$output['email'] = $row->email;
$output['images'] = $image;
}
echo json_encode($output);
}

public function getOrderStatus()
{
$data = $this->M_order->getDataOrder();
$this->load->view('admin/V_addOrderStatus', [
'data' => $data
]);
}

public function addNewOrderStatus()
{
$this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
$this->form_validation->set_rules('order_status_name', 'Order Status', 'required');

if ($this->form_validation->run() == TRUE) {
# code...
$name = $this->input->post('order_status_name');
$data = array(
'order_status_name' => $name
);
$addData = $this->M_order->addNewOrderStatus('tbl_order_status', $data);
if ($addData == false) {
$this->session->set_flashdata('success', 'Order Status add success !');
return redirect('order/add_order_status');
} else {
$this->session->set_flashdata('error', 'Order Status add Fail !');
return redirect('order/add_order_status');
}
} else {
$this->session->set_flashdata('error', validation_errors());
return redirect('order/add_order_status');
}
}

public function generate_pdf()
{
//load pdf library
$this->load->library('Pdf');

$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('https://roytuts.com');
$pdf->SetTitle('Order Information Report');
$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set font
$pdf->SetFont('times', 12);

// ---------------------------------------------------------

//Generate HTML table data from MySQL - start
$template = array(
'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
    );

    $this->table->set_template($template);

    $this->table->set_heading('#', 'Order Date', 'Status', 'Customer Name', 'Transaction Method');

    $salesinfo = $this->M_order->GetData();
    $cnt = 0;
    foreach ($salesinfo as $row) :
    $date = date('d-M-Y', strtotime($row->order_date));
    $status = ($row->status == 1
    ? '<span class="badge badge-info"> Processing </span>'
    : ($row->status == 2
    ? '<span class="badge badge-success"> Completed </span>'
    : ($row->status == 3
    ? '<span class="badge badge-warning"> Refund </span>'
    : '<span class="badge badge-danger"> Canceled </span>')));
    $cnt++;
    $this->table->add_row(
    $cnt,
    $date,
    $status,
    $row->username,
    $row->payment_method
    );
    endforeach;

    $html = $this->table->generate();
    //Generate HTML table data from MySQL - end

    // add a page
    $pdf->AddPage();

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // reset pointer to the last page
    $pdf->lastPage();

    //Close and output PDF document
    $pdf->Output(('Report_' . date('d-M-Y')) . '.pdf', 'D');
    }

    public function view_Invoice($orderid)
    {
    $data = array(
    'detailorder' => $this->M_order->viewdetailOrderInvoice($orderid),
    'orderData' => $this->M_order->viewOrderInvoice($orderid)
    );
    $this->load->view('admin/V_invoice_detail', $data);
    }
    }

    /* End of file C_order.php */