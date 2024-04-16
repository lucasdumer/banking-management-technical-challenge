<?php

namespace App\Infrastructure\Providers;

use App\Application\Services\AccountService;
use App\Application\Services\TransactionService;
use App\Domain\Strategy\RateStrategy;
use App\Infrastructure\Repository\AccountRepository;
use App\Infrastructure\Repository\TransactionRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TransactionService::class, function (Application $app) {
            return new TransactionService(
                $app->make(AccountRepository::class),
                $app->make(TransactionRepository::class),
                $app->make(RateStrategy::class),
            );
        });
        $this->app->bind(AccountService::class, function (Application $app) {
            return new AccountService(
                $app->make(AccountRepository::class),
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
