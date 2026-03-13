<?php

declare(strict_types=1);

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\PasswordUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordController extends Controller
{
    /**
     * Display the password settings page.
     */
    public function edit(): View
    {
        return view('settings.password');
    }

    /**
     * Update the user's password.
     */
    public function update(PasswordUpdateRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'password-updated');
    }
}
