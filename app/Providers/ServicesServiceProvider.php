<?php declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Contracts\UserSubscriptionRepositoryInterface;
use App\Repositories\UserSubscriptionRepository;
use App\Services\Contracts\UserSubscriptionServiceInterface;
use App\Services\UserSubscriptionService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(UserSubscriptionServiceInterface::class, UserSubscriptionService::class);
        $this->app->singleton(UserSubscriptionRepositoryInterface::class, UserSubscriptionRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
