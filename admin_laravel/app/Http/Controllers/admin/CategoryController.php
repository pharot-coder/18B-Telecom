<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $data = Category::all();
        return view('admin/category', [
            'data' => $data
        ]);
    }

    public function getRow(Request $request)
    {
        try {
            //code...
            $categoryid = $request->get('categoryid');
            $output = array();
            $data = Category::where('categoryid', $categoryid)->get();
            foreach ($data as $row) :
                $output['categoryid'] = $row->categoryid;
                $output['categoryname'] = $row->categoryname;
                $output['status'] = $row->status;
            endforeach;
        } catch (\Throwable $th) {
            //throw $th;
            $output['error'] = $th->getMessage();
        }
        return response()->json($output);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'categoryname' => 'required'
        ]);

        $category = new Category;
        $category->categoryname = $request->post('categoryname');

        if (!$category->save()) {
            Alert::error('Error', 'Data has been insert fail');
            return redirect()->back();
        } else {
            Alert::success('Success', 'Data has been successfully inserted');
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        $categoryid = $request->post('categoryid');
        try {
            //code...
            $category = Category::find($categoryid);
            $category->status = $request->post('status');
            if (!$category->save()) {
                Alert::error('Error', 'Status update fail');
                return redirect()->back();
            } else {
                Alert::success('Success', 'Status update success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "error " . $th->getMessage();
        }
    }

    public function edit(Request $request)
    {
        $categoryid = $request->post('categoryid');
        try {
            //code...
            $category = Category::find($categoryid);
            $category->categoryname = $request->post('categoryname');
            if (!$category->save()) {
                Alert::error('Error', 'Data update fail');
                return redirect()->back();
            } else {
                Alert::success('Success', 'Data has been update success');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "errro " . $th->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        try {
            //code...
            $categoryid = $request->post('categoryid');
            $category = Category::find($categoryid);
            if (!$category->delete()) {
                Alert::error('Error', 'Data has been delete fail');
                return Redirect::back();
            } else {
                // return Redirect::back()->with('success', 'Category delete success');
                Alert::success('Success', 'Data has been deleted');
                return Redirect::back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
    }
}