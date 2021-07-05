<?php declare(strict_types=1);

namespace App\DTO\Contracts;

interface SubscriptionWebHookInterface
{
    public function getNotificationType(): string;

    public function getAutoRenewProductId(): string;

    public function getAutoRenewAdamId(): string;
}