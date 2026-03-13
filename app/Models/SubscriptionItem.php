<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Cashier\SubscriptionItem as BaseSubscriptionItem;

class SubscriptionItem extends BaseSubscriptionItem
{
    use HasUlids;
}
