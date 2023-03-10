<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $models = array(
            "Meet",
            "Invitation",
            "Table",
            "Surname",
            "Group",
            "User",
            "Search"
        );

        foreach ($models as $model) {
            $this->app->bind("App\Interfaces\\{$model}RepositoryInterface", "App\Repository\\{$model}Repository");
        }
    }
}
