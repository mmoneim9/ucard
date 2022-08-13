<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMobile as um;
use App\Models\Cats;
use App\Models\Cards;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\rechargelog;
use App\Models\cardvalues;
use App\Models\manualrechargelog;
use App\Models\manualgames;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserMobile extends Controller
{
  public function contactus(Request $r){
    $UserMobile = um::where(["email"=>$r->email])->first();
    if($UserMobile->count()>0){
    Mail::send('contact', ["name"=>$UserMobile->name,"email"=>$UserMobile->email,"mobile"=>$UserMobile->mobile,"msg"=>$r->msg] , function($message)  use ($UserMobile) {
    $message->to("ucard.eg@gmail.com", 'Ucard App')
            ->subject('New Message from UCard App');
          });
    return response()->json(["success"=>"success","errors"=>""]);

}else{
return response()->json(["success"=>"false","errors"=>"Wrong details please try again"]);

}
}
public function getmrechargelog(Request $r){
  $date =  date("Y/m/d", strtotime("-2 months"));

  $UserMobile = manualrechargelog::where(["email"=>$r->email])->where("dt",">",$date)->orderBy('id', 'DESC')->get();
  if($UserMobile->count()>0){
  return response()->json($UserMobile);
}else {
   return response()->json(new manualrechargelog());
 }
}
public function getrechargelog(Request $r){
   $date =  date("Y/m/d", strtotime("-2 months"));

  $UserMobile = rechargelog::where(["email"=>$r->email])->where("dt",">",$date)->orderBy('id', 'DESC')->get();
  if($UserMobile->count()>0){
  return response()->json($UserMobile);
}else {
   $res = array('error' =>"error");
   return response()->json(new rechargelog());

}
}
    public function register(Request $r){
         $validator = Validator::make($r->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:usermobile',
        'password' => 'required|string|min:6'
    ]);
       if ($validator->fails())
    {
        $err="";
        foreach($validator->errors()->all() as $e){
            $err.= $e;
        }
        return response()->json(['errors'=>$e,"success"=>"false"]);
    }else{
      $UserMobile = new um();
     $UserMobile->name = $r->name;
     $UserMobile->email = $r->email;
     $UserMobile->address = $r->address;
     $UserMobile->activationcode = rand(pow(10, 6-1), pow(10, 6)-1);
     $UserMobile->password = Hash::make($r->password);
     $UserMobile->balance = 0;
     $UserMobile->save();
   return response()->json(["success"=>"success","errors"=>"false"]);
    }
    }
    public function changepassword(Request $r){
         $validator = Validator::make($r->all(), [
        'email' => 'required|string|email|max:255',
        'cpass' => 'required|string|min:6',
        'newpass' => 'required|string|min:6',
        'cnewpass' => 'required|string|min:6'
    ]);
       if ($validator->fails())
    {
        $err="";
        foreach($validator->errors()->all() as $e){
            $err.= $e;
        }
        return response()->json(['errors'=>$e,"success"=>"false"]);
    }else{
      $UserMobile = um::where(["email"=>$r->email])->first();
      if (Hash::check($r->cpass,$UserMobile->password)) {
        $UserMobile->password = Hash::make($r->newpass);
        $UserMobile->save();
      return response()->json(["success"=>"success","errors"=>""]);
      }else{
        return response()->json(["success"=>"false","errors"=>"Wrong details please try again"]);

      }
      return response()->json(["success"=>"false","errors"=>"Wrong details please try again"]);
    }
    }

    public function getinfo(Request $r){
      $umobile = um::where(["email"=>$r->email])->get()->first();
      return response()->json($umobile);
    }
    public function getcategories(Request $r){
      $UserMobile = um::where(["email"=>$r->email])->get()->first();
      if($UserMobile->approve =="Y"){
      $categories = Cats::all();
      return response()->json($categories);
}else{
  return response()->json(new Cats());

}
    }
    public function login(Request $r){
      $validator = Validator::make($r->all(), [
     'email' => 'required|string|email|max:255',
     'password' => 'required|string|min:6'
 ]);
 if ($validator->fails())
{
  $err="";
  foreach($validator->errors()->all() as $e){
      $err.= $e;
  }
  return response()->json(['errors'=>$e,"success"=>"false"]);
}else{
$UserMobile = um::where(["email"=>$r->email])->first();
if (Hash::check($r->password,$UserMobile->password)) {
   // The passwords match...
return response()->json(["success"=>"success","errors"=>""]);
}else{
  return response()->json(["success"=>"false","errors"=>"Wrong details please try again"]);

}
}

    }
    public function forgetpass(Request $r){
      $UserMobile = um::where(["email"=>$r->email])->first();
      if($UserMobile->count()>0){
        $code =  rand(pow(10, 6-1), pow(10, 6)-1);
      $UserMobile->activationcode = $code;
      $UserMobile->save();
      Mail::send('email', ["name"=>$UserMobile->name,"code"=>$code] , function($message)  use ($UserMobile) {
      $message->to($UserMobile->email, 'Ucard App')
              ->subject('Ucard App PAssword Reset');
            });
      return response()->json(["success"=>"success","errors"=>""]);

}else{
  return response()->json(["success"=>"false","errors"=>"Wrong details please try again"]);

}
}
public function resetpass(Request $r){
  $validator = Validator::make($r->all(), [
 'email' => 'required|string|email|max:255',
 'password' => 'required|string|min:6'
]);
if ($validator->fails())
{
 $err="";
 foreach($validator->errors()->all() as $e){
     $err.= $e;
 }
 return response()->json(['errors'=>$e,"success"=>"false"]);
}else{
  $UserMobile = um::where(["email"=>$r->email,"activationcode"=>$r->code])->first();
  if($UserMobile->count()>0){
  $UserMobile->password =  Hash::make($r->password);
  $UserMobile->save();
  return response()->json(["success"=>"success","errors"=>""]);

}else{
return response()->json(["success"=>"false","errors"=>"Wrong details please try again"]);
}
}
}
public function autorecharge(Request $r){
  $UserMobile = um::where(["email"=>$r->email])->first();
  if($UserMobile->count()>0){
  if ($UserMobile->isautorecharge == "Y"){
  $UserMobile->balance =$UserMobile->balance + (int) $r->balance;
  $UserMobile->save();
  $rlog =new  rechargelog();
  $rlog->email = $r->email;
  $rlog->balance = $r->balance;
  $rlog->dt = date("Y/m/d");
  $rlog->save();
  return response()->json(["success"=>"تمت العملية بنجاح","errors"=>""]);
}else{
  return response()->json(["success"=>"false","errors"=>"ليس لديك صلاحية للشحن الاوتوماتيكي"]);

}
}
}
public function getbalance(Request $r){
  $UserMobile = um::where(["email"=>$r->email])->first();
  if($UserMobile->count()>0){
    return response()->json(["success"=>$UserMobile->balance,"errors"=>""]);

}else{
  return response()->json(["success"=>"false","errors"=>"Error"]);

}

}
public function myinfo(Request $r){
  $validator = Validator::make($r->all(), [

    'name' => 'required|string|min:3',
    'address' => 'required|string|min:3',
    'shopname' => 'required|string|min:3',
    'mobile' => 'required|string|min:10'
]);
if ($validator->fails())
{
 $err="";
 foreach($validator->errors()->all() as $e){
     $err.= $e;
 }
 return response()->json(['errors'=>$e,"success"=>"false"]);
}else{
  $UserMobile = um::where(["email"=>$r->email])->first();
  if($UserMobile->count()>0){
    $UserMobile->name = $r->name;
    $UserMobile->address = $r->address;
    $UserMobile->shopname = $r->shopname;
    $UserMobile->mobile = $r->mobile;
  $UserMobile->save();
  return response()->json(["success"=>"success","errors"=>""]);

}else{
return response()->json(["success"=>"false","errors"=>"Wrong details please try again"]);
}
}

}
public function manualrecharge(Request $r){

  $UserMobile = um::where(["email"=>$r->email])->first();
  if((int)$r->amount<=(int)$UserMobile->balance || (int)$r->amount ==(int)$UserMobile->balance ){
        $balance = (int)$UserMobile->balance -(int) $r->amount;
        $UserMobile->balance = $balance;
        $UserMobile->save();
    $mrecharge = new manualrechargelog();
    $mrecharge->email = $r->email;
    $mrecharge->game = $r->game;
    $mrecharge->cardno = "None";
    $mrecharge->amount = $r->amount;
    $mrecharge->cardtype = $r->gametype;
    $mrecharge->playerid = $r->playerid." || ".$r->zone;
    $mrecharge->dt = date("Y/m/d");
    $mrecharge->save();
    define('API_ACCESS_KEY',"AAAAfLzwox4:APA91bFOIpEfnUlNc5F8b52LasSnh3FtU_qgPVET4yRTxo_ngddVz9mvP9DuuRxml-bk9Js7RHVhLUsmMNB6ZfflA-VRTywTJRKjSXYqS9A-Z-w-V-YF9-kObEfF8cwQETyPp_gJyxkT");
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
 $token='235zgagasd634sdgds46436';

     $notification = [
            'title' =>'New Manual Recharge Request',
            'body' => "from ".$r->email,
            'icon' =>'https://www.ucash.sky-tech-eg.com/uploads/ucardlogo.png',
        ];
        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];
        $admins = User::all();
        foreach($admins as $a){
        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        =>$a->token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
}
    Mail::send('emailadmin', ["email"=>$r->email,"amount"=>$r->amount,"playerid"=>$r->playerid." || ".$r->zone,"game"=>$r->game] , function($message)  use ($UserMobile) {
    $message->to("ucard.eg@gmail.com", 'Ucard App')
            ->subject('UCard App Recharge Request');
          });

  return response()->json(["success"=>"success","errors"=>""]);

}else{
return response()->json(["success"=>"false","errors"=>"ليس لديك رصيد كاف لعملية الشحن"]);
}
}
public function getpubg(Request $r){

  $pubg = manualgames::where(["gamename"=>"pubg"])->get();
return response()->json($pubg);
}
public function getfreefire(Request $r){

  $pubg = manualgames::where(["gamename"=>"freefire"])->get();
return response()->json($pubg);
}
public function getlegend(Request $r){

  $pubg = manualgames::where(["gamename"=>"legend"])->get();
return response()->json($pubg);
}
public function getcards(Request $r){

  $pubg = cards::where(["catid"=>$r->cardid])->get();
return response()->json($pubg);
}
public function getcardvalue(Request $r){

  $UserMobile = um::where(["email"=>$r->email])->first();
  if (Hash::check($r->password,$UserMobile->password)) {

    if((int)$UserMobile->balance < (int)$r->amount || (int)$UserMobile->balance == (int)$r->amount){
      return response()->json(["success"=>"false","error"=>"true"]);

    }else{
    $cv =  cardvalues::where(["cardid"=>$r->cardid,"ischarged"=> "N"])->get();
    if($cv->count()>0){
      $card = $cv->first();
      $card->ischarged="Y";
      $card->save();
      $val = decrypt($card->val);
      $card->val = $val;
      $card->success = "success";
      $mrecharge = new manualrechargelog();
      $mrecharge->email = $r->email;
      $mrecharge->game = $r->game;
      $mrecharge->cardtype = $r->gametype;
      $mrecharge->amount = $r->amount;
      $mrecharge->playerid = "no";
      $mrecharge->dt = date("Y/m/d");
      $mrecharge->cardno =   $val;
      $mrecharge->save();
      $bal =  (int) $UserMobile->balance -(int) $r->amount;
      $UserMobile->balance = $bal;
      $UserMobile->save();
      return response()->json($card);
}
}
}
return response()->json(["success"=>"false","error"=>"true"]);
}
public function getcardavailable(Request $r){
    $cv =  cardvalues::where(["cardid"=>$r->cardid,"ischarged"=> "N"])->get();
    if($cv->count()>0){
      return response()->json(["success"=>"available","error"=>"true"]);
}
return response()->json(["success"=>"false","error"=>"true"]);
}
}
