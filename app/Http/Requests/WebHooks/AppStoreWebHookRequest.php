<?php declare(strict_types=1);

namespace App\Http\Requests\WebHooks;

use App\DTO\AppStoreWebHookResponseDTO;
use App\DTO\Contracts\SubscriptionWebHookInterface;
use App\Http\Requests\Contracts\HasSubscriptionWebHookDtoInterface;
use Illuminate\Foundation\Http\FormRequest;

class AppStoreWebHookRequest extends FormRequest implements HasSubscriptionWebHookDtoInterface
{

    private const NOTIFICATION_TYPE = 'notification_type';
    private const AUTO_RENEW_PRODUCT_ID = 'auto_renew_product_id';
    private const AUTO_RENEW_ADAM_ID = 'auto_renew_adam_id';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }

    public function getWebhookResponseDTO(): SubscriptionWebHookInterface
    {
        return new AppStoreWebHookResponseDTO(
            (string)$this->get(self::NOTIFICATION_TYPE),
            (string)$this->get(self::AUTO_RENEW_PRODUCT_ID),
            (string)$this->get(self::AUTO_RENEW_ADAM_ID),
        );
    }
}
