<?php

declare(strict_types=1);

use App\Models\User;

test('confirm password screen can be rendered', function (): void {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('password.confirm'));

    $response->assertOk();
});

test('password can be confirmed', function (): void {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('password.confirm'), [
        'password' => 'password',
    ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect();
});

test('password is not confirmed with invalid password', function (): void {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->from(route('password.confirm'))
        ->post(route('password.confirm'), [
            'password' => 'wrong-password',
        ]);

    $response
        ->assertSessionHasErrors('password')
        ->assertRedirect(route('password.confirm', absolute: false));
});

test('password confirmation requires authentication', function (): void {
    $response = $this->get(route('password.confirm'));

    $response->assertRedirect(route('login', absolute: false));
});
