<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use  App\Models\Customer;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $year = date('Y');
        $countCustomer = Customer::count('*');
        $countUsers = User::count('*');
        $countBrand  = Brand::count('*');
        $countProdcut = Product::count('*');
        $totalVisitor = DB::table('tblvisitor')
            ->whereYear('date', '=', $year)
            ->groupBy(DB::raw('DATE_FORMAT(date, "%M")'))
            ->orderBy(DB::raw('max(date)'))
            ->get(array(
                DB::raw('DATE_FORMAT(date,"%M") as date'),
                DB::raw('count(*) as countVisitor')
            ));

        return view('admin.dashboard', [
            'countCustomer' => $countCustomer,
            'countUsers' => $countUsers,
            'countBrand' => $countBrand,
            'countProduct' => $countProdcut,
            'totalVisitor' => $totalVisitor
        ]);
    }
}
