<?php

declare(strict_types=1);

namespace Database\Factories\Shop;

use App\Enums\OrderStatus;
use App\Models\Shop\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * @var class-string<Order>
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => 'OR' . $this->faker->unique()->randomNumber(6),
            'currency' => strtolower($this->faker->currencyCode()),
            'total_price' => $this->faker->randomFloat(2, 100, 2000),
            'status' => $this->faker->randomElement(OrderStatus::class),
            'shipping_price' => $this->faker->randomFloat(2, 100, 500),
            'shipping_method' => $this->faker->randomElement(['free', 'flat', 'flat_rate', 'flat_rate_per_item']),
            'notes' => $this->faker->realText(100),
            'created_at' => $this->faker->dateTimeBetween('-1 year'),
            'updated_at' => $this->faker->dateTimeBetween('-5 month'),
        ];
    }

    public function configure(): Factory
    {
        return $this->afterCreating(function (Order $order): void {
            $order->address()->save(OrderAddressFactory::new()->make());
        });
    }
}
