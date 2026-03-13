<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Spatie\Tags\Tag as BaseTag;

class Tag extends BaseTag
{
    use HasUlids;
}
