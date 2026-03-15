<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\OrderAddressFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class OrderAddress extends Model
{
    /** @use HasFactory<OrderAddressFactory> */
    use HasFactory;
    use HasUlids;

    /**
     * @var string
     */
    protected $table = 'shop_order_addresses';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'country',
        'street',
        'city',
        'state',
        'zip',
    ];

    /** @return MorphTo<Model, $this> */
    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
