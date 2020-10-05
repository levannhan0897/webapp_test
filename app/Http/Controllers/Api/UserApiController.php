<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomMail;
use Illuminate\Support\Str;
use DB;
class UserApiController extends Controller
{
    public function url($urlcall){
        return 'http://localhost/webapp_test/public/'.$urlcall;
    }
    public function register_api(Request $req){
        $validator = Validator::make($req->all(), [
            'name'=> 'required',
            'phone'=> 'required',
            'email'=> 'required|email',
            'contact_adr_1'=> 'required',
            'contact_pincode'=> 'required|min:5',
            'contact_city'=> 'required',
            'contact_state'=> 'required',
            'contact_meu'=> 'required|numeric',
            'type_meu'=> 'required',
            'contact_visit'=> 'required',
            ], [
                'email.required' => 'Email cannot be left blank',
                'email.email'=>'Incorrect email format',
                'name.required' => 'Name cannot be left blank',
                'phone.required' => 'Phone cannot be left blank',
                'contact_adr_1.required' => 'Address cannot be left blank',
                'contact_pincode.required' => 'Phone cannot be left blank',
                'contact_pincode.min' => 'Please enter at least 6 characters.',
                'contact_state.required' => 'State cannot be left blank',
                'contact_city.required' => 'City cannot be left blank',
                'contact_meu.required' => 'Electricity cannot be left blank',
                'contact_meu.numeric' => 'You cannot enter must be a number.',
                'contact_visit.required' => 'Date and Time cannot be left blank',
            ]);
        if ($validator->fails()){
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors(),
                ], 200);
            }
        // if (User::where('email', $req->email)->where('active',1)->first()) {
        //     $validator->getMessageBag()->add('email', 'Email already exists');
        //     return response()->json([
        //         'error' => true,
        //         'message' => $validator->errors(),
        //     ], 200);
        // }
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $random_pass = Str::random(10);
        $user->password = md5($random_pass);
        $link_checkmail_random = Str::random(20);
        $user->user_key = md5($link_checkmail_random);
        $user->save();

        $contact = new Contact();
        $contact->id_user = $user->id;
        $contact->contact_name = $user->name;
        $contact->contact_email = $user->email;
        $contact->contact_adr_1 = $req->contact_adr_1;
        $contact->contact_adr_2 = $req->contact_adr_2;
        $contact->contact_pincode = $req->contact_pincode;
        $name_city = DB::table('cities')->where('id',$req->contact_city)->first();
        $contact->contact_city = $name_city->city;
        $name_state = DB::table('states')->where('id',$req->contact_state)->first();
        $contact->contact_state = $name_state->name;
        $contact->contact_phone = $user->phone;
        $contact->contact_meu = $req->contact_meu;
        $contact->type_meu = $req->type_meu;
        $contact->contact_visit = $req->contact_visit;
        $contact->save();

        $link_confirm = url('confirm-account-api/'.$user->id.'/'.$link_checkmail_random);
        $data = [
            'error' => false,
            'message'=>'Successfully subscribed to emial to confirm',
            'email'=> $user->email,
            'pass'=> $random_pass,
            'link'=> $link_confirm,
        ];
        return response()->json($data);
    }
    public function confirm_account_api(Request $req){
        $user = User::where('user_key',md5($req->user_key))->first();
        if(isset($user)){
            User::where('id',$req->id)->update(['active'=>1]);
            return response()->json([
                'message'=>'Account verification is successful',
            ], 200);
        }
        return response()->json([
            'message'=>'Account activation failed',
        ], 200);
    }
    public function login_api(Request $req){
        $validator = Validator::make($req->all(), [
            'email'=> 'required|email',
            'password'=> 'required'
            ], [
                'email.required' => 'Email cannot be left blank',
                'email.email'=>'Incorrect email format',
                'password.required' => 'Password cannot be left blank',
            ]);
        if ($validator->fails()){
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors(),
                ], 200);
            }
        $user = User::where('email',$req->email)->where('password',md5($req->password))->first();
        if(isset($user)){
            return response()->json([
                'error' => true,
                'message' => 'Login ok',
            ], 200);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Account or login name is incorrect',
            ], 200);
        }
    }
    public function forgot_password_api(Request $req){
        $validator = Validator::make($req->all(), [
            'email'=> 'required|email',
            ], [
                'email.required' => 'Email cannot be left blank',
                'email.email'=>'Incorrect email format',
            ]);
            if ($validator->fails()){
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors(),
                ], 200);
            }
            $user = User::where('email',$req->email)->first();
            if(isset($user)){
                $link_checkmail_random = Str::random(20);
                User::where('id',$user->id)->update(['user_key'=>md5($link_checkmail_random)]);
                $link_confirm = url('forgot-password-api/'.$user->id.'/'.$link_checkmail_random);
                $data = [
                    'link'=> $link_confirm,
                ];
                Mail::to($user->email)->send(new welcomMail($data));
                return response()->json([
                    'error' => false,
                    'message'=>'Successful registration check email to receive password',
                ], 200);
            }else{
                return response()->json([
                    'error' => true,
                    'message'=>'Email does not exist',
                ], 200);
            }
    }
    public function get_states_api(Request $req){
        $country = DB::table('states')->get();
        return response($country);
    }
    public function get_cities_api(Request $req){
        $country = DB::table('cities')->where('state_id',$req->id)->get();
        return response($country);
    }
}
