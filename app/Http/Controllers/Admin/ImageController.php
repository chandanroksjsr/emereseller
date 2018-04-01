<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Spatie\Dropbox\Client;

class ImageController extends Controller
{
    //

    public function imageCrop()
      {
          return view('Admin.settings');
      }

      /**
       * Show the application dashboard.
       *
       * @return \Illuminate\Http\Response
       */
      public function imageCropPost(Request $request)
      {
          $data = $request->image;

          list($type, $data) = explode(';', $data);
          list(, $data)      = explode(',', $data);

          $data = base64_decode($data);
          $image_name= Auth::user()->id.'-pic-'.time().'.png';
          $da = "/profilepics/" . $image_name;
          $path = public_path() . $da;
          $path1 = "/profilepics/" . $image_name;

          $client = new Client(env('DROPBOX_TOKEN'));
          $client->upload($path1, $data);

          //
          // file_put_contents($path, $data);

              $user = Auth::getUser();
              $user->pic = $image_name;
              $user->save();




          return response()->json(['success'=>'done','path'=>$da,'msg'=>'Updated Successfully']);


      }



}
