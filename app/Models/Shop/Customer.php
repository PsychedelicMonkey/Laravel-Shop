<?php

declare(strict_types=1);

namespace App\Models\Shop;

use App\Models\User;
use Database\Factories\Shop\CustomerFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    /** @use HasFactory<CustomerFactory> */
    use HasFactory;

    use HasUlids;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'shop_customers';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'photo',
        'phone',
        'birthday',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'birthday' => 'date',
        ];
    }

    /** @return HasMany<Order, $this> */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'shop_customer_id');
    }

    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
