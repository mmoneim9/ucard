<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cats;
use App\Models\Cards;
use App\Models\cardvalues;
use App\Models\manualgames;
use App\Models\rechargelog;
use App\Models\manualrechargelog;
use App\Models\UserMobile;
use App\Models\User;
use App\Http\Middleware\EnsureLogin;
use Illuminate\Support\Facades\Auth;

class CardsController extends Controller
{
  public function __construct()
{
      $this->middleware('elogin');
}
  public function user(){

    $umobile = UserMobile::all();
    return view("user")->with('users', $umobile);
  }
  public function approveuser($id){
    $umobile = UserMobile::where(["id"=>$id])->get()->first();
    if($umobile->approve == "Y"){
      $umobile->approve = "N";
    }else{
      $umobile->approve = "Y";
    }
    $umobile->save();
    return redirect('/user');
  }

public function approverecharge($id){
  $umobile = UserMobile::where(["id"=>$id])->get()->first();
  if($umobile->isautorecharge == "Y"){
    $umobile->isautorecharge = "N";
  }else{
    $umobile->isautorecharge = "Y";
  }
  $umobile->save();
  return redirect('/user');
}
public function getusers(Request $r){
  $umobile = UserMobile::Where('name', 'like', '%' . $r->name. '%')->get();
  $result = "";
  foreach($umobile as $v){
    $result.="<tr><td>".$v->name."</td><td>".$v->email."</td><td>".$v->shopname."</td><td>".$v->address."</td><td>".$v->balance."</td><td><a href='approveuser/".$v->id."'>".$v->approve."</a></td><td><a href='approverecharge/".$v->id."'>".$v->isautorecharge."</a></td></tr>";
  }
echo $result;
}
public function addcredit(Request $r){
  $umobile = UserMobile::Where(['email'=>$r->email])->first();
  $balance = $umobile->balance + (int) $r->amount;
  $umobile->balance = $balance;
  $rlog =new  rechargelog();
  $rlog->email = $r->email;
  $rlog->balance = $r->amount;
  $rlog->dt = date("Y/m/d");
  $rlog->save();
  $umobile->save();
  return redirect('/user');

}

   public function index(){

     $categories = Cats::all();
     return view("cardcat")->with('categories', $categories);
   }
   public function index2(){

     $categories = Cats::all();
     return view("dashboard2")->with('categories', $categories);
   }
   public function insert(Request $r){
     $file = $r->file('image');

     if($file->getClientOriginalExtension() != "jpg" && $file->getClientOriginalExtension()!="png")
   {
   echo "false";
   $categories = Cats::all();
   return view("cardcat")->with('categories', $categories);
    }
    else {
  $cat = new Cats();
  $cat->name = $r->nm;
  $destinationPath = 'uploads';
  $name =  date("Y-m-d").$file->getClientOriginalName();
  $cat->img =$destinationPath."/".$name;
  $cat->desc = $r->desc;
  $file->move($destinationPath,$name);
  $cat->save();
  $categories = Cats::all();
  return view("cardcat")->with('categories', $categories);
   }


   }
   public function update(Request $r){

     $file = $r->file('image');

     if($file->getClientOriginalExtension() != "jpg" && $file->getClientOriginalExtension()!="png")
   {
   echo "false";
   $categories = Cats::all();
   return view("cardcat")->with('categories', $categories);
    }
    else {
      $destinationPath = 'uploads';
       $name =  date("Y-m-d").$file->getClientOriginalName();
       $cat->img =$destinationPath."/".$name;
      $cat =  Cats::where('id', $r->ID)->first();
      $cat->name = $r->nameupdate;
      $cat->desc = $r->descu;
      $file->move($destinationPath,$name);
      $cat->save();
      $categories = Cats::all();
      return view("cardcat")->with('categories', $categories);

   }

   }
   public function delete($id){
     $cat =  Cats::where('id', $id);
     $cat->delete();
     $categories = Cats::all();
     return redirect("/cardcat");
   }

   public function indexcard(){

     $cards = Cards::all();
     $cats = Cats::all();
     return view("card")->with(['cards'=> $cards,"categories"=> $cats]);
   }
   public function insertcard(Request $r){
     $file = $r->file('image');

     if($file->getClientOriginalExtension() != "jpg" && $file->getClientOriginalExtension()!="png")
   {
   echo "false";

        $cards = Cards::all();
        $cats = Cats::all();
        return view("card")->with(['cards'=> $cards,"categories"=> $cats]);
    }
    else {
  $cat = new Cards();
  $cat->name = $r->nm;
  $destinationPath = 'uploads';
  $name =  date("Y-m-d").$file->getClientOriginalName();
  $cat->img =$destinationPath."/".$name;
  $cat->desc = $r->desc;
  $cat->price = $r->price;
  $cat->catid = $r->ID;
  $file->move($destinationPath,$name);
  $cat->save();

       $cards = Cards::all();
       $cats = Cats::all();
       return view("card")->with(['cards'=> $cards,"categories"=> $cats]);
   }

   }

   public function deletecard($id){
     $cat =  Cards::where('id', $id);
     $cat->delete();

          $cards = Cards::all();
          $cats = Cats::all();
          return redirect('card');;
   }

   public function indexcardvalue(){

     $cards = Cards::all();
     $cardvalues = cardvalues::all();
     return view("crdvalues")->with(['categories'=> $cards,"cardvalues"=>$cardvalues]);
   }
   public function insertcardvalue(Request $r){

  $card  =  Cards::where('id', $r->ID)->first();
  $cardval = new cardvalues();
  $cardval->cardid = $card->id;
  $cardval->price = $card->price;
  $cardval->img = $card->img;
  $cardval->val =  encrypt($r->val);
  $cardval->save();


       $cards  = Cards::all();
       $cardvalues = cardvalues::all();
       return view("crdvalues")->with(['categories'=> $cards,"cardvalues"=>$cardvalues]);

   }

   public function deletecardvalue($id){
     $cat =  cardvalues::where('id', $id);
     $cat->delete();

          $cards = Cards::all();
          $cardvalues = cardvalues::all();
          return redirect('indexcardvalue');
   }
   public function pubg(){

     $mgames = manualgames::where('gamename', 'pubg')->get();
     return view("pubg")->with('mgames', $mgames);
   }
   public function insertpubg(Request $r){
     $file = $r->file('image');

     if($file->getClientOriginalExtension() != "jpg" && $file->getClientOriginalExtension()!="png")
   {
   echo "false";
   $mgames = manualgames::where('gamename', 'pubg')->get();
   return view("pubg")->with('mgames', $mgames);
    }
    else {
  $cat = new manualgames();
  $cat->gamename = "pubg";
  $destinationPath = 'uploads';
  $name =  date("Y-m-d").$file->getClientOriginalName();
  $cat->img =$destinationPath."/".$name;
  $cat->cardtype = $r->typ;
  $cat->price = $r->price;
  $file->move($destinationPath,$name);
  $cat->save();
  $mgames = manualgames::where('gamename', 'pubg')->get();
  return view("pubg")->with('mgames', $mgames);
   }


   }
   public function updatepubg(Request $r){

     $file = $r->file('image');

     if($file->getClientOriginalExtension() != "jpg" && $file->getClientOriginalExtension()!="png")
   {
   echo "false";
   $mgames =  manualgames::where('gamename', 'pubg')->get();
   return view("cardcat")->with('mgames', $mgames);
    }
    else {
      $cat = new manualgames();

      $destinationPath = 'uploads';
       $name =  date("Y-m-d").$file->getClientOriginalName();
       $cat->img =$destinationPath."/".$name;
      $cat =  manualgames::where('id', $r->ID)->first();
      $cat->gamename = "pubg";
      $destinationPath = 'uploads';
      $name =  date("Y-m-d").$file->getClientOriginalName();
      $cat->img =$destinationPath."/".$name;
      $cat->cardtype = $r->typ;
      $file->move($destinationPath,$name);
      $cat->price = $r->price;
      $cat->save();
      $mgames = manualgames::where('gamename', 'pubg')->get();
      return view("pubg")->with('mgames', $mgames);

   }

   }
   public function deletepubg($id){
     $cat =  manualgames::where('id', $id);
     $cat->delete();
     return redirect("/pubg");
   }
   public function legend(){

     $mgames = manualgames::where('gamename', 'legend')->get();
     return view("legend")->with('mgames', $mgames);
   }
   public function insertlegend(Request $r){
     $file = $r->file('image');

     if($file->getClientOriginalExtension() != "jpg" && $file->getClientOriginalExtension()!="png")
   {
   echo "false";
   $mgames = manualgames::where('gamename', 'legend')->get();
   return view("legend")->with('mgames', $mgames);
    }
    else {
  $cat = new manualgames();
  $cat->gamename = "legend";
  $destinationPath = 'uploads';
  $name =  date("Y-m-d").$file->getClientOriginalName();
  $cat->img =$destinationPath."/".$name;
  $cat->cardtype = $r->typ;
  $cat->price = $r->price;
  $file->move($destinationPath,$name);
  $cat->save();
  $mgames = manualgames::where('gamename', 'legend')->get();
  return view("legend")->with('mgames', $mgames);
   }


   }
   public function updatelegend(Request $r){

     $file = $r->file('image');

     if($file->getClientOriginalExtension() != "jpg" && $file->getClientOriginalExtension()!="png")
   {
   echo "false";
   $mgames = manualgames::where('gamename', 'legend')->get();
   return view("legend")->with('mgames', $mgames);
    }
    else {
      $cat = new manualgames();

      $destinationPath = 'uploads';
       $name =  date("Y-m-d").$file->getClientOriginalName();
       $cat->img =$destinationPath."/".$name;
      $cat =  manualgames::where('id', $r->ID)->first();
      $cat->gamename = "legend";
      $destinationPath = 'uploads';
      $name =  date("Y-m-d").$file->getClientOriginalName();
      $cat->img =$destinationPath."/".$name;
      $cat->cardtype = $r->typ;
      $file->move($destinationPath,$name);
      $cat->price = $r->price;
      $cat->save();
      $mgames = manualgames::where('gamename', 'legend')->get();
      return view("legend")->with('mgames', $mgames);

   }

   }
   public function deletelegend($id){
     $cat =  manualgames::where('id', $id);
     $cat->delete();
     return redirect("/legend");
   }



   public function freefire(){

     $mgames = manualgames::where('gamename', 'freefire')->get();
     return view("freefire")->with('mgames', $mgames);
   }
   public function insertfreefire(Request $r){
     $file = $r->file('image');

     if($file->getClientOriginalExtension() != "jpg" && $file->getClientOriginalExtension()!="png")
   {
   echo "false";
   $mgames = manualgames::where('gamename', 'freefire')->get();
   return view("legend")->with('mgames', $mgames);
    }
    else {
  $cat = new manualgames();
  $cat->gamename = "freefire";
  $destinationPath = 'uploads';
  $name =  date("Y-m-d").$file->getClientOriginalName();
  $cat->img =$destinationPath."/".$name;
  $cat->cardtype = $r->typ;
  $cat->price = $r->price;
  $file->move($destinationPath,$name);
  $cat->save();
  $mgames = manualgames::where('gamename', 'freefire')->get();
  return view("freefire")->with('mgames', $mgames);
   }


   }
   public function updatefreefire(Request $r){

     $file = $r->file('image');

     if($file->getClientOriginalExtension() != "jpg" && $file->getClientOriginalExtension()!="png")
   {
   echo "false";
   $mgames = manualgames::where('gamename', 'freefire')->get();
   return view("freefire")->with('mgames', $mgames);
    }
    else {
      $cat = new manualgames();

      $destinationPath = 'uploads';
       $name =  date("Y-m-d").$file->getClientOriginalName();
       $cat->img =$destinationPath."/".$name;
      $cat =  manualgames::where('id', $r->ID)->first();
      $cat->gamename = "freefire";
      $destinationPath = 'uploads';
      $name =  date("Y-m-d").$file->getClientOriginalName();
      $cat->img =$destinationPath."/".$name;
      $cat->cardtype = $r->typ;
      $file->move($destinationPath,$name);
      $cat->price = $r->price;
      $cat->save();
      $mgames = manualgames::where('gamename', 'freefire')->get();
      return view("freefire")->with('mgames', $mgames);

   }

   }
   public function deletefreefire($id){
     $cat =  manualgames::where('id', $id);
     $cat->delete();
     return redirect("/freefire");
   }
   public function rechargelog(Request $r){
     $rechargelog = rechargelog::join('usermobile', 'usermobile.email', '=',
      'rechargelog.email')->select('usermobile.shopname',"usermobile.mobile",
      'rechargelog.*')->where('rechargelog.dt',date("Y/m/d"))->orderBy('rechargelog.id',
       'DESC')->get();
     return View("rechargelog")->with('rechargelog',$rechargelog);
   }
   public function getrecharge(Request $r){

     $umobile = rechargelog::join('usermobile', 'usermobile.email', '=', 'rechargelog.email')->select('usermobile.shopname',"usermobile.mobile",'rechargelog.*')->Where('usermobile.email', $r->email)->get();
     $result = "";
     foreach($umobile as $v){
       $result.="<tr><td>".$v->shopname."</td><td>".$v->mobile."</td><td>".$v->email."</td><td>".$v->balance."</td><td>".$v->dt."</td></tr>";
     }
   echo $result;
   }
   public function getrechargedt(Request $r){

     $umobile = rechargelog::join('usermobile', 'usermobile.email', '=', 'rechargelog.email')->select('usermobile.shopname',"usermobile.mobile",'rechargelog.*')->where('rechargelog.dt',">",$r->firstdate)->where('rechargelog.dt',"<",$r->seconddate)->get();
     $result = "";
     foreach($umobile as $v){
       $result.="<tr><td>".$v->shopname."</td><td>".$v->mobile."</td><td>".$v->email."</td><td>".$v->balance."</td><td>".$v->dt."</td></tr>";
     }
   echo $result;
   }

   public function manualrechargelog(Request $r){
     $rechargelog = manualrechargelog::join('usermobile', 'usermobile.email', '=',
      'manualrechargelog.email')->select('usermobile.shopname',"usermobile.mobile",
      'manualrechargelog.*')->where('manualrechargelog.dt',date("Y/m/d"))->orderBy('manualrechargelog.id',
       'DESC')->get();
     return View("manualrecharge")->with('rechargelog',$rechargelog);
     }
   public function manualrechargelog2(Request $r){
     $rechargelog = manualrechargelog::join('usermobile', 'usermobile.email', '=',
      'manualrechargelog.email')->select('usermobile.shopname',"usermobile.mobile",
      'manualrechargelog.*')->where('manualrechargelog.dt',date("Y-m-d"))->orderBy('manualrechargelog.id',
       'DESC')->get();
       return View("manualrecharge2")->with('rechargelog',$rechargelog);
      }
   public function approvemanualrecharge($id){
          $umobile = manualrechargelog::find($id);
          $umobile->done ="Y";
          $umobile->save();
     return redirect('manualrechargelog');
   }
   public function approvemanualrecharge2($id){
          $umobile = manualrechargelog::find($id);
          $umobile->done ="Y";
          $umobile->save();
            return redirect("pendingrechargesadmin");
          }
   public function getmanualrecharge(Request $r){

     $umobile = manualrechargelog::join('usermobile',
      'usermobile.email', '=', 'manualrechargelog.email')
      ->select('usermobile.shopname',"usermobile.mobile",'manualrechargelog.*')
      ->Where('manualrechargelog.email', $r->email)->orderBy('manualrechargelog.id', 'DESC')->get();
     $result = "";
     foreach($umobile as $v){
       $result.="<tr><td>".$v->mobile."</td><td>".$v->shopname."</td><td>".$v->email."</td><td>".$v->amount."</td><td>
       ".$v->game."</td><td>
       ".$v->cardtype."</td><td>
       ".$v->cardno."</td><td>".$v->playerid."</td><td>".
       $v->dt."</td><td>".$v->done."</td><td><a href='approvemanualrecharge/".$v->id."'>تأكيد اتمام العملية</a></td></tr>";
     }
   echo $result;
   }
   public function getmanualrechargedt(Request $r){

     $umobile = manualrechargelog::join('usermobile',
      'usermobile.email', '=', 'manualrechargelog.email')
      ->select('usermobile.shopname',"usermobile.mobile",'manualrechargelog.*')
     ->where('manualrechargelog.dt',">",$r->firstdate)->where('manualrechargelog.dt',"<",$r->seconddate)->orderBy('manualrechargelog.id', 'DESC')->get();
     $result = "";
     foreach($umobile as $v){
       $result.="<tr><td>".$v->mobile."</td><td>".$v->shopname."</td><td>".$v->email."</td><td>".$v->amount."</td><td>
       ".$v->game."</td><td>
       ".$v->cardtype."</td><td>
       ".$v->cardno."</td><td>".$v->playerid."</td><td>".
       $v->dt."</td><td>".$v->done."</td><td><a href='approvemanualrecharge/".$v->id."'>تأكيد اتمام العملية</a></td></tr>";
     }
   echo $result;
   }

   public function getmanualrecharge2(Request $r){

     $umobile = manualrechargelog::join('usermobile',
      'usermobile.email', '=', 'manualrechargelog.email')
      ->select('usermobile.shopname',"usermobile.mobile",'manualrechargelog.*')
      ->Where('manualrechargelog.email', $r->email)->get();
     $result = "";
     foreach($umobile as $v){
       $result.="<tr><td>".$v->mobile."</td><td>".$v->shopname."</td><td>".$v->email."</td><td>".$v->amount."</td><td>
       ".$v->game."</td><td>
       ".$v->cardtype."</td><td>
       ".$v->cardno."</td><td>".$v->playerid."</td><td>".
       $v->dt."</td><td>".$v->done."</td><td><a href='approvemanualrechargeadmin/".$v->id."'>تأكيد اتمام العملية</a></td></tr>";
     }
   echo $result;
   }
   public function getmanualrechargedt2(Request $r){

     $umobile = manualrechargelog::join('usermobile',
      'usermobile.email', '=', 'manualrechargelog.email')
      ->select('usermobile.shopname',"usermobile.mobile",'manualrechargelog.*')
     ->where('manualrechargelog.dt',">",$r->firstdate)->where('manualrechargelog.dt',"<",$r->seconddate)->orderBy('manualrechargelog.id', 'DESC')->get();
     $result = "";
     foreach($umobile as $v){
       $result.="<tr><td>".$v->mobile."</td><td>".$v->shopname."</td><td>".$v->email."</td><td>".$v->amount."</td><td>
       ".$v->game."</td><td>
       ".$v->cardtype."</td><td>
       ".$v->cardno."</td><td>".$v->playerid."</td><td>".
       $v->dt."</td><td>".$v->done."</td><td><a href='approvemanualrechargeadmin/".$v->id."'>تأكيد اتمام العملية</a></td></tr>";
     }
   echo $result;
   }
   public function pendingrecharges(Request $r){

     $umobile = manualrechargelog::join('usermobile',
      'usermobile.email', '=', 'manualrechargelog.email')
      ->select('usermobile.shopname',"usermobile.mobile",'manualrechargelog.*')
      ->Where('done', "N")->orderBy('manualrechargelog.id', 'DESC')->get();
   return  view("pendingrecharges")->with('precharges',$umobile);
   }
   public function pendingrecharges2(Request $r){

     $umobile = manualrechargelog::join('usermobile',
      'usermobile.email', '=', 'manualrechargelog.email')
      ->select('usermobile.shopname',"usermobile.mobile",'manualrechargelog.*')
      ->Where('done', "N")->orderBy('manualrechargelog.id', 'DESC')->get();
   return  view("pendingrecharges2")->with('precharges',$umobile);
   }
   public function cardsremaining(Request $r){
     $umobile = cards::join('cardvalues',
      'cardvalues.cardid', '=', 'cards.id')
      ->selectRaw('COUNT(cardvalues.id) as cnt,cards.*')
      ->Where('cardvalues.ischarged', "N")->groupBy('cards.id')->get();
   return  view("cardsremaining")->with('cards',$umobile);
 }
 public function addtoken(Request $r){
   $email = Auth::user()->email;
   $user = User::where('email', $email)->first();
   $user->token = $r->tok;
   $user->save();
   return "done";

 }
 public function addadmin(Request $r){

   return view("addadmin");

 }
}
