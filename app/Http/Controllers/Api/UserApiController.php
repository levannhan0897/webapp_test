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
use FFMpeg\FFMpeg;
use DB;
use File;
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
    public function roundTo($number, $to){
        return round($number/$to, 0)* $to;
    }
    public function get_inspection_api(Request $req){
        $get_inspec = DB::table('inspection')->where('id',$req->id)->get();
        return response($get_inspec);
    }
    public function update_inspection_api(Request $req){
        $inspection = DB::table('inspection')->where('id',$req->id)->update([
            $req->name=>$req->val
            ]);
        $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        $remaining = null;
        $emi = null;
        $system_size=null;
        $tpc=null;
        
        if(isset($get_inspec->average_monthly_usage)&&isset($get_inspec->average_sun_hours)&&isset($get_inspec->bill_offset)){
        $system_size = ((($get_inspec->average_monthly_usage/30)/$get_inspec->average_sun_hours)*1.1)*(($get_inspec->bill_offset)/100);
        }
        if(isset($get_inspec->system_size)){
            $effective = self::roundTo($get_inspec->system_size,0.32);
            if(0<$effective && $effective<=3){
                $tpc=$effective*480000;
            }
            if(3<$effective && $effective<=6){
                $tpc=$effective*470000;
            }
            if(6<$effective && $effective<=10){
                $tpc=$effective*460000;
            }
            if(10<$effective){
                $tpc=$effective*450000;
            }
        }
        if(isset($get_inspec->deposit)){
            $remaining = $tpc-($get_inspec->deposit);
        } 
        if(isset($get_inspec->interest)&&isset($get_inspec->of_months)){
            $p = $tpc-($get_inspec->down_payment);
            $emi = $p*($get_inspec->interest)*(1+($get_inspec->interest))*($get_inspec->of_months)/((1+$get_inspec->interest)*($get_inspec->of_months)-1);
        }
        $inspection = DB::table('inspection')->where('id',$req->id)->update([
                'system_size'=> $system_size,
                'remaining'=>$remaining,
                'emi'=>$emi,
                'tpc'=>$tpc
        ]);
        $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        // ss1
        if(isset($get_inspec->average_monthly_usage) && isset($get_inspec->average_sun_hours)&&isset($get_inspec->lat)&&isset($get_inspec->long)&&isset($get_inspec->system_size)){
            DB::table('inspection')->where('id',$req->id)->update(['session_1' => 1]);
        }else{
            DB::table('inspection')->where('id',$req->id)->update(['session_1' => 0]);
        }
        //ss2
        if(isset($get_inspec->small_leg) && isset($get_inspec->large_leg)&&isset($get_inspec->number_of_rows)&&isset($get_inspec->inverter_length)){
            DB::table('inspection')->where('id',$req->id)->update(['session_2' => 1]);
        }else{
            DB::table('inspection')->where('id',$req->id)->update(['session_2' => 0]);
        }
        // ss3
        if(isset($get_inspec->deposit) && isset($get_inspec->down_payment)&&isset($get_inspec->interest)&&isset($get_inspec->of_months)){
            DB::table('inspection')->where('id',$req->id)->update(['session_3' => 1]);
        }else{
            DB::table('inspection')->where('id',$req->id)->update(['session_3' => 0]);
        }
        $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        if(isset($get_inspec->system_size)||isset($get_inspec->remaining)||isset($get_inspec->emi)||isset($get_inspec->tpc)){
            return response()->json([
                'system_size'=>$get_inspec->system_size,
                'remaining'=>$get_inspec->remaining,
                'emi'=>$get_inspec->emi,
                'tpc'=>$get_inspec->tpc,
                'ss1'=>$get_inspec->session_1,
                'ss2'=>$get_inspec->session_2,
                'ss3'=>$get_inspec->session_3,
            ], 200);
        }
        return response()->json([
            'message'=>'update ok',
            'ss1'=>$get_inspec->session_1,
            'ss2'=>$get_inspec->session_2,
            'ss3'=>$get_inspec->session_3,
        ], 200);
    }
    public function save_img_canvar_api(Request $req){
        $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        $image_path = "img/".$get_inspec->panel_image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $get_inspec = DB::table('inspection')->where('id',$req->id)->update([
            'panel_image'=>$req->panel_image
            ]);
        return response()->json([
            'message'=>'save img ok',
        ], 200);
    }
    public function update_inspection_detail_document_api(Request $req){
        $file= $req->file('val');
        $duoi_filename = $file->getClientOriginalExtension();
        $array_ok = ['txt','docx','pdf','png','jpeg'];
        if(!in_array($duoi_filename,$array_ok)){
            return response()->json([
                'error'=>true,
                'message'=>'the files format must be txt,docx,pdf,png,jpeg'
            ], 200);
        }
        $filename = $file->getClientOriginalName();
        $name = current(explode('.',$filename));
        $new_filename = $name.Str::random(5).'.'.$duoi_filename;
        $file->move('upload/',$new_filename);

        $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        $file_name_cu = $req->name;
        $image_path = "upload/".$get_inspec->$file_name_cu;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $get_inspec = DB::table('inspection')->where('id',$req->id)->update([
            $req->name=>$new_filename
            ]);
        $url_file = url($new_filename);
          //ss4
        $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        if(isset($get_inspec->document_1) && isset($get_inspec->document_2)&&isset($get_inspec->document_3)){
            DB::table('inspection')->where('id',$req->id)->update(['session_4' => 1]);
        }else{
            DB::table('inspection')->where('id',$req->id)->update(['session_4' => 0]);
        }
        $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        return response()->json([
            'error'=>false,
            'name'=>$req->name,
            'url_file'=>$url_file,
            'ss4'=>$get_inspec->session_4
        ]);
    }
    public function remove_document_api(Request $req){
        $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        $file_doc_old = $req->namedoc;
        $image_path = "upload/".$get_inspec->$file_doc_old;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $get_inspec = DB::table('inspection')->where('id',$req->id)->update([
            $req->namedoc=>null
            ]);
            $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
            if(isset($get_inspec->document_1) && isset($get_inspec->document_2)&&isset($get_inspec->document_3)){
                DB::table('inspection')->where('id',$req->id)->update(['session_4' => 1]);
            }else{
                DB::table('inspection')->where('id',$req->id)->update(['session_4' => 0]);
            }
            $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        return response()->json([
            'deletedoc'=>true,
            'name'=>$req->namedoc,
            'ss4'=>$get_inspec->session_4
        ]);
    }
    public function save_area(Request $req){
        if($req->hasfile('file'))
        {
            foreach($req->file('file') as $file)
            {
                //lay ten file va duoi
                $name=$file->getClientOriginalName();
                //lay ten file
                $tenfile = current(explode('.',$name));
                //lay duoi file vd:jpg,png..
                $duoi_file = $file->getClientOriginalExtension();
                $new_name = $tenfile.Str::random(5).'.'.$duoi_file;
                $new_name_mp4 = $tenfile.Str::random(5).'.mp4';
                $array_ok = ['jpeg','jpg','png'];
                $array_video_ok = ['mp4','flv','avi','mkv','wmv','vob','mpeg'];
                if($req->namedb == 'wiring_path_video'){
                    if(!in_array($duoi_file,$array_video_ok)){
                        return response()->json([
                            'error'=>true,
                            'message'=>'file '.$name.' khong thuoc dinh dang video'
                        ], 200);
                    }else{
                        if($duoi_file!='mp4'){
                            $ffmpeg = FFMpeg::create([
                                'ffmpeg.binaries'  => 'C:/FFmpeg/bin/ffmpeg.exe',
                                'ffprobe.binaries' => 'C:/FFmpeg/bin/ffprobe.exe'
                            ]);
                            $ffmpeg->open($file)
                            ->save(new \FFMpeg\Format\Video\X264('aac'),'file_area/'.$new_name_mp4);

                            $dataname[] = $new_name_mp4;  
                            $url_file[] = url('file_area/'.$new_name_mp4);
                        }else{
                            $file->move('file_area/', $new_name);  
                            $dataname[] = $new_name;  
                            $url_file[] = url('file_area/'.$new_name);
                        }
                    }
                }else{
                    if(!in_array($duoi_file,$array_ok)){
                        return response()->json([
                            'error'=>true,
                            'message'=>'file '.$name.' khong thuoc dinh dang img'
                        ], 200);
                    }
                    $file->move('file_area/', $new_name);  
                    $dataname[] = $new_name;  
                    $url_file[] = url('file_area/'.$new_name);
                }
            }
            //xoa file truoc khi push
            $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
            $name_old = $req->namedb;
            $listname = $get_inspec->$name_old;
            $str = str_replace(array('"','[',']'),array('','',''),$listname);
            $arr_listname=explode(',',$str);
            foreach($arr_listname as $item){
                $image_path = "file_area/".$item;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            //them data
            $get_inspec = DB::table('inspection')->where('id',$req->id)->update([
                $req->namedb=>$dataname
            ]);
        }
          //ss5
          $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        if(isset($get_inspec->panel_area) && isset($get_inspec->inverter_area)&&isset($get_inspec->wiring_path_video)){
            DB::table('inspection')->where('id',$req->id)->update(['session_5' => 1]);
        }else{
            DB::table('inspection')->where('id',$req->id)->update(['session_5' => 0]);
        }
        $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        if($req->namedb == 'wiring_path_video'){
            return response()->json([
                'save'=>true,
                'namedb'=>$req->namedb,
                'style'=>'video',
                'url_file'=>$url_file,
                'ss5'=>$get_inspec->session_5
            ]);
        }
        return response()->json([
            'save'=>true,
            'namedb'=>$req->namedb,
            'style'=>'img',
            'url_file'=>$url_file,
            'ss5'=>$get_inspec->session_5
        ]);
    }
    public function delete_area(Request $req){
        $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
            $name_old = $req->name;
            $listname = $get_inspec->$name_old;
            $str = str_replace(array('"','[',']'),array('','',''),$listname);
            $arr_listname=explode(',',$str);
            foreach($arr_listname as $item){
                $image_path = "file_area/".$item;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
        $get_inspec = DB::table('inspection')->where('id',$req->id)->update([
            $req->name=>null
            ]);
           //ss5    
           $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
           if(isset($get_inspec->panel_area) && isset($get_inspec->inverter_area)&&isset($get_inspec->wiring_path_video)){
               DB::table('inspection')->where('id',$req->id)->update(['session_5' => 1]);
           }else{
               DB::table('inspection')->where('id',$req->id)->update(['session_5' => 0]);
           }
           $get_inspec = DB::table('inspection')->where('id',$req->id)->first();
        if($req->name == 'wiring_path_video'){
            return response()->json([
                'delete'=>true,
                'namedb'=>$req->name,
                'style'=>'video',
                'ss5'=>$get_inspec->session_5
            ]);
        }
        return response()->json([
            'delete'=>true,
            'namedb'=>$req->name,
            'style'=>'img',
            'ss5'=>$get_inspec->session_5
        ]);
    }
    public function save_location(Request $req){
        $get_inspec = DB::table('inspection')->where('id',$req->id)->update([
            'lat'=>$req->lat,
            'long'=>$req->long
            ]);
        return response()->json();
    }
}
