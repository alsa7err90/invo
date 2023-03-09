<?php

namespace App\Providers;

use App\Models\Group;
use App\Models\Surname;
use App\Models\Table;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);
        
        //  list surnames
        $list_usrnames = Surname::get();
        View::share('list_usrnames',$list_usrnames);
        
        // list tables
        $list_tables = Table::get();
        View::share('list_tables',$list_tables);
        
        // list groups
        $list_groups = Group::get();
        View::share('list_groups',$list_groups);
    }
}
