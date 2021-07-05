<?php declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserSubscription
 *
 * @property int $id
 * @property int $user_id
 * @property string $product_id
 * @property Carbon|null $expires_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 */
class UserSubscription extends Model
{
    use HasFactory;

    public function setUser(User $user): void
    {
        $this->user()->associate($user);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setExpiresAt(CarbonInterface $expiresAt): void
    {
        $this->expires_at = $expiresAt;
    }

    public function setProductId(string $productId): void
    {
        $this->product_id = $productId;
    }

    public function renew(): void
    {
        // some logic here
        // increase expires_at
    }

    public function cancel(): void
    {
        // some logic here
        // mark it as cancelled
    }
}
