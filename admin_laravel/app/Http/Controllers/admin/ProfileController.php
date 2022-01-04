<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Svg\Tag\Rect;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    //
    public function index()
    {
        try {
            //code...
            $userid = Auth::user()->userid;
            $data = User::where('userid', '=', $userid)
                ->select('userid', 'username', 'first_name', 'last_name', 'email', 'address', 'phone', 'userlevel', 'register_date', 'images')
                ->get();
            if (count($data) > 0) {
                return view('admin.profile', [
                    'data' => $data
                ]);
            } else {
                return view('admin.profile');
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "Error " . $th->getMessage();
        }
    }

    public function edit(Request $request)
    {
        $userid = Auth::user()->userid;
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'username' => 'required'
        ]);
        $user = User::find($userid);
        $user->first_name = $request->post('first_name');
        $user->last_name = $request->post('last_name');
        $user->email = $request->post('email');
        $user->username = $request->post('username');
        if (!$user->save()) {
            Alert::error('Error', 'User profile has been update failed');
            return redirect()->back();
        } else {
            Alert::success('Success', 'User profile has been updated successfully');
            return redirect()->back();
        }
    }
}