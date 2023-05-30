<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Models\Language;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        \Config::set(['locale'=> 'en']);
        if(isset($_COOKIE['language'])){
            \Config::set(['locale'=> $_COOKIE['language']]);
        }
        $appLocale = \Config::get('locale');

        $blocks = Language::select(['field_key', 'content'])
            ->where('language_code', '=', $appLocale)
            ->pluck('content', 'field_key')
            ->toArray();
        View::share(['blocks'  => $blocks]); 
    }
}
