<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home.index');
    }

    public function login(){
        return view('admin.home.login');
    }
    public function register(){
        return view('admin.home.register');
    }
    public function forgotPass(){
        return view('admin.home.page_forgot_password');
    }
}
