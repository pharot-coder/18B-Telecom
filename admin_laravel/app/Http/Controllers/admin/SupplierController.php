<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;

class SupplierController extends Controller
{
    //

    public function index()
    {
        $data = Supplier::all();
        return view('admin.supplier', compact('data'));
    }
}