@extends ('layouts.app')

@section ('content')
    <div class="mx-auto max-w-7xl p-4 lg:p-6">
        <div class="mb-4">
            <h1 class="text-3xl font-semibold">{{ __('Register an account') }}</h1>
        </div>

        <form action="{{ route('register.store') }}" method="post">
            @csrf

            <x-fieldset class="border-base-300 bg-base-200 rounded-box max-w-xl border p-4">
                <x-label>{{ __('Name') }}</x-label>
                <label @class (['input', 'w-full', 'input-error' => $errors->has('name')])>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="grow"
                        placeholder="{{ __('Name') }}"
                        value="{{ old('name') }}"
                    />
                    <span class="badge badge-neutral badge-xs">{{ __('Required') }}</span>
                </label>
                <x-input-error :messages="$errors->get('name')" />

                <x-label for="email">{{ __('Email address') }}</x-label>
                <label @class (['input', 'w-full', 'input-error' => $errors->has('email')])>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="grow"
                        placeholder="{{ __('Email address') }}"
                        value="{{ old('email') }}"
                    />
                    <span class="badge badge-neutral badge-xs">{{ __('Required') }}</span>
                </label>
                <x-input-error :messages="$errors->get('email')" />

                <x-label for="password">{{ __('Password') }}</x-label>
                <label @class (['input', 'w-full', 'input-error' => $errors->has('password')])>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="grow"
                        placeholder="{{ __('Password') }}"
                    />
                    <span class="badge badge-neutral badge-xs">{{ __('Required') }}</span>
                </label>
                <x-input-error :messages="$errors->get('password')" />

                <x-label for="password_confirmation">{{ __('Confirm password') }}</x-label>
                <label
                    @class (['input', 'w-full', 'input-error' => $errors->has('password_confirmation')])
                >
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="grow"
                        placeholder="{{ __('Confirm password') }}"
                    />
                    <span class="badge badge-neutral badge-xs">{{ __('Required') }}</span>
                </label>
                <x-input-error :messages="$errors->get('password_confirmation')" />

                <button type="submit" class="btn btn-neutral mt-4">{{ __('Register') }}</button>
            </x-fieldset>
        </form>
    </div>
@endsection
