<?php

namespace App\Http\Controllers\admin;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orderData = DB::table('tblorder as o')
            ->leftjoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
            ->select('o.*', 'c.customerid', 'c.username', 'c.images')
            ->orderBy('o.order_date', 'desc')
            ->orderBy('o.orderid', 'desc')
            ->get();
        return view('admin.order', [
            'orderData' => $orderData
        ]);
    }

    public function getRow(Request $request)
    {
        $orderid = $request->get('orderid');
        $order = Order::where('orderid', $orderid)->get();
        $output   = array();
        foreach ($order as $row) :
            $output['orderid']  = $row->orderid;
            $output['status'] = $row->status;
            $output['payment_method'] = $row->payment_method;
            $output['order_date'] = $row->order_date;
            $output['customerid'] = $row->customerid;
        endforeach;
        return response()->json($output);
    }

    public function getOrderDeatail(Request $request)
    {
        $output = array('data' => '', 'total' => '');
        $orderid = $request->get('orderid');
        $data = DB::table('tblorder_detail as od')
            ->leftJoin('tblproduct as p', 'od.productid', '=', 'p.productid')
            ->select('od.*', 'p.productid as prodid', 'p.productname', 'p.images', 'p.price')
            ->where('od.orderid', $orderid)
            ->get();
        $subtotal = 0;
        $total = 0;
        $count = 1;
        if (count($data) > 0) {
            foreach ($data as $row) :
                $subtotal = $row->qty * $row->price;
                $total += $subtotal;
                $photo = empty($row->images) ? '<img src="../../assets/img/no_user_profile.jpg" height="50px" width="50px" alt="">'
                    : '<img src="../../assets/img/' . $row->images . '" height="50px" width="50px" alt="">';
                $output['data'] .= '
                <tr>
                    <td> ' . $count++ . ' </td>
                    <td>' . $row->productname . '</td>
                    <td>' . $photo . '</td>
                    <td>' . $row->price . '</td>
                    <td>' . $row->qty . '</td>
                    <td>&#36; ' . number_format($subtotal, 2) . '</td>
                </tr>
                ';
            endforeach;
            $output['total'] .= '
            &#36;  ' . number_format($total, 2) . '
           ';
        } else {
            $output['data'] .= '<tr>
                      <td colspan="6"> No data found </td>
                              </tr>';
            $output['total'] .= '
                              &#36;  ' . number_format($total, 2) . '
                             ';
        }
        return response()->json($output);
    }

    public function filterStatus(Request $request)
    {
        $status = $request->get('order_status');
        $statusData = DB::table('tblorder as o')
            ->leftjoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
            ->select('o.*', 'c.customerid', 'c.username', 'c.images')
            ->orderBy('o.order_date', 'desc')
            ->orderBy('o.orderid', 'desc')
            ->where('o.status', $status)
            ->get();
        return view('admin.order', [
            'orderData' => $statusData
        ]);
    }

    public function updateStatus(Request $request)
    {
        $orderid = $request->post('orderid');
        try {
            //code...
            $order = Order::find($orderid);
            $order->status = $request->post('status');
            if ($order->save()) {
                Alert::success('Success', 'Order status has been updated');
                return redirect()->back();
            } else {
                Alert::error('Error', 'Order status update fail');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
    }

    public function getOrderbyDate(Request $request)
    {
        $startDate  = date('Y-m-d', strtotime($request->get('start_date')));
        $endDate  = date('Y-m-d', strtotime($request->get('end_date')));
        try {
            if ($startDate != '' && $endDate != '') {
                $data = DB::table('tblorder as o')
                    ->leftjoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
                    ->select('o.*', 'c.customerid', 'c.username', 'c.images')
                    ->orderBy('o.order_date', 'desc')
                    ->orderBy('o.orderid', 'desc')
                    ->whereBetween('o.order_date', array($startDate, $endDate))
                    ->get();
            } else {
                $data =  DB::table('tblorder as o')
                    ->leftjoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
                    ->select('o.*', 'c.customerid', 'c.username', 'c.images')
                    ->orderBy('o.order_date', 'desc')
                    ->orderBy('o.orderid', 'desc')
                    ->get();
            }
        } catch (\Throwable $th) {
            $data = $th->getMessage();
        }
        echo json_encode($data);
    }


    public function generatePDF(Request $request)
    {
        try {
            //code...
            if ($request->input('start_date') != '' && $request->input('end_date') != '') {
                $startDate  = date('Y-m-d', strtotime($request->input('start_date')));
                $endDate  = date('Y-m-d', strtotime($request->input('end_date')));
                $pdf = App::make('dompdf.wrapper');
                $pdf->loadHTML($this->convert_pdf_by_date($startDate, $endDate));
                return $pdf->stream();
            } else {
                $pdf = App::make('dompdf.wrapper');
                $pdf->loadHTML($this->convert_pdf());
                return $pdf->stream();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
    }

    public function convert_pdf()
    {
        $orderData = DB::table('tblorder as o')
            ->leftjoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
            ->select('o.*', 'c.customerid', 'c.username', 'c.images')
            ->orderBy('o.order_date', 'desc')
            ->orderBy('o.orderid', 'desc')
            ->get();
        $count = 1;
        $out = '
        <h3 align="center">Order Report</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
        <th style="border: 1px solid; padding:12px;" width="10%">#</th>
        <th style="border: 1px solid; padding:12px;" width="20%">Order No</th>
        <th style="border: 1px solid; padding:12px;" width="20%">Order Date</th>
        <th style="border: 1px solid; padding:12px;" width="40%">Payment Method</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Customer</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Status</th>
         </tr>
            ';
        foreach ($orderData as $row) :
            $status = $row->status == 1 ? '<span class="badge badge-info"> Processing </span>' : ($row->status == 2 ? '<span class="badge badge-success"> Completed </span>'
                : ($row->status == 3 ? '<span class="badge badge-warning"> Refund </span>' : '<span class="badge badge-danger"> Canceled </span>'));
            $out .= '
            <tr> 
            <td style="border: 1px solid; padding:12px;"> ' . $count++ . ' </td>
            <td style="border: 1px solid; padding:12px;"> ' . $row->orderid . ' </td>
            <td style="border: 1px solid; padding:12px;"> ' . date('d-M-Y', strtotime($row->order_date)) . ' </td>
            <td style="border: 1px solid; padding:12px;"> ' . $row->payment_method . ' </td>
            <td style="border: 1px solid; padding:12px;"> ' . $row->username . ' </td>
            <td style="border: 1px solid; padding:12px;"> ' .  $status . ' </td>
            </tr>
            ';
        endforeach;
        return $out;
    }


    public function convert_pdf_by_date($startDate, $endDate)
    {
        $orderData = DB::table('tblorder as o')
            ->leftjoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
            ->select('o.*', 'c.customerid', 'c.username', 'c.images')
            ->whereBetween('o.order_date', array($startDate, $endDate))
            ->orderBy('o.order_date', 'desc')
            ->orderBy('o.orderid', 'desc')
            ->get();
        $count = 1;
        $out = '
        <h3 align="center">Order Report</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
        <th style="border: 1px solid; padding:12px;" width="10%">#</th>
        <th style="border: 1px solid; padding:12px;" width="20%">Order No</th>
        <th style="border: 1px solid; padding:12px;" width="20%">Order Date</th>
        <th style="border: 1px solid; padding:12px;" width="40%">Payment Method</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Customer</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Status</th>
         </tr>
            ';
        foreach ($orderData as $row) :
            $status = $row->status == 1 ? '<span class="badge badge-info"> Processing </span>' : ($row->status == 2 ? '<span class="badge badge-success"> Completed </span>'
                : ($row->status == 3 ? '<span class="badge badge-warning"> Refund </span>' : '<span class="badge badge-danger"> Canceled </span>'));
            $out .= '
            <tr> 
            <td style="border: 1px solid; padding:12px;"> ' . $count++ . ' </td>
            <td style="border: 1px solid; padding:12px;"> ' . $row->orderid . ' </td>
            <td style="border: 1px solid; padding:12px;"> ' . date('d-M-Y', strtotime($row->order_date)) . ' </td>
            <td style="border: 1px solid; padding:12px;"> ' . $row->payment_method . ' </td>
            <td style="border: 1px solid; padding:12px;"> ' . $row->username . ' </td>
            <td style="border: 1px solid; padding:12px;"> ' .  $status . ' </td>
            </tr>
            ';
        endforeach;
        return $out;
    }


    public function createInvoice($orderid)
    {
        $data = DB::table('tblorder as o')
            ->leftJoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
            ->select('o.orderid', 'o.order_date', 'o.payment_method', 'c.customerid', 'c.username')
            ->where('o.orderid', $orderid)
            ->get();
        $dataDetail = DB::table('tblorder_detail as od')
            ->leftJoin('tblproduct as p', 'od.productid', '=', 'p.productid')
            ->select('od.*', 'p.productid as prodid', 'p.productname', 'p.price')
            ->where('od.orderid', $orderid)
            ->get();
        return view('admin.createInvoice', [
            'data' => $data,
            'dataDetail' => $dataDetail
        ]);
    }


    public function exportExcel()
    {
        return Excel::download(new OrderExport, 'order.xlsx');
    }
}