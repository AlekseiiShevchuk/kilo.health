<?php declare(strict_types=1);

namespace App\Services;

use App\DTO\Contracts\SubscriptionWebHookInterface;
use App\Models\UserSubscription;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\UserSubscriptionRepositoryInterface;
use App\Services\Contracts\UserSubscriptionServiceInterface;
use Carbon\Carbon;
use Carbon\CarbonInterface;

class UserSubscriptionService implements UserSubscriptionServiceInterface
{

    public function subscribe(SubscriptionWebHookInterface $webHookDto): void
    {
        /** @var UserRepositoryInterface  $userRepo */
        $userRepo = app(UserRepositoryInterface::class);
        $user = $userRepo->getUserByAutoRenewAdamId($webHookDto->getAutoRenewAdamId());

        if (!$user) {
            // also need to properly log all details, not just throwing an error
            throw new \Exception('No user found during subscription');
        }

        $userSubscription = new UserSubscription();
        $userSubscription->setUser($user);
        $userSubscription->setExpiresAt($this->getSubscriptionExpiresAt($webHookDto));
        $userSubscription->setProductId($webHookDto->getAutoRenewProductId());
        $userSubscription->save();
    }

    public function renew(SubscriptionWebHookInterface $webHookDto): void
    {
        /** @var UserSubscriptionRepositoryInterface $subscriptionRepo */
        $subscriptionRepo = app(UserSubscriptionRepositoryInterface::class);
        $subscription = $subscriptionRepo->getSubscriptionByAutoRenewAdamId($webHookDto->getAutoRenewAdamId());

        if (!$subscription) {
            // also need to properly log all details, not just throwing an error
            throw new \Exception('No subscription found during subscription renew');
        }

        $subscription->renew();
    }

    public function cancel(SubscriptionWebHookInterface $webHookDto): void
    {
        /** @var UserSubscriptionRepositoryInterface $subscriptionRepo */
        $subscriptionRepo = app(UserSubscriptionRepositoryInterface::class);
        $subscription = $subscriptionRepo->getSubscriptionByAutoRenewAdamId($webHookDto->getAutoRenewAdamId());

        if (!$subscription) {
            // also need to properly log all details, not just throwing an error
            throw new \Exception('No subscription found during subscription cancelling');
        }

        $subscription->cancel();
    }

    private function getSubscriptionExpiresAt(SubscriptionWebHookInterface $webHookDto): CarbonInterface
    {
        // will put here some logic depend on other details
        return Carbon::now()->addYear();
    }
}