<?php

namespace App\Events;

use App\DTO\Contracts\SubscriptionWebHookInterface;
use App\Http\Requests\Contracts\HasSubscriptionWebHookDtoInterface;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserDidFailToRenewEvent implements HasSubscriptionWebHookDtoInterface
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var SubscriptionWebHookInterface
     */
    public $webHookDto;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(SubscriptionWebHookInterface $webHookDto)
    {
        $this->webHookDto = $webHookDto;
    }

    // ToDo: Extract it to trait to avoid code duplication
    public function getWebhookResponseDTO(): SubscriptionWebHookInterface
    {
        return $this->webHookDto;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
