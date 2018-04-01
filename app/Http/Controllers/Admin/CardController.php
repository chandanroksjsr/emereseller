<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\card_personal_details;
use App\card_medical_details;
use App\card_emergency_contact;
use App\card_files;
use App\orders;
use App\plans;

use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Intervention\Image\Facades\Image;
use Softon\Indipay\Facades\Indipay;
//use Dropbox\Client;
//use Dropbox\WriteMode;
use Spatie\Dropbox\Client;
class CardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (! Gate::allows('can_create_card')) {
            return abort(401);
        }






        return view('admin.card.apply');
    }

    public function mainCard(Request $request){

        $id1 = Crypt::decryptString($request['id']);
//$id = $request['id'];
        $card_personal_details = card_personal_details::where('id', '=', $id1)->first();
        $card_medical_details = card_medical_details::where('card_id', '=', $id1)->first();
        $card_emergency_contacts = card_emergency_contact::where('card_id', '=', $id1)->first();
        $card_files = card_files::where('card_id', '=', $id1)->orderBy('card_created','desc')->first();
        $client = new Client(env('DROPBOX_TOKEN'));
        try {
            $pic = $client->getTemporaryLink('/cardpics/'.$card_files->url);
        } catch (\Exception $e) {
            $pic = "https://cdn4.iconfinder.com/data/icons/gray-user-management/512/support-512.png";
        }



        $card_order = orders::where('card_id', '=', $id1)->first();
        if($card_order==null){
            $pay_s = 'Tobe';
        }else{
            $pay = $card_order->payment_status;
            if($pay=='Credit'){
                $pay_s = 'Done';
            }
            else {
                $pay_s = 'Tobe';
            }
        }

        $bday = $card_personal_details->date_of_birth;
        $birthday = date_parse_from_format('m-d-Y', $bday);

//$card_emergency_contacts = card_emergency
        $id = Crypt::encryptString($id1);
        $card_id = Crypt::encryptString($id1);

        return view('admin.card.miltistep',compact('card_personal_details','card_id','card_medical_details','id','card_emergency_contacts','card_files','birthday','pay_s','pic'));





    }

//--------------------------------------------------- Modify / Complete Card Updation Module Functions ----------------------------------------------//
public function create_card(Request $request){

  if (card_personal_details::where('email', '=', $request['email'])->exists()) {
      $data['msg']='<i class="fa fa-info-circle"></i> Card Already Registered With Email!';
      $data['error']=true;
      return $data;


  }
    else if (card_personal_details::where('mobile', '=', $request['mobile'])->exists()) {
        $data['msg']='<i class="fa fa-info-circle"></i> Card Already Registered With Phone Number!';
        $data['error']=true;
        return $data;


    }


  else {
    # code...
/// code to create a new card
 $birthday = $request['month'].'/'.$request['day'].'/'.$request['year'];
 $personal_detailed = new card_personal_details();
 $personal_detailed->user_id =  Auth::user()->id;
 $personal_detailed->first_name = $request['first_name'];
 $personal_detailed->last_name = $request['last_name'];
 $personal_detailed->display_name = $request['display_name'];
 $personal_detailed->gender = $request['gender'];
 $personal_detailed->email = $request['email'];
 $personal_detailed->mobile = $request['mobile'];
 $personal_detailed->landline = $request['landline']?: '';
 $personal_detailed->officephone = $request['officephone']?: '';
 $personal_detailed->doorno = $request['doorno'];
 $personal_detailed->buildingstreet = $request['buildingstreet'];
 $personal_detailed->arealocality = $request['arealocality'];
 $personal_detailed->city = $request['city'];
 $personal_detailed->state = $request['State'];
 $personal_detailed->pincode = $request['pincode'];
 $personal_detailed->date_of_birth = $birthday;
 $personal_detailed->aadhaar = $request['aadhaar']?: '';
 $personal_detailed->save();

 if($personal_detailed) {
     $a = Crypt::encryptString($personal_detailed->id);
     $data['error'] = false;
     $data['id'] = $a;
     $data['msg'] = '<i class="fa fa-check-circle"></i> Card Created Successfully Please Wait!';
     return $data;
 }
 else{
     $data['error'] = true;
     $data['msg'] = '<i class="fa fa-info-circle"></i> Fields are Missing Please Complete & Try again!';
     return $data;

 }
}

}


public function add_personal_details(Request $request){

// if (card_personal_details::where('email', '=', $request['email'])->exists()) {
//   $data['msg']='<i class="fa fa-info-circle"></i> Card Already Registered With Email Or Phone!';
//   $data['error']=true;
//   return $data;
// // user found
// }
// else {
 $personal_detailed = new card_personal_details();

$birthday = $request['month'].'/'.$request['day'].'/'.$request['year'];
$card_id = Crypt::decryptString($request['card_id']);
$personal_detailed::where('id', $card_id)->update(['first_name' => $request['first_name'],
'last_name' => $request['last_name'],
'display_name' => $request['display_name'],
'gender' => $request['gender'],
'landline' => $request['landline']?: '',
'officephone' => $request['officephone']?: '',
'doorno' => $request['doorno'],
'buildingstreet' => $request['buildingstreet'],
'arealocality' => $request['arealocality'],
'city' => $request['city'],
'state' => $request['State'],
'pincode' => $request['pincode'],
'date_of_birth' => $birthday,
'aadhaar' => $request['aadhaar']?: '']);
 //$UpdateDetails = card_personal_details::where('id', '=',  $request['card_id'])->first();

  // $personal_detailed->first_name = $request['first_name'];
  // $personal_detailed->;
  // $personal_detailed->;
  // $personal_detailed->display_name = $request['display_name'];
  // $personal_detailed->gender = $request['gender'];
  // $personal_detailed->email = $request['email'];
  // $personal_detailed->mobile = $request['mobile'];
  // $personal_detailed->landline = $request['landline'];
  // $personal_detailed->officephone = $request['officephone'];
  // $personal_detailed->doorno = $request['doorno'];
  // $personal_detailed->buildingstreet = $request['buildingstreet'];
  // $personal_detailed->arealocality = $request['arealocality'];
  // $personal_detailed->city = $request['city'];
  // $personal_detailed->state = $request['State'];
  // $personal_detailed->pincode = $request['pincode'];
  // $personal_detailed->date_of_birth = $request['date_of_birth'];
  // $personal_detailed->aadhaar = $request['aadhaar'];
//   $personal_detailed->save();

  //$a = Crypt::encryptString($personal_detailed->id);


  # code...s

  $data['error']=false;
    $data['msg']='<i class="fa fa-check-circle"></i> Updated Successfully, Please Update Medical Details Now!';
  //$data['token'] = $a;


  return $data;
}

public function add_medical_details(Request $request){

  if(empty($request['card_id'])){
      $data['msg']='<i class="fa fa-check-circle"></i>'.$request['card_id'].'Some Error Occured Please Try Again Later!';
      $data['error']=true;
      return $data;
  }
  else {
$card_id = Crypt::decryptString($request['card_id']);
//$card_id = $request['card_id'];
if (card_medical_details::where('card_id', '=', $card_id)->exists()) {

  $medical_detailed = new card_medical_details();
  $update = $medical_detailed::where('card_id', $card_id)->update(['blood_group' => $request['blood_group'],
  'card_token' => rand(1,5),
    'blood_donor' => $request['blood_donor']?: '',
    'blood_pressure' => $request['blood_pressure']?: '',
    'heart_issue' => $request['heart_issue']?: '',
    'diabetes' => $request['diabetes']?: '',
    'epilepsy' => $request['epilepsy']?: '',
    'asthama' => $request['asthama']?: '',
    'mental_illness' => $request['mental_illness']?: '',
    'tb' => $request['tb']?: '',
    'dyslipidemia' => $request['dyslipidemia']?: '',
    'NSAIDS' => $request['NSAIDS']?: '',
    'STEROIDS' => $request['STEROIDS']?: '',
    'DISABLED' => $request['DISABLED']?: '',
    'ANTICOGULANT' => $request['ANTICOGULANT']?: '',
    'SURGERY' => $request['SURGERY']?: '',
    'IMPLANT' => $request['IMPLANT']?: '']);
if($update){
  $data['msg']='<i class="fa fa-check-circle"></i> Update Details Successfully!';
  $data['error']=false;
  return $data;
}else {
  $data['msg']='<i class="fa fa-check-circle"></i> Some Error Occured Please Try Again Later!';
  $data['error']=true;
  return $data;
}
  //$data['dat']= $request['blood_donor'];

}
else {


$card_medical_details_create = new card_medical_details();
$card_medical_details_create->user_id = Auth::user()->id;
$card_medical_details_create->card_id = $card_id;
$card_medical_details_create->card_token = rand(1,5);
$card_medical_details_create->blood_group = $request['blood_group']?: '';
$card_medical_details_create->blood_donor = $request['blood_donor']?: '';
$card_medical_details_create->blood_pressure = $request['blood_pressure']?: '';
$card_medical_details_create->heart_issue = $request['heart_issue']?: '';
$card_medical_details_create->diabetes = $request['diabetes']?: '';
$card_medical_details_create->epilepsy = $request['epilepsy']?: '';
$card_medical_details_create->asthama = $request['asthama']?: '';
$card_medical_details_create->mental_illness = $request['mental_illness']?: '';
$card_medical_details_create->tb = $request['tb']?: '';
$card_medical_details_create->dyslipidemia = $request['dyslipidemia']?: '';
$card_medical_details_create->NSAIDS = $request['NSAIDS']?: '';
$card_medical_details_create->STEROIDS = $request['STEROIDS']?: '';
$card_medical_details_create->DISABLED = $request['DISABLED']?: '';
$card_medical_details_create->ANTICOGULANT = $request['ANTICOGULANT']?: '';
$card_medical_details_create->SURGERY = $request['SURGERY']?: '';
$card_medical_details_create->IMPLANT = $request['IMPLANT']?: '';
$card_medical_details_create->DONOR = 'NO';
$card_medical_details_create->INSAURANCE = 'NO';
$update = $card_medical_details_create->save();
$a = Crypt::encryptString($card_medical_details_create->id);

if($update){

  $data['error']=false;
  $data['msg']='<i class="fa fa-check-circle"></i> Medical Details Updated Successfully, Please Update Emergency Contact Details Now!';
    return $data;
}else {
  $data['msg']='<i class="fa fa-check-circle"></i> Some Error Occured Please Try Again Later!';
  $data['error']=true;
  return $data;
}

# code...


}















}
    }




public function add_emergency_contacts(Request $request){

  if(empty($request->card_id1)){
      $data['msg']='<i class="fa fa-check-circle"></i> Some Error Occured Please Try Again Later!';
      $data['error']=true;
      return $data;

  }
  else {
$card_id = Crypt::decryptString($request['card_id1']);
//$card_id = $request['card_id'];
if (card_emergency_contact::where('card_id', '=', $card_id)->exists()) {

  $emergency_contact = new card_emergency_contact();
  $emergency_contact::where('card_id', $card_id)->update([
    'family_name1' => $request['family_name1'],
    'family_name2' => $request['family_name2'],
    'family_number1' => $request['family_number1'],
    'family_number2' => $request['family_number2'],
    'friend_name1' => $request['friend_name1'],
    'friend_name2' => $request['friend_name2'],
    'friend_number1' => $request['friend_number1'],
    'friend_number2' => $request['friend_number2'],
    'family_relation1' => $request['family_relation1'],
    'family_relation2' => $request['family_relation2']]);

    $pname = card_personal_details::where('id', '=', $card_id)->first();

$nam = $pname->display_name;




    $post_data = array(
        // 'From' doesn't matter; For transactional, this will be replaced with your SenderId;
        // For promotional, this will be ignored by the SMS gateway
        'From'   => 'EMERES',
        'To'    => array($request['family_name1'],$request['family_name2'],$request['friend_number1'],$request['friend_number2']),
        'Body'  => 'Your contact '.$nam.' added you as his emergency contact number. please save 8039513709 in your phone book as emergency contact number for Mr./Ms. '.$nam.' to avoid missing calls in case of emergency.
Thanks
Your First Responder in Emergency
Team EmeReCard'
    );

    $exotel_sid = "swasthaadhaar"; // Your Exotel SID - Get it from here: http://my.exotel.in/Exotel/settings/site#api-settings
    $exotel_token = "f6b355adcbf405d8923593e3e519c63462de4d9b"; // Your exotel token - Get it from here: http://my.exotel.in/Exotel/settings/site#api-settings

    $url = "https://".$exotel_sid.":".$exotel_token."@twilix.exotel.in/v1/Accounts/".$exotel_sid."/Sms/send";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

    $http_result = curl_exec($ch);
    $error = curl_error($ch);
    $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);

    curl_close($ch);












    if($emergency_contact){
        $data['msg']='<i class="fa fa-check-circle"></i> Update Details Successfully!';
        $data['error']=false;
        return $data;
    }else {
        $data['msg']='<i class="fa fa-check-circle"></i> Some Error Occured Please Try Again Later!';
        $data['error']=true;
        return $data;
    }









}
else {
$card_emergency = new card_emergency_contact();
//$a = card_personal_details::create($request->all());
$card_emergency->user_id = Auth::user()->id;
$card_emergency->card_id = $card_id;
$card_emergency->token = 'UNASSIGNED';
$card_emergency->family_name1 = $request['family_name1'];
$card_emergency->family_relation1 = $request['family_relation1'];
$card_emergency->family_number1 = $request['family_number1'];
$card_emergency->family_name2 = $request['family_name2'];
$card_emergency->family_relation2 = $request['family_relation2'];
$card_emergency->family_number2 = $request['family_number2'];
$card_emergency->friend_name1 = $request['friend_name1'];
$card_emergency->friend_number1 = $request['friend_number1'];
$card_emergency->friend_name2 = $request['friend_name2'];
$card_emergency->friend_number2 = $request['friend_number2'];
$card_emergency->save();
//$a = Crypt::encryptString($personal_detailed->id);














    if($card_emergency){

        $pname = card_personal_details::where('id', '=', $card_id)->first();

        $nam = $pname->display_name;




        $post_data = array(
            // 'From' doesn't matter; For transactional, this will be replaced with your SenderId;
            // For promotional, this will be ignored by the SMS gateway
            'From'   => 'EMERES',
            'To'    => array($request['family_name1'],$request['family_name2'],$request['friend_number1'],$request['friend_number2']),
            'Body'  => 'Your contact '.$nam.' added you as his emergency contact number. please save 8039513709 in your phone book as emergency contact number for Mr./Ms. '.$nam.' to avoid missing calls in case of emergency.
Thanks
Your First Responder in Emergency
Team EmeReCard'
        );

        $exotel_sid = "swasthaadhaar"; // Your Exotel SID - Get it from here: http://my.exotel.in/Exotel/settings/site#api-settings
        $exotel_token = "f6b355adcbf405d8923593e3e519c63462de4d9b"; // Your exotel token - Get it from here: http://my.exotel.in/Exotel/settings/site#api-settings

        $url = "https://".$exotel_sid.":".$exotel_token."@twilix.exotel.in/v1/Accounts/".$exotel_sid."/Sms/send";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));

        $http_result = curl_exec($ch);
        $error = curl_error($ch);
        $http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);

        curl_close($ch);






# code...
        $data['dat']= 'cool boy!';

        $data['error']=false;
        $data['msg']='<i class="fa fa-check-circle"></i> Emergency Contacts Details Updated Successfully, Please Update Profile Pic!';
        return $data;

    }else {


        $data['msg']='<i class="fa fa-check-circle"></i> Some Error Occured Please Try Again Later!';
        $data['error']=true;
        return $data;
    }










}}}










public function imageCropPost(Request $request)
   {
     $card_id = Crypt::decryptString($request->card_id);
       $data = $request->image;
       list($type, $data) = explode(';', $data);
       list(, $data)      = explode(',', $data);
       $data = base64_decode($data);
       $image_name= time().'.png';
       $path = public_path() . "/cardpics/" . $image_name;
       $path1 = "/cardpics/" . $image_name;
       $card_files = new card_files();
       //$request['user_id'] =  Auth::user()->id;
       //$a = card_personal_details::create($request->all());
       $card_files->user_id = Auth::user()->id;
       $card_files->card_id = $card_id;
       $card_files->url = $image_name;
       $card_files->token = 'UNDEFINED';
       $card_files->save();
       $client = new Client(env('DROPBOX_TOKEN'));
       $client->upload($path1, $data);




    //   file_put_contents($path, $data);


       return response()->json(['success'=>'done','card_id'=>$request['card_id'],'msg'=>'<i class="fa fa-check-circle"></i> Pic Updated Successfully!']);
   }

//*********************************************** Modify / Complete Card Updation Module Functions Ends  ****************************************************//
//--------------------------------------------------------------------------------------------------------------------------------------------------


//################################################ Manage Cards Module Functions #########################################################


public function manageCards(){

  // if (! Gate::allows('role_access')) {
  //     return abort(401);
  // }

$client = new Client(env('DROPBOX_TOKEN'));


$cards = card_personal_details::where('user_id', '=', Auth::user()->id)->get();
$carda = $cards;

$i = 0;
          foreach ($carda as $card) {
            $n = card_files::where('card_id', '=', $card->id)->orderBy('card_created','desc')->first();
          //  $url = $n->url;
            if($n==null){
            $card->url = 'nope';
          }


        else{
          try{
          $card->url = $client->getTemporaryLink('/cardpics/'.$n->url);
        }catch(\Exception $e){
              $card->url = 'nope';
        }

          }
          //   # code...

        //secho $i;
        //$i++;
      }




      foreach ($carda as $card) {
        $order = orders::where('card_id', '=', $card->id)->first();
        $card->order = $order;

        # code...
      }

//echo $carda;





          $siteTitle = 'Manage Cards';

  return view('admin.card.manage', compact('carda','siteTitle','links'));


}
//----------------------------------------------------------------------------------------------------------------//
//************************************ Manage Card Module Functions Ends *****************************************//
//----------------------------------------------------------------------------------------------------------------//

public function checkout(Request $request){
  $plans = plans::all();
  // $carda = $cards;
  //$carde = json_decode($cards);
$id = $request['id'];



  return view('admin.card.checkout', compact('plans','id'));
}

public function payment(Request $request){
  $plans = plans::all();
  // $carda = $cards;
  //$carde = json_decode($cards);
$id = Crypt::decryptString($request['id']);
$plan = Crypt::decryptString($request['plan']);
$card = card_personal_details::where('id', '=', $id )->first();
$card_plan = plans::where('id', '=', $plan)->first();
// $carda = $cards;
//$carde = json_decode($cards);
//$carda = $cards;



  if (orders::where('card_id', '=', $id)->exists()) {
    $update_address =   orders::where('card_id', $id)->update(['plan' => $plan]);
  }else{
$order_create = new orders();
//$a = card_personal_details::create($request->all());
$order_create->user_id = Auth::user()->id;
$order_create->card_id = $id;
$order_create->plan = $card_plan['id'];
$order_create->save();
}

$order = orders::where('card_id', '=', $id )->first();








//print_r($carda);
$n = card_files::where('card_id', '=', $id)->orderBy('card_created','desc')->first();
      //  $url = $n->url;
            if($n==NULL){
            $n['url'] = 'nope';
          }



          $client = new Client(env('DROPBOX_TOKEN'));

              try{
                    $n['url'] = $client->getTemporaryLink('/cardpics/'.$n->url);
                  }catch(\Exception $e){
                        $n['url'] = 'nope';
                  }




          //   # code...

        //secho $i;
        //$i++;


      // foreach ($carda as $card) {
      //   $order = orders::where('card_id', '=', $id)->first()?;
      //   $card->order = $order;
      //
      //   # code...
      // }








  return view('admin.card.payment', compact('plans','id','card_plan','card','n','order'));
}


public function sameaddress(Request $request){

$token = Crypt::decryptString($request['id']);






$card = card_personal_details::where('id', '=', $token )->first();
$card['success']=1;

return compact('card');


}


public function delivery_address_add(Request $request){
  $card_token = Crypt::decryptString($request['card_token']);
  if (orders::where('card_id', '=', $card_token)->exists()) {

$update_address =   orders::where('card_id', $card_token)->update(['address' => $request['address'],
      'recipent_name' => $request['recipent_name'],
      'recipent_phone' => $request['recipent_phone'],
      'door_no' => $request['door_no'],
      'city' => $request['city'],
      'state' => $request['state'],
      'pin' => $request['pin']]);



if($update_address){
$request['error']=false;
$request['msg']='Successfully Updated';
//$request['query']=$update_address;
}else{
  $request['error']=false;
  $request['msg']='No Change in Address';
//$request['query']=$update_address;
}
}
else{

  $order_create = new orders();
  //$a = card_personal_details::create($request->all());
  $order_create->user_id = Auth::user()->id;
  $order_create->card_id = $card_token;
  $order_create->recipent_name = $request['recipent_name'];
  $order_create->recipent_phone = $request['recipent_phone'];
  $order_create->door_no = $request['door_no'];
  $order_create->Address = $request['address'];
  $order_create->city = $request['city'];
  $order_create->state = $request['state'];
  $order_create->pin = $request['pin'];
  $order_create->save();



  $request['error']=false;
$request['msg']="Order Created Successfully";


}
return $request;





}
//---------Be calm and careful payment module below----------------------------------


public function pay_req(Request $request){

  $amt = Crypt::decryptString($request['charlie']);
  $email =  Auth::user()->email;
  $name = $request['name'];
  $phone = $request['phone'];
  $purpose = 'EmeReCard SUBSCRIPTION';

            $parameters = [
              'purpose' => $purpose,
              'amount' => $amt,
              'buyer_name' => $name,
              'email' => $email,
              'phone' => $phone,
            ];

        //gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo / ZapakPay / Mocker

        $order = Indipay::gateway('InstaMojo')->prepare($parameters);
           $txnd = $order->response->payment_request->id;
           $url = $order->response->payment_request->longurl;
           $status = $order->response->success;
          $card_token= Crypt::decryptString($request['card_token']);

        $update_payment =   orders::where('card_id', $card_token)->update(['payutxn' => $txnd,
                'amount' => $amt,
                'txnid' => 'unassigned',
                'payment_status' =>'awaited']);


if($status){

  $resp['error']=false;
  $resp['msg']='<i class="fa fa-spin fa-spinner" aria-hidden="true"></i> Please Wait While We take you to the gateway';
  $resp['url']=$url;
return $resp;
}
else{
  $resp['error']=false;
  $resp['msg']='<i class="fa fa-spin fa-info-circle" aria-hidden="true"></i> Some Unexpected Error Occured Please Reload the page and try again!';
return $resp;

}
}


public function pay_status(Request $request){


  //$response = Indipay::response($request);

       // For Otherthan Default Gateway
       $response1 = Indipay::gateway('InstaMojo')->response($request);
    //   $response = Indipay::gateway('NameOfGatewayUsedDuringRequest')->response($request);
$response = $response1;
$txnid = $response->payment_request->id;
$status = $response->payment_request->payment->status;
$amt = $response->payment_request->payment->unit_price;
$order = orders::where('payutxn', '=', $txnid)->first();
       //dd($response);
       $update_payment =   orders::where('payutxn', $txnid)->update(['payment_status' => $status,
             'amount' => $amt]);




$id = $order['card_id'];


$plan = $order['plan'];
       $card = card_personal_details::where('id', '=', $id )->first();
$card_plan = plans::where('id', '=', $plan)->first();
//$response['payment_request']['payment']['status'] = 'Success';


       $n = card_files::where('card_id', '=', $id)->orderBy('card_created','desc')->first();

       $client = new Client(env('DROPBOX_TOKEN'));

           try{
                 $n['url'] = $client->getTemporaryLink('/cardpics/'.$n->url);
               }catch(\Exception $e){
                     $n['url'] = 'nope';
               }


return view('admin.card.pay_status',compact('response','order','card','n','card_plan'));

}

//---------- now payment module over relax bitch -------------------------

//--- destroy the card ---//

public function destroy_card(Request $request){

$card_token = Crypt::decryptString($request['desi_token']);

if (orders::where('card_id', '=', $card_token)->exists()) {

orders::where('card_id', '=', $card_token)->delete();

}


if (card_emergency_contact::where('card_id', '=', $card_token)->exists()) {

card_emergency_contact::where('card_id', '=', $card_token)->delete();
}

if (card_medical_details::where('card_id', '=', $card_token)->exists()) {

card_medical_details::where('card_id', '=', $card_token)->delete();


}

if (card_files::where('card_id', '=', $card_token)->exists()) {

card_files::where('card_id', '=', $card_token)->delete();

}
if (card_personal_details::where('id', '=', $card_token)->exists()) {

card_personal_details::where('id', '=', $card_token)->delete();

}


$response['error']=false;
$response['msg']= 'Card Deleted Successfully';

return $response;

}



}
