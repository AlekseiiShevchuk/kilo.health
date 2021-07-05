<?php declare(strict_types=1);

namespace App\Services\Contracts;

use App\DTO\Contracts\SubscriptionWebHookInterface;

interface UserSubscriptionServiceInterface
{
    public function subscribe(SubscriptionWebHookInterface $webHookDto): void;

    public function renew(SubscriptionWebHookInterface $webHookDto): void;

    public function cancel(SubscriptionWebHookInterface $webHookDto): void;

}