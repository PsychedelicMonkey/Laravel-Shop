@extends ('layouts.app')

@section ('title', __('Reset password'))

@section ('content')
    <div class="mx-auto max-w-7xl p-4 lg:p-6">
        <h1 class="mb-4 text-3xl font-semibold">{{ __('Reset password') }}</h1>

        <form action="{{ route('password.store') }}" method="post">
            @csrf

            <!-- Password reset token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}" />

            <x-fieldset class="border-base-300 bg-base-200 rounded-box w-xs border p-4">
                <label for="email" class="label">{{ __('Email address') }}</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="{{ __('Email address') }}"
                    value="{{ old('email', $request->email) }}"
                    @class (['input', 'input-error' => $errors->has('email')])
                    readonly
                />
                <x-input-error :messages="$errors->get('email')" />

                <label for="password" class="label">{{ __('Password') }}</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="{{ __('Password') }}"
                    @class (['input', 'input-error' => $errors->has('password')])
                />
                <x-input-error :messages="$errors->get('password')" />

                <label
                    for="password_confirmation"
                    class="label"
                    >{{ __('Confirm password') }}</label
                >
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="{{ __('Confirm password') }}"
                    @class (['input', 'input-error' => $errors->has('password_confirmation')])
                />
                <x-input-error :messages="$errors->get('password_confirmation')" />

                <button type="submit" class="btn btn-neutral mt-4">{{ __('Save') }}</button>
            </x-fieldset>
        </form>
    </div>
@endsection
