<?php declare(strict_types=1);

namespace App\DTO;

use App\DTO\Contracts\SubscriptionWebHookInterface;

class AppStoreWebHookResponseDTO implements SubscriptionWebHookInterface
{
    /** @var string */
    private $notificationType;

    /** @var string */
    private $autoRenewProductId;

    /** @var string */
    private $autoRenewAdamId;

    public function __construct(
        string $notificationType,
        string $autoRenewProductId,
        string $autoRenewAdamId
    ) {
        $this->notificationType = $notificationType;
        $this->autoRenewProductId = $autoRenewProductId;
        $this->autoRenewAdamId = $autoRenewAdamId;
    }

    public function getNotificationType(): string
    {
        return $this->notificationType;
    }

    public function getAutoRenewProductId(): string
    {
        return $this->autoRenewProductId;
    }

    public function getAutoRenewAdamId(): string
    {
        return $this->autoRenewAdamId;
    }
}