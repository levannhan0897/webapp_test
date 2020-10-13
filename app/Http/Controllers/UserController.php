<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
    public function update_inspection_detail(Request $req){
        $response = Curl::to(url('api/update-inspection-api'))->withData([
            'id' => $req->id,
            'name' => $req->name,
            'val' => $req->val
        ])->post();
        $data = json_decode($response);
        return response()->json([$data]);
    }
    public function get_inspection_detail(Request $req){
        $response = Curl::to(url('api/get-inspection-api'))->withData([
            'id' => $req->id,
        ])->get();
        $data = json_decode($response);
        return view('admin.pages.index')->with('data',$data);
    }
    public function show_list_inspec(Request $req){
        return view('admin.pages.list-inspec');
    }
    public function save_img_canvar(Request $req){
        $img = $req->imgBase64;
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        //saving
        $filename = 'img-canvar';
        $new_filename = $filename.Str::random(5).'.png';
        file_put_contents('img/'.$new_filename, $fileData);
        $response = Curl::to(url('api/save-img-canvar-api'))->withData([
            'id'=>$req->id,
            'panel_image' => $new_filename,
        ])->post();
        return response()->json();
    }
}
