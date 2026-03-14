@extends ('layouts.app')

@section ('title', __('Edit your profile'))

@section ('content')
    <div class="mx-auto max-w-7xl p-4 lg:p-6">
        <h1 class="mb-4 text-3xl font-semibold">{{ __('Edit your profile') }}</h1>

        @if (! $user->hasVerifiedEmail())
            <form action="{{ route('verification.send') }}" method="post" id="verification-form">
                @csrf
            </form>
        @endif

        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method ('PATCH')

            <x-fieldset class="border-base-300 bg-base-200 rounded-box w-xs border p-4">
                @if (! $user->hasVerifiedEmail())
                    <div class="alert alert-warning alert-vertical" role="alert">
                        {{ __('Your email address is unverified. Certain features will be restricted until you verify your email address.') }}

                        <button type="submit" class="btn" form="verification-form">
                            {{ __('Send new verification link') }}
                        </button>
                    </div>
                @endif

                @if (session('status') === 'profile-updated')
                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-init="setTimeout(() => (show = false), 2000)"
                        x-transition
                        class="alert alert-success"
                        role="alert"
                    >
                        {{ __('Your profile information is updated') }}
                    </div>
                @elseif (session('status') === 'verification-link-sent')
                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-init="setTimeout(() => (show = false), 2000)"
                        x-transition
                        class="alert alert-info"
                        role="alert"
                    >
                        {{ __('Verification link sent') }}
                    </div>
                @endif

                <x-label for="name">{{ __('Name') }}</x-label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="{{ __('Name') }}"
                    value="{{ old('name', $user->name) }}"
                    @class (['input', 'input-error' => $errors->has('name')])
                />
                <x-input-error :messages="$errors->get('name')" />

                <x-label for="email">{{ __('Email address') }}</x-label>
                <label @class (['input', 'input-error' => $errors->has('email')])>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="{{ __('Email address') }}"
                        value="{{ old('email', $user->email) }}"
                    />
                    @if ($user->hasVerifiedEmail())
                        <span class="badge badge-success badge-xs">{{ __('Verified') }}</span>
                    @else
                        <span class="badge badge-warning badge-xs">{{ __('Unverified') }}</span>
                    @endif
                </label>
                <x-input-error :messages="$errors->get('email')" />

                <button type="submit" class="btn btn-neutral mt-4">{{ __('Save changes') }}</button>
            </x-fieldset>
        </form>

        <div class="divider"></div>

        <form action="{{ route('profile.destroy') }}" method="post">
            @csrf
            @method ('DELETE')

            <x-fieldset class="border-base-300 bg-base-200 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">{{ __('Delete account') }}</legend>

                <label for="password" class="label">{{ __('Password') }}</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="{{ __('Password') }}"
                    @class (['input', 'input-error' => $errors->has('password')])
                    @disabled (! $user->hasVerifiedEmail())
                />
                <x-input-error :messages="$errors->get('password')" />

                <button type="submit" class="btn btn-error" @disabled (! $user->hasVerifiedEmail())>
                    {{ __('Delete account') }}
                </button>
            </x-fieldset>
        </form>
    </div>
@endsection
