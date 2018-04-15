<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\School;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
           $schools=School::pluck('name','id')->all(); 
           $schools['default']='--Chọn trường--';
           ksort($schools);
        view()->share('schools',$schools);
        \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
