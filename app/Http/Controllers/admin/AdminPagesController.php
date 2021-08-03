<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminPagesController extends Controller
{
    public function index() {
        if(session()->has('adminId'))
            return view('admin.dashboard');
        else
            return view('admin.adminauth.login');
        // return view('admin.dashboard'); 
    }   
}
