<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getUserByAutoRenewAdamId(string $autoRenewAdamId): ?User
    {
        // no logic just Mock
        return User::first();
    }
}