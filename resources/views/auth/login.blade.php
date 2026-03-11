@extends ('layouts.app')

@section ('title', __('Login'))

@section ('content')
    <div class="mx-auto max-w-7xl p-4 lg:p-6">
        <div class="mb-4">
            <h1 class="text-3xl font-semibold">{{ __('Login') }}</h1>
        </div>

        <form action="{{ route('login.store') }}" method="post">
            @csrf

            <x-fieldset class="border-base-300 bg-base-200 rounded-box w-xs border p-4">
                <label for="email" class="label">{{ __('Email address') }}</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="{{ __('Email address') }}"
                    value="{{ old('email') }}"
                    @class (['input', 'input-error' => $errors->has('email')])
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

                <label class="label">
                    <input type="checkbox" name="remember" id="remember" class="checkbox">
                    {{ __('Remember me') }}
                </label>

                <button type="submit" class="btn btn-neutral mt-4">{{ __('Login') }}</button>
            </x-fieldset>
        </form>
    </div>
@endsection
