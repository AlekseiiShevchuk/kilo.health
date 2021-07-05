<?php

namespace App\Jobs;

use App\Events\UserDidRenewEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserRenewSubscriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var UserDidRenewEvent
     */
    private $event;

    public function __construct(UserDidRenewEvent $event)
    {
        $this->event = $event;
    }

    public function handle(): void
    {
        //
    }
}
