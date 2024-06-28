<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\TaskRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(TaskRepository::class, function ($app) {
            return new TaskRepository();
        });
    }

    public function boot()
    {
        //
    }
}
