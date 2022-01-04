<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class C_Invoice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_invoice');
        $this->load->helper('url_helper');
        //load pdf library
        $this->load->library('Pdf');
        if (empty($this->session->userdata('adid'))) {
            redirect('admin/login');
        }
    }

    public function index()
    {
        $data = array(
            'dataInvoice' => $this->M_invoice->getData()
        );
        return $this->load->view('admin/V_invoice', $data);
    }

    public function storeInvoice()
    {
        $product_id = $this->input->post('product_id', TRUE);
        $qty = $this->input->post('quantity', TRUE);
        $orderid = $this->input->post('orderid');
        $userid = $this->session->userdata('adid')->userid;
        $invoicedate = date('Y-m-d');
        $getData = $this->M_invoice->getOrderID($orderid);
        if (count($getData) > 0) {
            $this->session->set_flashdata('error', 'Invoice already exists cannot create');
            return redirect('invoice');
        } else {
            $data = array(
                'date' => $invoicedate,
                'orderid' => $orderid,
                'userid' => $userid
            );
            $addData = $this->db->insert('tblinvoice', $data);
            $lastid = $this->db->insert_id();
            $data_detail = array();
            if ($addData) {
                foreach ($product_id as $key => $val) :
                    $data_detail[] = array(
                        'invoiceid' => $lastid,
                        'productid' => $val,
                        'qty' => $qty[$key]
                    );
                endforeach;
                $this->db->insert_batch('tblinvoice_detail', $data_detail);
                $this->session->set_flashdata('success', 'Create Invoice Successfully');
                return redirect('invoice');
            } else {
                $this->session->set_flashdata('error', 'Create Invoice fail');
                return redirect('invoice');
            }
        }
    }

    public function getRow()
    {
        $output = array();
        $invoiceid = $this->input->get('invoiceid');
        $data = $this->M_invoice->getDataInvoiceRow($invoiceid);
        foreach ($data as $row) {
            $output['invoiceid'] = $row->invoiceid;
            $output['invoice_date'] = $row->date;
            $output['orderid'] = $row->orderid;
            $output['customername']  = $row->customername;
            $output['order_date'] = $row->order_date;
        }
        echo json_encode($output);
    }

    public function getDetailRow()
    {
        $output = array('detail' => '', 'total' => '');
        $invoiceid = $this->input->get('invoiceid');
        $data = $this->M_invoice->getDetailRow($invoiceid);
        $count = count($data);
        $cnt = 0;
        $total = 0;
        $subtotal = 0;
        if ($count > 0) {
            foreach ($data as $row) {
                $cnt++;
                $subtotal = $row['qty'] * $row['price'];
                $total += $subtotal;
                $output['detail'] .= '
                                    <tr>
                                        <td> ' . $cnt . ' </td>
                                        <td> ' . $row['productname'] . ' </td>
                                        <td> ' . $row['price'] . ' </td>
                                        <td> ' . $row['qty'] . '</td>
                                        <td> &#36; ' . number_format($subtotal, 2) . ' </td>
                                    </tr>
                ';
            }

            $output['total'] .= '  &#36;  ' . number_format($total, 2) . ' ';
        } else {
            $output['detail'] .= ' <tr>
                <td colspan="6"> No data found </td>
            </tr> ';
            $output['total'] .= '  &#36;  ' . number_format($total, 2) . ' ';
        }
        echo json_encode($output);
    }



    public function destroy()
    {
        $invoiceid = $this->input->post('invoiceid');
        $removeData = $this->M_invoice->destroy($invoiceid);
        if (!$removeData->error) {
            $this->session->set_flashdata('success', 'Invoice remove Successfully');
            return redirect('invoice');
        } else {
            $this->session->set_flashdata('error', 'Invoice remove fail');
            return redirect('invoice');
        }
    }

    public function viewPrintInvoice($invoiceid)
    {
        $data =  array(
            'dataInvoceDetail' => $this->M_invoice->getInvoiceDetail($invoiceid),
            'dataInvoice' => $this->M_invoice->getInvoiceData($invoiceid)
        );
        $this->load->view('admin/V_printInvoice', $data);

        // $pdf = new PDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

        // $pdf->SetCreator(PDF_CREATOR);
        // $pdf->SetAuthor('Dea Venditama');
        // $pdf->SetTitle('Invoice');
        // $pdf->SetSubject('Invoice');

        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);

        // $pdf->addPage();

        // // Print text using writeHTMLCell()
        // $pdf->writeHTML('', '', $html, true, false, true, false, '');

        // // ---------------------------------------------------------
        // // Close and output PDF document
        // // This method has several options, check the source code documentation for more information.
        // ob_end_clean();
        // $pdf->Output('invoice.pdf', 'I');
    }
}

/* End of file C_Invoice.php */