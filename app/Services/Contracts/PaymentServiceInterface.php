<?php declare(strict_types=1);

namespace App\Services\Contracts;

use App\DTO\Contracts\SubscriptionWebHookInterface;

interface PaymentServiceInterface
{
    public function processSubscription(SubscriptionWebHookInterface $webHookDto): void;

}