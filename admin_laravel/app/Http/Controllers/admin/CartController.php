<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    //
    public function index($customerid)
    {
        $data = DB::table('tblcart as c')
            ->leftjoin('tblproduct as p', 'c.productid', '=', 'p.productid')
            ->leftJoin('tblcustomer as cu', 'c.customerid', '=', 'cu.customerid')
            ->select('c.*', 'p.productname', 'p.price', 'p.images', 'cu.first_name', 'cu.last_name', 'cu.last_name', 'cu.username')
            ->where('c.customerid', $customerid)
            ->get();
        return view('admin.cart', [
            'cartData' => $data
        ]);
    }


    public function getRow(Request $request)
    {
        $cart_id = $request->get('cart_id');
        $output = array();
        try {
            //code...
            $data = Cart::where('cart_id', $cart_id)->get();
            foreach ($data as $row) :
                $output['cart_id'] = $row->cart_id;
                $output['qty'] = $row->qty;
                $output['cutomerid'] = $row->customerid;
                $output['productid'] = $row->productid;
            endforeach;
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
        return response()->json($output);
    }

    public function updateCart(Request $request)
    {
        $cart_id = $request->post('cart_id');

        try {
            //code...
            $cart = Cart::find($cart_id);
            $cart->qty = $request->post('qty');
            if (!$cart->save()) {
                Alert::error('error', 'Qunatity update fail');
                return Redirect::back();
            } else {
                Alert::success('success', 'Quantity update success');
                return Redirect::back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
    }
}