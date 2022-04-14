<?php

namespace App\Providers;

use App\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Cookie;
use Config;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
        if(app()->environment('production')) {
            \URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) {

            $user = Auth::user();
            $langauges = Language::get();

            $select_lan = Language::where('dir', '=', app()->getLocale())->first();
            if ($select_lan == null) {
                $select_lan = Language::where('select', '=', '1')->first();
            }
            $select_lan_choice = Language::where('select', '=', '1')->first();

            $count_header = count(Request::segments(1));
            if ($count_header == 0) {
                $data_results = file_get_contents(public_path() . '/languages/' . $select_lan->dir . '.json');
            }
            else {
                $secound_url = Request::segments(1)[0];
                if($secound_url == "dashboard" || $secound_url == "store"){
                    $data_results = file_get_contents(public_path() . '/languages/' . $select_lan->dir . '_dashboard.json');
                }
                else{
                    $data_results = file_get_contents(public_path() . '/languages/' . $select_lan->dir . '.json');
                }
            }
            $lang = json_decode($data_results);

            $view
                ->with('user', $user)
                ->with('lang', $lang)
                ->with('select_lan_choice', $select_lan_choice)
                ->with('select_lan', $select_lan)
                ->with('langauges', $langauges);

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
