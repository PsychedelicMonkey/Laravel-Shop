<?php

declare(strict_types=1);

namespace Database\Factories\Shop;

use App\Models\Shop\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * @var class-string<OrderItem>
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'qty' => $this->faker->numberBetween(1, 10),
            'unit_price' => $this->faker->randomFloat(2, 100, 500),
        ];
    }
}
