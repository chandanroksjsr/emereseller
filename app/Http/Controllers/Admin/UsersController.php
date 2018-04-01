<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InvoicePaid;
use Illuminate\Notifications\Messages\MailMessage;
class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }


                $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }

        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $user = User::create($request->all());



        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }

        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());



        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    public function settings(){
      $client = new Client(env('DROPBOX_TOKEN'));
      try {
           $pic = $client->getTemporaryLink('/profilepics/'.Auth::user()->pic);
      } catch (\Exception $e) {
        $pic = "https://vistana-web-static.s3.amazonaws.com/vistana-web/assets/img/profile/profile-pic-medium.png?1515947189";
      }

return view('admin.settings',compact('pic'));

    }

    protected function registered(Request $request, $user) {
        $user->notify(new InvoicePaid($user));
    }


    public function googleLogin(Request $request)  {
          $google_redirect_url = route('glogin');
          $gClient = new \Google_Client();
          $gClient->setApplicationName('EmeReCard');
          $gClient->setClientId('900116321550-tklj3untglbajn897k3gj8rrksd4mdg8.apps.googleusercontent.com');
          $gClient->setClientSecret('4sQCgg6xA5cZLV1r1-KDRSc6');
          $gClient->setRedirectUri($google_redirect_url);
          $gClient->setDeveloperKey('AIzaSyAfxOriT01ebZEYZ6iCA4tSVDNJ8f1KMd4');
          $gClient->setScopes(array(
              'https://www.googleapis.com/auth/plus.me',
              'https://www.googleapis.com/auth/userinfo.email',
              'https://www.googleapis.com/auth/userinfo.profile',
          ));
          $google_oauthV2 = new \Google_Service_Oauth2($gClient);
          if ($request->get('code')){
              $gClient->authenticate($request->get('code'));
              $request->session()->put('token', $gClient->getAccessToken());
          }
          if ($request->session()->get('token'))
          {
              $gClient->setAccessToken($request->session()->get('token'));
          }
          if ($gClient->getAccessToken())
          {
              //For logged in user, get details from google using access token
              $guser = $google_oauthV2->userinfo->get();

                  $request->session()->put('name', $guser['name']);
                  if ($user =User::where('email',$guser['email'])->first())
                  {

//$picid = $guser['id'];
$url = $guser['picture'];

$img = file_get_contents($url);

$data = $img;
                      Auth::loginUsingId($user->id);

if(Auth::User()->pic==NULL){
                      $image_name= Auth::user()->id.'-pic-'.time().'.png';
                      $path1 = "/profilepics/" . $image_name;
                      $client = new Client(env('DROPBOX_TOKEN'));


                                                $user = Auth::getUser();
                                                $user->pic = $image_name;
                                                $user->save();


                      $client->upload($path1, $data);

                      //
                      // file_put_contents($path, $data);

}

                     return redirect()->route('admin.home');
                      //logged your user via auth login

                                        }else{


                                          $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                                             $pass = array(); //remember to declare $pass as an array
                                             $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                                             for ($i = 0; $i < 8; $i++) {
                                                 $n = rand(0, $alphaLength);
                                                 $pass[] = $alphabet[$n];
                                             }
                                             $password =  implode($pass);





                    $newuser =  User::create([
                        'name' => $guser['name'],
                        'email' => $guser['email'],
                        'password' => bcrypt($password),

                    ]);




                    Auth::loginUsingId($newuser->id);










                      $url = $guser['picture'];

                      $data = file_get_contents($url);

                                          $image_name= Auth::user()->id.'-pic-'.time().'.png';
                                          $path1 = "/profilepics/" . $image_name;
                                          $client = new Client(env('DROPBOX_TOKEN'));


                                                                    $user = Auth::getUser();
                                                                    $user->pic = $image_name;
                                                                    $user->save();


                                          $client->upload($path1, $data);

                                          //
                                          // file_put_contents($path, $data);












    $newuser->notify(new InvoicePaid(Auth::getUser()));



                       return redirect()->route('admin.home');

                      //register your user with response data
                  }


            //redirect to index page
            return redirect()->route('index');

          } else
          {
              //For Guest user, get google login url
              $authUrl = $gClient->createAuthUrl();
              return redirect()->to($authUrl);
          }
      }






}
