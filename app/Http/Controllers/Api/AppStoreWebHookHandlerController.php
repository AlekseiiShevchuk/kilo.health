<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebHooks\AppStoreWebHookRequest;
use App\Services\Contracts\PaymentServiceInterface;
use Illuminate\Http\Response;

class AppStoreWebHookHandlerController extends Controller
{
    public function handleSubscriptionWebHook(AppStoreWebHookRequest $request, PaymentServiceInterface $paymentService): Response
    {
        try {
            $paymentService->processSubscription($request->getWebhookResponseDTO());
            return response('Success', Response::HTTP_BAD_GATEWAY);
        } catch (\Exception $e) {
            return response('Error', Response::HTTP_BAD_GATEWAY);
        }
    }
}
