<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomMail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(){
        $response = Curl::to(url('api/get-states-api'))->get();
        $data = json_decode($response);
        return view('admin.pages.register')->with('data',$data);
    }
    public function call_city(Request $req){
        $response = Curl::to(url('api/get-cities-api'))->withData(
            ['id'=>$req->city])->post();;
        $data = json_decode($response);
        return $data;
    }
    public function post_register(Request $req){
        $response = Curl::to(url('api/register-api'))->withData([
            'name'=> $req->name,
            'phone'=> $req->phone,
            'email'=> $req->email,
            'contact_adr_1'=> $req->contact_adr_1,
            'contact_adr_2'=> $req->contact_adr_2,
            'contact_pincode'=> $req->contact_pincode,
            'contact_city'=> $req->contact_city,
            'contact_state'=> $req->contact_state,
            'contact_meu'=> $req->contact_meu,
            'type_meu'=> $req->type_meu,
            'contact_visit'=> $req->contact_visit,
        ])->post();
        $arr_err = json_decode($response);
        if (!($arr_err->error)) {
            $send_mail = [
                'pass' => $arr_err->pass,
                'link' => $arr_err->link,
            ];
            Mail::to($arr_err->email)->send(new welcomMail($send_mail));
            Session::put('message',$arr_err->message);
            Session::put('error',$arr_err->error);
            return redirect()->route('login');
        }
        Session::put('message',$arr_err->message);
        Session::put('error',$arr_err->error);
        return redirect()->back();
      
    }
    public function login(Request $req){
        return view('admin.pages.login');
    }
    public function site_inspection_detail(Request $req){
        return view('admin.pages.index');
    }
}
