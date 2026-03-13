<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Cashier\Subscription as BaseSubscription;

class Subscription extends BaseSubscription
{
    use HasUlids;
}
