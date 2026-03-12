<?php

declare(strict_types=1);

use App\Models\User;

test('profile page is displayed', function (): void {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('profile.edit'));

    $response->assertOk();
});

test('profile information can be updated', function (): void {
    $user = User::factory()->create();
    $newUser = User::factory()->make();

    $response = $this
        ->actingAs($user)
        ->from(route('profile.edit'))
        ->patch(route('profile.update'), [
            'name' => $newUser->name,
            'email' => $newUser->email,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('profile.edit', absolute: false));

    $user->refresh();

    $this->assertSame($newUser->name, $user->name);
    $this->assertSame($newUser->email, $user->email);
    $this->assertNull($user->email_verified_at);
});

test('email verification status is unchanged when the email address is unchanged', function (): void {
    $user = User::factory()->create();
    $newUser = User::factory()->make();

    $response = $this
        ->actingAs($user)
        ->from(route('profile.edit'))
        ->patch(route('profile.update'), [
            'name' => $newUser->name,
            'email' => $user->email,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('profile.edit', absolute: false));

    $this->assertNotNull($user->refresh()->email_verified_at);
});

test('user can delete their account', function (): void {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->delete(route('profile.destroy'), [
            'password' => 'password',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('home', absolute: false));

    $this->assertGuest();
    $this->assertNull($user->fresh());
});

test('correct password must be provided to delete account', function (): void {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->from(route('profile.edit'))
        ->delete(route('profile.destroy'), [
            'password' => 'wrong-password',
        ]);

    $response
        ->assertSessionHasErrors('password')
        ->assertRedirect(route('profile.edit', absolute: false));

    $this->assertNotNull($user->fresh());
});
