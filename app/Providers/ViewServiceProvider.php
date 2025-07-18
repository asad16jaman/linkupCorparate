<?php

namespace App\Providers;

use App\Models\Company;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

         View::composer('*', function ($view) {
                $data =  Company::all()->first();
                if($data){
                    $view->with('company',$data);
                }else{
                    $view->with('company',false);

                }
                
            });
    }
}
