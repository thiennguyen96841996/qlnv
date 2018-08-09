<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Vacation\VacationRepositoryInterface::class,
            \App\Repositories\Vacation\VacationEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Overtime\OvertimeRepositoryInterface::class,
            \App\Repositories\Overtime\OvertimeEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Profile\UserRepositoryInterface::class,
            \App\Repositories\Profile\UserEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Overtime\OvertimeRepositoryInterface::class,
            \App\Repositories\overtime\OvertimeEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Salary\SalaryRepositoryInterface::class,
            \App\Repositories\Salary\SalaryEloquentRepository::class
        );
    }
}
