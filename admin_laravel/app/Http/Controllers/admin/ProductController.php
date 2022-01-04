<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    //
    public function index()
    {
        $productData = DB::table('tblproduct as p')
            ->leftJoin('tbluser as u', 'p.userid', '=', 'u.userid')
            ->leftJoin('tblcategory as c', 'p.categoryid', '=', 'c.categoryid')
            ->select('p.*', 'u.username', 'c.categoryname')
            ->get();
        $brandData = Brand::all();
        $categoryData = Category::all();
        $supplierData = Supplier::all();
        return view('admin.product', [
            'productData' => $productData,
            'brandData' => $brandData,
            'categoryData' => $categoryData,
            'supplierData' => $supplierData
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'productname' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'cost' => 'required',
            'image' => 'required'
        ]);
        try {
            //code...
            $productname = $request->post('productname');
            $checkName = Product::where('productname', '=', $productname)->get();
            if (count($checkName) > 0) {
                Alert::error('Error', 'Product already exist');
                return redirect()->back();
            }
            $imageName = $request->file('image')->store('');
            $request->image->move(public_path('../../assets/img'), $imageName);
            $product = new Product;
            $product->productname = $request->post('productname');
            $product->description = $request->post('description');
            $product->price = $request->post('price');
            $product->cost = $request->post('cost');
            $product->qty = $request->post('qty');
            $product->categoryid = $request->post('category');
            $product->supplierid = $request->post('supplier');
            $product->brandid = $request->post('brand');
            $product->date_add = date('Y-m-d');
            $product->userid = auth()->id();
            $product->images = $imageName;
            if (!$product->save()) {
                Alert::error('Error', 'Data has been insert fail !');
                return redirect()->back();
            } else {
                Alert::success('Success', 'Data has been inserted');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
    }

    public function getRow(Request $request)
    {
        $output = array();
        $productid = $request->get('productid');
        $productData = Product::where('productid', $productid)->get();
        foreach ($productData as $row) :
            $output['productid'] = $row->productid;
            $output['productname'] = $row->productname;
            $output['description'] = $row->description;
            $output['supplierid'] = $row->supplierid;
            $output['categoryid'] = $row->categoryid;
            $output['brandid'] = $row->brandid;
            $output['price'] = $row->price;
            $output['cost'] = $row->cost;
            $output['date_add'] = $row->date_add;
            $output['qty'] = $row->qty;
            $output['userid'] = $row->userid;
            $output['status'] = $row->status;
        endforeach;
        return response()->json($output);
    }

    public function edit(Request $request)
    {
        try {
            //code...
            $productid = $request->post('productid');
            $product = Product::find($productid);
            $product->productname = $request->post('productname');
            $product->cost = $request->post('cost');
            $product->price = $request->post('price');
            $product->description = $request->post('description');
            $product->categoryid = $request->post('category');
            $request->supplierid = $request->post('supplier');
            $request->brandid = $request->post('brand');
            $product->qty = $request->post('qty');
            if (!$product->save()) {
                Alert::error('Error', 'Data update fail');
                return redirect()->back();
            } else {
                Alert::success('Success', 'Data has been updated');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "This is error " . $th->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        try {
            //code...
            $productid = $request->post('productid');
            $product = Product::find($productid);
            if (!$product->delete()) {
                Alert::error('Error', 'Data delete fail');
                return redirect()->back();
            } else {
                Alert::success('Success', 'Data has been deleted');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
    }

    public function editStatus(Request $request)
    {
        try {
            $productid = $request->post('productid');
            $status = $request->post('status');
            $product = Product::find($productid);
            $product->status = $status;
            if (!$product->save()) {
                Alert::error('Error', 'Data update fail');
                return redirect()->back();
            } else {
                Alert::success('Success', 'Data has been updated');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
    }
}