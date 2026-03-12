@extends ('layouts.app')

@section ('title', __('Edit your profile'))

@section ('content')
    <div class="mx-auto max-w-7xl p-4 lg:p-6">
        <h1 class="mb-4 text-3xl font-semibold">{{ __('Edit your profile') }}</h1>

        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method ('PATCH')

            <x-fieldset class="border-base-300 bg-base-200 rounded-box w-xs border p-4">
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
                @endif

                <label for="name" class="label">{{ __('Name') }}</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="{{ __('Name') }}"
                    value="{{ old('name', $user->name) }}"
                    @class (['input', 'input-error' => $errors->has('name')])
                />
                <x-input-error :messages="$errors->get('name')" />

                <label for="email" class="label">{{ __('Email address') }}</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="{{ __('Email address') }}"
                    value="{{ old('email', $user->email) }}"
                    @class (['input', 'input-error' => $errors->has('email')])
                />
                <x-input-error :messages="$errors->get('email')" />

                <button type="submit" class="btn btn-neutral mt-4">{{ __('Save changes') }}</button>
            </x-fieldset>
        </form>
    </div>
@endsection
