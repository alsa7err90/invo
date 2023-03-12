<?php

namespace App\Providers;

use App\Models\Group;
use App\Models\Invitation;
use App\Models\Surname;
use App\Models\Table;
use App\Models\User;
use Illuminate\Pagination\Paginator;
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
        
        Paginator::useBootstrap();
        
        //  list surnames
        $list_usrnames = Surname::get();
        View::share('list_usrnames',$list_usrnames);
        
        // list tables
        $list_tables = Table::get();
        View::share('list_tables',$list_tables);
        
        // list groups
        $list_groups = Group::get();
        View::share('list_groups',$list_groups);
        
        // list users
        $list_users_invo = Invitation::get();
        View::share('list_users_invo',$list_users_invo);
    }
}
