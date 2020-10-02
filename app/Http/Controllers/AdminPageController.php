<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index(){
        return view('admin.pages.index');
    }
    public function login(){
        return view('admin.pages.login');
    }
    public function contact(){
        return view('admin.pages.contact');
    }
    public function getContact(){
        return view('admin.pages.get-contact');
    }
    public function register(){
        return view('admin.pages.register');
    }
}
