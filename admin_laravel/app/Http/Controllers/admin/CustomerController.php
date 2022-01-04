<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $data = Customer::all();
        return view('admin.customer', [
            'customerData' => $data
        ]);
    }

    public function getRow(Request $request)
    {
        $customerid = $request->get('customerid');
        $output = array();
        try {
            //code...
            $customer = Customer::where('customerid', $customerid)->get();
            foreach ($customer as $row) :
                $output['customerid'] = $row->customerid;
                $output['first_name'] = $row->first_name;
                $output['last_name'] = $row->last_name;
                $output['username'] = $row->username;
                $output['address'] = $row->address;
                $output['phone_number'] = $row->phone_number;
                $output['register_date'] = $row->register_date;
                $output['email'] = $row->email;
                $output['status'] = $row->status;
            endforeach;
        } catch (\Throwable $th) {
            //throw $th;
            echo "error " . $th->getMessage();
        }
        echo json_encode($output);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phonenumber' => 'required',
            'photo' => 'required'
        ]);

        try {
            //code...
            $imageName = $request->file('photo')->store('');
            $request->photo->move(public_path('../../assets/img'), $imageName);
            $customer = new Customer();
            $customer->first_name  = $request->post('first_name');
            $customer->last_name  = $request->post('last_name');
            $customer->username = $request->post('username');
            $customer->email = $request->post('email');
            $customer->password = bcrypt($request->post('password'));
            $customer->address = $request->post('address');
            $customer->phone_number = $request->post('phonenumber');
            $customer->register_date = date('Y-m-d');
            $customer->images = $request->imageName;
            if (!$customer->save()) {
                return redirect(url('/customer'))->with('error', 'Customer add fail !');
            } else {
                return redirect(url('/customer'))->with('success', 'Customer add successfully');
            }
        } catch (\Throwable $th) {
            echo "Error" . $th->getMessage();
        }
    }

    public function get_cart($customerid)
    {
        $data = DB::table('tblcart as c')
            ->leftjoin('tblproduct as p', 'c.productid', '=', 'p.product')
            ->leftJoin('tblcustomer as cu', 'c.customerid', '=', 'cu.customerid')
            ->select('c.*', 'p.productname', 'p.price', 'p.images', 'cu.first_name', 'cu.last_name', 'cu.last_name', 'cu.username')
            ->where('c.customerid', $customerid)
            ->get();
        // return view('admin.cart', [
        //     'cartData' => $data
        // ]);
        print_r($data);
    }

    public function updateStatus(Request $request)
    {
        $status = $request->post('status');
        $customerid = $request->post('customerid');
        try {
            //code...
            $customer =  Customer::find($customerid);
            $customer->status = $status;
            if (!$customer->save()) {
                return redirect(url('/customer'))->with('error', 'Customer status update fail !');
            } else {
                return redirect(url('/customer'))->with('success', 'Customer status update success');
            }
        } catch (\Throwable $th) {
            //throw $th;
             echo "Error " . $th->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        $customerid = $request->post('customerid');
        try {
            //code...
            $customer = Customer::find($customerid);
            $delete = $customer->delete();
            if ($delete) {
                return redirect(url('//customer'))->with('error', 'Customer delete fail');
            } else {
                return redirect(url('/customer'))->with('success', 'Customer delete successfully');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
    }
}