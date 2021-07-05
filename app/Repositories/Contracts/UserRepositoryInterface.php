<?php declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getUserByAutoRenewAdamId(string $autoRenewAdamId): ?User;
}