<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $userData = User::all();
        return view('admin.user', [
            'userData' => $userData
        ]);
    }
}