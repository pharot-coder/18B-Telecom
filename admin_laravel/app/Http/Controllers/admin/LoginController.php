<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('admin.login');
    }

    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $remember_me = $request->input('remember_me');

        $user_data = array(
            'email' => $request->post('email'),
            'password' => $request->post('password'),
            'userlevel' => 1
        );

        if (Auth::attempt($user_data, $remember_me)) {
            return redirect(route('dashboard'));
        } else {
            Alert::error('Error', 'Invalid detail please try again later');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }
}