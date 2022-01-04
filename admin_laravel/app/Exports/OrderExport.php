<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class OrderExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $orderData = DB::table('tblorder as o')
            ->leftjoin('tblcustomer as c', 'o.customerid', '=', 'c.customerid')
            ->select('o.*', 'c.customerid', 'c.username', 'c.images')
            ->orderBy('o.order_date', 'desc')
            ->orderBy('o.orderid', 'desc')
            ->get();
        return $orderData;
    }
}