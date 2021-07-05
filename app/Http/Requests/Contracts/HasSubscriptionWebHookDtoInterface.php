<?php declare(strict_types=1);

namespace App\Http\Requests\Contracts;

use App\DTO\Contracts\SubscriptionWebHookInterface;

interface HasSubscriptionWebHookDtoInterface
{
    public function getWebhookResponseDTO(): SubscriptionWebHookInterface;

}