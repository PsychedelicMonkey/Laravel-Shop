<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Blog\Author;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(20)->create();

        Author::factory()
            ->count(20)
            ->has(
                Post::factory()->count(5)
                    ->state(fn (array $attributes, Author $author) => ['blog_category_id' => $categories->random(1)->first()->id]),
                'posts'
            )
            ->create();
    }
}
