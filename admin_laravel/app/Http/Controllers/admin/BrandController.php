<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Arr;

class BrandController extends Controller
{
    //
    public function index()
    {
        $brandData = Brand::all();
        return view('admin/brand', [
            'brandData' => $brandData
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'brandname' => 'required',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);
        try {
            //code...
            $imageName = $request->file('image')->store('');
            $request->image->move(public_path('../../assets/img'), $imageName);
            $brand = new Brand;
            $brand->brandname = $request->brandname;
            $brand->images = $imageName;
            if (!$brand->save()) {
                return redirect(url('/brand'))->with('error', 'Add Fail !');
            } else {
                return redirect(url('/brand'))->with('success', 'Add Success');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error" . $th->getMessage();
        }
    }

    public function getRow(Request $request)
    {
        $id = $request->get('brandid');
        $output = array();
        $brandData =  Brand::where('brandid', $id)->get();
        foreach ($brandData as $row) {
            $output['brandid'] = $row->brandid;
            $output['brandname'] = $row->brandname;
            $output['status'] = $row->status;
        }

        echo json_encode($output);
    }

    public function destroy(Request $request)
    {
        try {
            $brandid = $request->post('brandid');
            $brand = Brand::find($brandid);
            if (!$brand->delete()) {
                return redirect(url('/brand'))->with('error', 'Delete Fail !');
            } else {
                return redirect(url('/brand'))->with('success', 'Delete Success');
            }
        } catch (\Throwable $th) {
            echo "Error" . $th->getMessage();
        }
    }

    public function editStatus(Request $request)
    {
        try {
            //code...
            $brandid = $request->post('brandid');
            $brand = Brand::find($brandid);
            $brand->status = $request->post('status');
            if (!$brand->save()) {
                return redirect(url('/brand'))->with('error', 'Status update Fail !');
            } else {
                return redirect(url('/brand'))->with('success', 'Status update Success');
            }
        } catch (\Throwable $th) {
            echo "Error" . $th->getMessage();
        }
    }

    public function editData(Request $request)
    {
        try {
            $request->validate([
                'brandname' => 'required'
            ]);

            $brandid = $request->post('brandid');
            $brandname = $request->post('brandname');
            $brand = Brand::find($brandid);
            $brand->brandname = $brandname;
            if (!$brand->save()) {
                return redirect(url('/brand'))->with('error', 'Brand Name update fail !');
            } else {
                return redirect(url('/brand'))->with('success', 'Brand Name update success');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error" . $th->getMessage();
        }
    }
}