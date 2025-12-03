<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Contact;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $request = app(\Illuminate\Http\Request::class);
            if($request->session()->get('locale')=='fa' || !$request->session()->has('locale')){
                $contacts_main =  Contact::where('lang', 'fa')->get();
                $categories_main =  Category::whereNull('parent_id')->where('lang', 'fa')->get();
            }else{
                $contacts_main =  Contact::where('lang', 'en')->get();
                $categories_main =  Category::whereNull('parent_id')->where('lang', 'en')->get();
            }

            $view->with(['contacts_main'=>$contacts_main, 'categories_main'=>$categories_main]);
       });
        Schema::defaultStringLength(191);
    }
}
