<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class SalerController extends Controller
{
    public function getListUser(){
        $emp = User::all();
        return UserResource::collection($emp);
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->address1 = $request->address1;
        $user->schedule_date = $request->scheduleDate;
        $user->confirm_status = 0;
        $user->save();
        return $user;
    }
    public function getDetailUser(Request $request, $id)
    {
        $user = User::find($id);
        return $user;
    }


}
