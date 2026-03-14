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
                <x-label for="email">{{ __('Email address') }}</x-label>
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

                <x-label for="password">{{ __('Password') }}</x-label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="{{ __('Password') }}"
                    @class (['input', 'input-error' => $errors->has('password')])
                />
                <x-input-error :messages="$errors->get('password')" />

                <x-label for="password_confirmation">{{ __('Confirm password') }}</x-label>
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
