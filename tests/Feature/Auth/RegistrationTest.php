<?php

declare(strict_types=1);

use App\Models\User;

test('registration screen can be rendered', function (): void {
    $response = $this->get(route('register'));

    $response->assertOk();
});

test('new users can register', function (): void {
    $newUser = User::factory()->make();

    $response = $this->post(route('register.store'), [
        'name' => $newUser->name,
        'email' => $newUser->email,
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('home', absolute: false));
});
