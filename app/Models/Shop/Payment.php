<?php

declare(strict_types=1);

namespace App\Models\Shop;

use Database\Factories\Shop\PaymentFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    /** @use HasFactory<PaymentFactory> */
    use HasFactory;

    use HasUlids;

    /**
     * @var string
     */
    protected $table = 'shop_payments';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'shop_order_id',
        'reference',
        'provider',
        'method',
        'amount',
        'currency',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    /** @return BelongsTo<Order, $this> */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'shop_order_id');
    }
}
