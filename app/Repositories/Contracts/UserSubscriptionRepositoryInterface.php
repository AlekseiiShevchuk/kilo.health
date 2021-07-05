<?php declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\User;
use App\Models\UserSubscription;

interface UserSubscriptionRepositoryInterface
{
    public function getSubscriptionByAutoRenewAdamId(string $autoRenewAdamId): ?UserSubscription;
}