<?php

namespace App\Providers;

use App\card_personal_details;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      // Get the $data



        //Schema::defaultStringLength(191);
        view()->composer('partials.sidebar', function ($view) {
          $client = new Client(env('DROPBOX_TOKEN'));

          try {
               $pic = $client->getTemporaryLink('/profilepics/'.Auth::user()->pic);
          } catch (\Exception $e) {



            
            $pic = "https://vistana-web-static.s3.amazonaws.com/vistana-web/assets/img/profile/profile-pic-medium.png?1515947189";





          }
    $view->with('data', $pic);

});
view()->composer('partials.topbar', function ($view) {
  $client = new Client(env('DROPBOX_TOKEN'));

  try {
       $pic = $client->getTemporaryLink('/profilepics/'.Auth::user()->pic);
  } catch (\Exception $e) {
    $pic = "https://vistana-web-static.s3.amazonaws.com/vistana-web/assets/img/profile/profile-pic-medium.png?1515947189";
  }

$view->with('data', $pic);

});

        view()->composer('auth.login', function ($view) {
           $counter = card_personal_details::all();
           $count = count($counter);
            $view->with('cardco', $count);

        });




    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        if ($this->app->environment('local', 'testing')) {
          //  $this->app->register(DuskServiceProvider::class);
        }

    }
}
