<?php

namespace App\Http\Controllers\admin;

use App\orders;
use App\card_personal_details;
use App\card_medical_details;
use App\card_files;
use App\order_track;
use Illuminate\Support\Facades\Auth;
// use Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Spatie\Dropbox\Client;
class ordersController extends Controller
{
  //
  // public function makeimage($id)
  //    {
  //      $user1= card_personal_details::findOrFail($id);
  //
  //
  //
  //      $card1 = $user1;
  //     // $file = card_files::where('card_id', '=', $id)->take(1)->first();
  //
  //    }
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      if (! Gate::allows('role_access')) {
          return abort(401);
      }

              $order = orders::where('payment_status', '=', 'Credit')->get();
foreach ($order as $card) {

$carde = card_personal_details::where('id', '=', $card['card_id'])->first();
    $card['pin'] = $carde['cardno'];

  # code...
}


              $siteTitle = 'CARD ORDERS';

      return view('admin.orders.index', compact('order','siteTitle'));
  }
  public function show($id)
  {

      if (! Gate::allows('order_view')) {
          return abort(401);
      }

      $card = card_personal_details::findOrFail($id);
      $file = card_files::where('card_id', '=', $id)->first();
      $order = orders::where('card_id', '=', $id)->first();
      $flag = "1";
      $tr = order_track::where('card_id', '=', $id)->count();

      if($tr>'0'){
      $track = order_track::where('card_id', '=', $id)->first();
      $decs = $track->sent;


      $client = new Client(env('DROPBOX_TOKEN'));
      try {
           $pic = $client->getTemporaryLink('/cardpics/'.$file['url']);
      } catch (\Exception $e) {
        $pic = "https://cdn4.iconfinder.com/data/icons/gray-user-management/512/support-512.png";
      }

      $file = array('url' => $pic);


    $arr = json_decode($decs,TRUE);


}
else{
  $track= array('created_at' => '00:00:00');
}


    $siteTitle = $card->first_name.' '.$card->last_name.'\'s Profile';

      return view('admin.orders.show', compact('card','file','siteTitle','flag','order','track','arr'));


  }



protected function resz($ur){

  list($width, $height) = getimagesize($ur);

$ratio = $width / $height;
if( $ratio > 1) {
$resized_width = 205; //suppose 500 is max width or height
$resized_height = 205;
}
else {
  $resized_width = 205; //suppose 500 is max width or height
  $resized_height = 205;
}
$fileas  = $ur;
$resized_image = imagecreatetruecolor($resized_width, $resized_height);
// $ext = substr(strrchr($fileas, '.'), 1);
// if($ext=='jpeg'){
//  $image = imagecreatefromjpeg($ur);
// }
// else if($ext=='png'){
//   $image = imagecreatefrompng($ur);
// }
// else if($ext=='jpg'){
//    $image = imagecreatefromjpeg($ur);
//  }
try {
 $image = imagecreatefrompng($ur);
} catch (\Exception $e) {
    $image = imagecreatefromjpeg($ur);
}


imagecopyresampled($resized_image, $image, 0, 0, 0, 0, $resized_width, $resized_height, $width, $height);
return $resized_image;
}


protected function reszQR($ur){

  list($width, $height) = getimagesize($ur);

$ratio = $width / $height;
if( $ratio > 1) {
$resized_width = 250; //suppose 500 is max width or height
$resized_height = 250;
}
else {
  $resized_width = 250; //suppose 500 is max width or height
  $resized_height = 250;
}
$fileas  = $ur;
$resized_image = imagecreatetruecolor($resized_width, $resized_height);
// $ext = substr(strrchr($fileas, '.'), 1);
// if($ext=='jpeg'){
//  $image = imagecreatefromjpeg($ur);
// }
// else if($ext=='png'){
//   $image = imagecreatefrompng($ur);
// }
// else if($ext=='jpg'){
//    $image = imagecreatefromjpeg($ur);
//  }
try {
 $image = imagecreatefrompng($ur);
} catch (\Exception $e) {
    $image = imagecreatefromjpeg($ur);
}


imagecopyresampled($resized_image, $image, 0, 0, 0, 0, $resized_width, $resized_height, $width, $height);
return $resized_image;
}



protected function month_name($monthno)
{
  switch ($monthno) {
case 1:
    $month = 'Jan';
    break;
case 2:
    $month = 'Feb';
    break;

case 3:
    $month = 'Mar';
    break;
case 4:
    $month = 'Apr';
    break;
case 5:
    $month = 'May';
    break;
case 6:
    $month = 'Jun';
    break;
case 7:
    $month = 'Jul';
    break;
case 8:
    $month = 'Aug';
    break;
case 9:
    $month = 'Sep';
    break;
case 10:
    $month = 'Oct';
    break;
case 11:
    $month = 'Nov';
    break;
case 12:
    $month = 'Dec';
    break;
default:
    $month = 'Not a valid month!';

    break;
}
return $month;
}







  public function assigncard($post)
  {

    $post = Crypt::decryptString($post);

      if (! Gate::allows('order_view')) {
          return abort(401);
      }

            $card = card_personal_details::where('id','=',$post)->take(1)->first();
            $file = card_files::where('card_id', '=', $post)->orderBy('card_created','desc')->first();
            $medical = card_medical_details::where('card_id', '=', $post)->take(1)->first();


            // $flag = "1";
            //
            // if(empty($file)){
            //   $flag = "2";
            //   $file = array('url' => 'https://www.shareicon.net/data/2016/09/01/822711_order_512x512.png');
            //
            //
            // }

// For QR






$client = new Client(env('DROPBOX_TOKEN'));



try {
     $qr = $client->getTemporaryLink('/QR/'.$card->cardno.'.jpg');

} catch (\Exception $e) {
if($card->cardno=='UNASSIGNED'){
  $qr = "https://innovisionbiz.com/wp-content/uploads/2014/07/Link-Building-Question-Mark.jpg";
  //$pic = "https://cdn4.iconfinder.com/data/icons/gray-user-management/512/support-512.png";
  //$ur = "https://cdn4.iconfinder.com/data/icons/gray-user-management/512/support-512.png";
}
  else{

    $url = "https://emerecard.com/admino/test.php?cno=".$card->cardno;
    $img = file_get_contents($url);

    $data = $img;

    $image_name= $card->cardno.'.jpg';
    $path1 = "/QR/" . $image_name;
    $client = new Client(env('DROPBOX_TOKEN'));
    $client->upload($path1, $data);
    $qr = $client->getTemporaryLink('/QR/'.$card->cardno.'.jpg');
  }

}






$client = new Client(env('DROPBOX_TOKEN'));




// -EOC--


    //        $client = new Client(env('DROPBOX_TOKEN'));
            try {
                 $pic = $client->getTemporaryLink('/cardpics/'.$file->url);
                 $ur = $client->getTemporaryLink('/cardpics/'.$file->url);
            } catch (\Exception $e) {
              $pic = "https://cdn4.iconfinder.com/data/icons/gray-user-management/512/support-512.png";
              $ur = "https://cdn4.iconfinder.com/data/icons/gray-user-management/512/support-512.png";
            }


              $siteTitle = 'Assign Card Number';





                 $img = Image::make(public_path('images/sc.jpg'));
                 $img->text($card->first_name.' '.$card->last_name, 120, 330, function($font) {
                       $font->file(public_path('css/Ubuntu-B.ttf'));
                        $font->size(45);
                        $font->color('#000');
                        $font->align('top-left');
                        $font->valign('top-right');
                        $font->angle(0);
                    });
$birthday = date_parse_from_format('m-d-Y', $card->date_of_birth);

$bday = $this->month_name($birthday['month']).' '.$birthday['day'].', '.$birthday['year'];

                    $img->text($medical->blood_group.'ve /'.  date_diff(date_create($card->date_of_birth), date_create('today'))->y.' -'.$card->gender, 120, 375, function($font) {
                          $font->file(public_path('css/Ubuntu-B.ttf'));
                           $font->size(35);
                           $font->color('#000');
                           $font->align('top-left');
                           $font->valign('top-right');
                           $font->angle(0);
                       });

                       $img->text($bday, 468, 500, function($font) {
                             $font->file(public_path('css/Ubuntu-R.ttf'));
                              $font->size(32);
                              $font->color('#000');
                              $font->align('top-left');
                              $font->valign('top-left');
                              $font->angle(0);
                          });


                          $img->text('+91 '.$card->mobile, 468, 445, function($font) {
                                $font->file(public_path('css/Ubuntu-R.ttf'));
                                 $font->size(32);
                                 $font->color('#000');
                                 $font->align('top-left');
                                 $font->valign('top-left');
                                 $font->angle(0);
                             });

                             $img->text($card->cardno, 468, 555, function($font) {
                                   $font->file(public_path('css/Ubuntu-B.ttf'));
                                    $font->size(32);
                                    $font->color('#000');
                                    $font->align('top-left');
                                    $font->valign('top-left');
                                    $font->angle(0);
                                });



         //
         //            if($flag == '2')
         // {
         //         $ur = $file['url'];
         //          }
         //          else{
         //           $ur = 'https://emerecard.com/cardpics/'.$file['url'];
         //          }
         //           list($width, $height) = getimagesize($ur);
         //  $ratio = $width / $height;
         //  if( $ratio > 1) {
         //    $resized_width = 54; //suppose 500 is max width or height
         //    $resized_height = 64;
         //  }
         //  else {
         //    $resized_width = 54; //suppose 500 is max width or height
         //    $resized_height = 64;
         //  }
         //  $fileas  = $file['url'];
         // $resized_image = imagecreatetruecolor($resized_width, $resized_height);
         // $ext = substr(strrchr($fileas, '.'), 1);
         // if($ext=='jpeg'){
         //          $image = imagecreatefromjpeg($ur);
         //        }
         //        else if($ext=='png'){
         //           $image = imagecreatefrompng($ur);
         //         }
         //         else if($ext=='jpg'){
         //            $image = imagecreatefromjpeg($ur);
         //          }
         //  imagecopyresampled($resized_image, $image, 0, 0, 0, 0, $resized_width, $resized_height, $width, $height);

            $img->insert($this->resz($ur), 'top-right', 855, 170);
                        $img->text($card->mobile, 55, 138, function($font) {
                          $font->file(public_path('css/Ubuntu-B.ttf'));
                           $font->size(8);
                           $font->color('#fff');
                           $font->align('center');
                           $font->valign('bottom');
                           $font->angle(0);
                       });


                       $img->insert($this->reszQR($qr), 'top-left', 795, 327);



                       $id = '1';

                         $img->save(public_path('images/'.$id.'.jpg'));


$imags =  'https://emerecard.com/admino/api/logo.png';



    $img->insert($this->resz($imags), 'top-right', 40, 96);


$pc = public_path('images/'.$id.'.jpg');







      return view('admin.orders.assigncard', compact('card','file','siteTitle','flag','pic','pc','qr'));



  }
  public function update(Request $request, $id)
{

  $cardno  = $request->input('inputCardno');
  $user= card_personal_details::findOrFail($id);
  $user->cardno = $cardno;
  $user->save();
  //$card = $user;
  //$file = card_files::where('card_id', '=', $id)->take(1)->first();
  $order_id = orders::where('card_id', '=', $id)->take(1)->first();
  $flag = "1";

  $track = order_track::where('card_id', '=', $id)->count();
  $updated = date('d-m-Y H:i:s',time());
  //$qr = json_encode(array('status'=>'1','updated'=>$updated));
  if($track=='0'){

    order_track::insert(
        ['order_id' => $order_id->id, 'card_id' => $id,'accepted'=> '1', 'qr_code'=>$qr]
    );


  }


return redirect()->back();
 //
 //  if(empty($file)){
 //    $flag = "2";
 //    $file = array('url' => 'https://www.shareicon.net/data/2016/09/01/822711_order_512x512.png');
 //
 //
 //  }
 //    $siteTitle = 'Assign Card Number';
 //    $msg = 'assigned successfully';
 //
 //
 //
 // return view('admin.orders.assigncard',compact('card','file','siteTitle','flag','msg'))->with('user', $user);

    //
}
public function updatetrack(Request $request, $id){

  if($request->ajax()){

    $partner  = $request->input('partner');
    $number  = $request->input('number');
$updated = date('d-m-Y H:i:s',time());
    $d = array('partner' => $partner,'number' => $number,'updated'=>$updated);
$dat = json_encode($d);
    $track= order_track::findOrFail($id);
    $track->sent = $dat;
$run = $track->save();

    if($run){
         return response("<i class='fa fa-check'></i> SuccessFully Updated");

       }
       else{
         return response("<i class='fa fa-info'></i> Error Occoured");
       }
       }


}

public function invoice($id){

$order_id=Crypt::decryptString($id);

  $invoice = orders::where('card_id', '=', $order_id)->take(1)->first();
return view('admin.orders.invoice',compact('invoice'));
}
public function invoices(){

//$order_id=Crypt::decryptString($id);

  $invoices = orders::where('payment_status', '=', 'Credit')->where('user_id','=',Auth::user()->id)->get();
return view('admin.orders.invoices',compact('invoices'));
}


}
