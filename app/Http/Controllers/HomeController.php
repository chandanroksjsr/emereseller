<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Lava;
use App\orders;
use App\card_personal_details;
use App\card_files;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // FUNCTION TO TRANSLATE DATE AND TIMES INTO NICE DATE EG 2 HOURS AGO ETC...
public function nice($date)
{
    if(empty($date)) {
        return "No date provided";
    }

    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");

    $now             = time();
    $unix_date       = strtotime($date);

       // check validity of date
    if(empty($unix_date)) {
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {
        $difference     = $now - $unix_date;
        $tense         = "ago";

    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }

    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }

    $difference = round($difference);

    if($difference != 1) {
        $periods[$j].= "s";
    }

    return "$difference $periods[$j] {$tense}";
}






    public function index()
    {


      $order = orders::where('payment_status', '=', 'Credit')->orderBy('order_time', 'desc')->get();

//       foreach ($order as $card) {
//
//         $card_id = $card['card_id'];
// $card_personal_details = card_personal_details::where('id', '=', $card_id)->first();
// $card_files = card_files::where('card_id', '=', $card_id)->orderBy('card_created','desc')->first();
// $card['personal'] = $card_personal_details;
// if($card_files['url']==null){
// $card['pic']= 'user.jpg';
// }
// else {
//   # code...
//
// $card['pic']= $card_files['url'];
// }
// $card['ago'] = $this->nice($card['order_time']);
// //print_r($card_id);
//



  




        # code...
      // }



        return view('home', compact('order'));
    }
}
