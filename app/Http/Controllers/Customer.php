<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Customer extends Controller
{
    public function index(){
        return view('admin.pages.customer.index');
    }
}
