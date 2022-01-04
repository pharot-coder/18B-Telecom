<?php

namespace App\Http\Controllers\admin;

use App\Exports\InvoiceExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        $data = DB::table('tblinvoice as i')
            ->leftJoin('tblorder as o', 'i.orderid', '=', 'o.orderid')
            ->leftJoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
            ->select('i.*', 'o.order_date', 'o.payment_method', 'c.username as customername')
            ->orderBy('i.date', 'desc')
            ->get();
        return view('admin.invoice', [
            'invoiceData' => $data
        ]);
    }

    public function getRow(Request $request)
    {
        $invoiceid = $request->get('invoiceid');
        $output = array();
        try {
            //code...
            $data = Invoice::findorFail($invoiceid);
            foreach ($data as $row) {
                $output['invoiceid'] = $row->invoiceid;
                $output['invoice_date'] = $row->date;
                $output['orderid'] = $row->orderid;
                $output['customername']  = $row->customername;
                $output['order_date'] = $row->order_date;
            }
        } catch (\Throwable $th) {
            //throw $th;
            $output['error'] = $th->getMessage();
        }
        return response()->json($output);
    }

    public function destroy(Request $request)
    {
        $invoiceid = $request->post('invoiceid');
        try {
            //code...
            $invoice = Invoice::find($invoiceid);
            if ($invoice->delete()) {
                Alert::success('Success', 'Invoice has deleted');
                return redirect()->back();
            } else {
                Alert::error('Error', 'Invoice delete fail');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
    }

    public function generatePDF(Request $request)
    {
        $startDate  = date('Y-m-d', strtotime($request->get('start_date')));
        $endDate  = date('Y-m-d', strtotime($request->get('end_date')));
        if ($request->get('start_date') == "" && $request->get('end_date') == "") {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($this->data_to_pdf());
            return $pdf->stream();
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($this->data_to_pdfByDate($startDate, $endDate));
            return $pdf->stream();
        }
    }

    public function data_to_pdf()
    {
        $data = DB::table('tblinvoice as i')
            ->leftJoin('tblorder as o', 'i.orderid', '=', 'o.orderid')
            ->leftJoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
            ->select('i.*', 'o.order_date', 'o.payment_method', 'c.username as customername')
            ->orderBy('i.date', 'desc')
            ->get();
        $count = 1;
        $output = '
        <h3 align="center">Invoice Report</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
        <th style="border: 1px solid; padding:12px;" width="20%">#</th>\
        <th style="border: 1px solid; padding:12px;" width="20%">Invoice No</th>
        <th style="border: 1px solid; padding:12px;" width="30%">Date</th>
        <th style="border: 1px solid; padding:12px;" width="20%">Order No</th>
        <th style="border: 1px solid; padding:12px;" width="20%">Customer</th>
         </tr>
        ';
        foreach ($data as $row) :
            $output .= '
            <tr> 
            <td style="border: 1px solid; padding:12px;" align="center"> ' . $count++ . ' </td>
            <td style="border: 1px solid; padding:12px;" align="center"> ' . $row->invoiceid . ' </td>
            <td style="border: 1px solid; padding:12px;" align="center"> ' . date('d-M-Y', strtotime($row->date))  . ' </td>
            <td style="border: 1px solid; padding:12px;" align="center"> ' . $row->orderid . ' </td>
            <td style="border: 1px solid; padding:12px;" align="center"> ' . $row->customername . ' </td>
            </tr>
            ';
        endforeach;
        return $output;
    }

    public function data_to_pdfByDate($startDate, $endDate)
    {
        $data = DB::table('tblinvoice as i')
            ->leftJoin('tblorder as o', 'i.orderid', '=', 'o.orderid')
            ->leftJoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
            ->select('i.*', 'o.order_date', 'o.payment_method', 'c.username as customername')
            ->whereBetween('o.order_date', array($startDate, $endDate))
            ->orderBy('i.date', 'desc')
            ->get();
        $count = 1;
        $output = '
        <h3 align="center">Invoice Report</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
        <th style="border: 1px solid; padding:12px;" width="20%">#</th>\
        <th style="border: 1px solid; padding:12px;" width="20%">Invoice No</th>
        <th style="border: 1px solid; padding:12px;" width="30%">Date</th>
        <th style="border: 1px solid; padding:12px;" width="20%">Order No</th>
        <th style="border: 1px solid; padding:12px;" width="20%">Customer</th>
         </tr>
        ';
        foreach ($data as $row) :
            $output .= '
            <tr> 
            <td style="border: 1px solid; padding:12px;" align="center"> ' . $count++ . ' </td>
            <td style="border: 1px solid; padding:12px;" align="center"> ' . $row->invoiceid . ' </td>
            <td style="border: 1px solid; padding:12px;" align="center"> ' . date('d-M-Y', strtotime($row->date))  . ' </td>
            <td style="border: 1px solid; padding:12px;" align="center"> ' . $row->orderid . ' </td>
            <td style="border: 1px solid; padding:12px;" align="center"> ' . $row->customername . ' </td>
            </tr>
            ';
        endforeach;
        return $output;
    }

    public function exportExcel()
    {
        return  Excel::download(new InvoiceExport, 'invoice.xlsx');
    }
}