<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Installer extends Controller
{
    public function index(){
        return view('admin.pages.installer.index');
    }
}
