<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

test('login screen can be rendered', function (): void {
    $response = $this->get(route('login'));

    $response->assertOk();
});

test('users can authenticate using the login screen', function (): void {
    $user = User::factory()->create();

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('home', absolute: false));
});

test('users can not authenticate with invalid password', function (): void {
    $user = User::factory()->create();

    $response = $this
        ->from(route('login'))
        ->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

    $this->assertGuest();

    $response
        ->assertSessionHasErrors('email')
        ->assertRedirect(route('login', absolute: false));
});

test('users can logout', function (): void {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('logout'));

    $this->assertGuest();
    $response->assertRedirect(route('home', absolute: false));
});

test('users are rate limited', function (): void {
    $user = User::factory()->create();

    RateLimiter::increment(implode('|', [$user->email, '127.0.0.1']), amount: 5);

    $response = $this
        ->from(route('login'))
        ->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

    $this->assertGuest();

    $response
        ->assertSessionHasErrors('email')
        ->assertRedirect(route('login', absolute: false));
});
