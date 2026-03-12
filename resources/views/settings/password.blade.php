@extends ('layouts.app')

@section ('title', __('Change password'))

@section ('content')
    <div class="mx-auto max-w-7xl p-4 lg:p-6">
        <h1 class="mb-4 text-3xl font-semibold">{{ __('Change your password') }}</h1>

        <form action="{{ route('password.update') }}" method="post">
            @csrf
            @method ('PUT')

            <x-fieldset class="border-base-300 bg-base-200 rounded-box w-xs border p-4">
                @if (session('status') === 'password-updated')
                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-init="setTimeout(() => (show = false), 2000)"
                        x-transition
                        class="alert alert-success"
                        role="alert"
                    >
                        {{ __('Your password has been changed') }}
                    </div>
                @endif

                <label for="current_password" class="label">{{ __('Current password') }}</label>
                <input
                    type="password"
                    name="current_password"
                    id="current_password"
                    placeholder="{{ __('Current password') }}"
                    @class (['input', 'input-error' => $errors->has('current_password')])
                />
                <x-input-error :messages="$errors->get('current_password')" />

                <label for="password" class="label">{{ __('New password') }}</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="{{ __('New password') }}"
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

                <button type="submit" class="btn btn-neutral mt-4">{{ __('Save changes') }}</button>
            </x-fieldset>
        </form>
    </div>
@endsection
