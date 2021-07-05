<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Models\UserSubscription;
use App\Repositories\Contracts\UserSubscriptionRepositoryInterface;

class UserSubscriptionRepository implements UserSubscriptionRepositoryInterface
{
    public function getSubscriptionByAutoRenewAdamId(string $autoRenewAdamId): ?UserSubscription
    {
        return UserSubscription::query()->first();
    }
}