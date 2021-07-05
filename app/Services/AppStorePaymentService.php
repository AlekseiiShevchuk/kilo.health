<?php declare(strict_types=1);

namespace App\Services;

use App\DTO\Contracts\SubscriptionWebHookInterface;
use App\Events\UserCanceledSubscriptionEvent;
use App\Events\UserDidRenewEvent;
use App\Events\UserInitiallySubscribedEvent;
use App\Jobs\UserCancelSubscriptionJob;
use App\Jobs\UserInitiallySubscribeJob;
use App\Jobs\UserRenewSubscriptionJob;
use App\Services\Contracts\PaymentServiceInterface;
use Exception;

class AppStorePaymentService implements PaymentServiceInterface
{
    public const INITIAL_BUY = 'INITIAL_BUY';
    public const DID_RENEW = 'DID_RENEW';
    public const DID_FAIL_TO_RENEW = 'DID_FAIL_TO_RENEW';
    public const CANCEL = 'CANCEL';

    /**
     * @throws Exception
     */
    public function processSubscription(SubscriptionWebHookInterface $webHookDto): void
    {
        $subscriptionResult = $webHookDto->getNotificationType();
        if ($subscriptionResult === self::INITIAL_BUY) {
            dispatch(new UserInitiallySubscribeJob(
                new UserInitiallySubscribedEvent($webHookDto))
            );
        }

        if ($subscriptionResult === self::DID_RENEW) {
            dispatch(new UserRenewSubscriptionJob(
                new UserDidRenewEvent($webHookDto))
            );
        }
        if ($subscriptionResult === self::CANCEL) {
            dispatch(new UserCancelSubscriptionJob(
                new UserCanceledSubscriptionEvent($webHookDto)
            ));
        }
        if ($subscriptionResult === self::DID_FAIL_TO_RENEW) {
            // log this somehow, also maybe notify admin and so on.
        }

        // if subscription result did not match any case throw an error
        // also need to log it and maybe notify admin
        throw new Exception('Subscription result did not match any case we expected');
    }
}