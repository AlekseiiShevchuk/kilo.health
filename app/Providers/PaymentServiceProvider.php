<?php declare(strict_types=1);

namespace App\Providers;

use App\Http\Controllers\Api\AppStoreWebHookHandlerController;
use App\Services\AppStorePaymentService;
use App\Services\Contracts\PaymentServiceInterface;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->when(AppStoreWebHookHandlerController::class)
            ->needs(PaymentServiceInterface::class)
            ->give(AppStorePaymentService::class);
    }

    public function boot(): void
    {
        //
    }
}
