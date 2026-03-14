<?php

declare(strict_types=1);

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function (): View {
    $posts = Post::query()
        ->with(['author', 'category', 'media'])
        ->whereDate('published_at', '<=', Carbon::now())
        ->orderByDesc('published_at')
        ->limit(10)
        ->get();

    return view('home', compact('posts'));
})->name('home');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
