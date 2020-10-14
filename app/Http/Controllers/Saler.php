<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Ixudra\Curl\Facades\Curl;
use App\Http\Controllers\MailController;

class Saler extends Controller
{
    public function index(){
        return view('admin.pages.saler.index');
    }
    public function getContact(){
        $listUser = $this->getListUser();
        return view('admin.pages.saler.get-contact',['data'=>$listUser]);
    }

    public function getDasboard(){
        return view('admin.pages.saler.getDasboard');
    }

    public function getListPotentials(){
        return view('admin.pages.saler.potential-list');
    }
    public function getListProject(){
        return view('admin.pages.saler.project-list');
    }
    public function getListInspection(){
        return view('admin.pages.saler.list-inspection');
    }
    public function getListUser(){
        $response = Curl::to(route('getListUser'))->get();
        $response = json_decode($response);
        foreach ($response as $res){
            foreach ($res as $r){
                $createdAt = Carbon::parse($r['created_at']);
                // $createdAt  = $createdAt->format('d/m/Y-H:i A');
                // $r->created_at = $createdAt;
                // if ($r->confirm_status==0){
                //     $data['isconfirmed'][] = $r;
                // }
                // else{
                //     $data['notconfirmed'][] = $r;
                // }
            }
        }
        return $data;
    }
    public function getDetailUser(Request $request,$id){
        $response = Curl::to(asset('api/getDetailUser/').'/'.$id)->get();
        $response = json_decode($response);
        $createdAt = Carbon::parse($response->created_at);
        $createdAt  = $createdAt->format('Y-m-d\TH:i');
        $schedule_date = Carbon::parse($response->schedule_date);
        $schedule_date  = $schedule_date->format('Y-m-d\TH:i');
        return response()->json(['data' => ['name'=>$response->name, 'email'=>$response->email,'id'=>$id,'confirm_status'=>$response->confirm_status,'address1'=>$response->address1,'createAt'=>$createdAt,'scheduleDate'=>$schedule_date]]);
    }
    public function getEditUser(Request $request,$id){
        $this->validate($request,
            [
                'address1'=> 'required',
            ],
            [
                'address1.required' => 'ban chua nhap email',
            ]
        );
        $scheduleDate = $request->scheduleDate;
        $user = Curl::to(asset('api/getDetailUser').'/'.$id)->get();
        if ($scheduleDate == $user->schedule_date){
            return response()->json(['data'=>'error']);
        }
        else{
                $scheduleDate = $request->scheduleDate;
//                Carbon::today();
        $response = Curl::to(asset('api/editUser').'/'.$id)
                ->withData(['address1'=>$request->address1,'scheduleDate'=>$request->scheduleDate])
                ->put();
            $response = json_decode($response);
            MailController::send($request->scheduleDate);
            return response()->json(['data' => ['name'=>$response->name, 'email'=>$response->email,'id'=>$id,'confirm_status'=>$response->confirm_status,'address1'=>$request->address1,'scheduleDate'=>$scheduleDate]]);
        }
    }
}
