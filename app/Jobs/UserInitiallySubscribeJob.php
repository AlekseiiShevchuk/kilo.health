<?php

namespace App\Jobs;

use App\Events\UserInitiallySubscribedEvent;
use App\Services\Contracts\UserSubscriptionServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserInitiallySubscribeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var UserInitiallySubscribedEvent
     */
    private $event;

    public function __construct(UserInitiallySubscribedEvent $event)
    {
        $this->event = $event;
    }

    public function handle(UserSubscriptionServiceInterface $userSubscriptionService): void
    {
        $userSubscriptionService->subscribe($this->event->getWebhookResponseDTO());
    }
}
