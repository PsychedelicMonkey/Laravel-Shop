<?php

declare(strict_types=1);

namespace App\Models\Shop;

use Database\Factories\Shop\BrandFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    /** @use HasFactory<BrandFactory> */
    use HasFactory;

    use HasUlids;

    /**
     * @var string
     */
    protected $table = 'shop_brands';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'website',
        'description',
        'position',
        'is_visible',
        'sort',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'position' => 'integer',
            'is_visible' => 'boolean',
            'sort' => 'integer',
        ];
    }

    /** @return HasMany<Product, $this> */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'shop_brand_id');
    }
}
