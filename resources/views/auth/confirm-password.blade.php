@extends ('layouts.app')

@section ('title', __('Confirm password'))

@section ('content')
    <div class="mx-auto max-w-7xl p-4 lg:p-6">
        <h1 class="mb-4 text-3xl font-semibold">{{ __('Confirm your password') }}</h1>

        <p>{{ __('Please confirm your password before continuing to the next page.') }}</p>

        <form action="{{ route('password.confirm') }}" method="post">
            @csrf

            <x-fieldset class="border-base-300 bg-base-200 rounded-box max-w-xl border p-4">
                <legend class="fieldset-legend">{{ __('Confirm your password') }}</legend>

                <x-label for="password">{{ __('Password') }}</x-label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="{{ __('Password') }}"
                    @class (['input', 'w-full', 'input-error' => $errors->has('password')])
                />
                <x-input-error :messages="$errors->get('password')" />

                <button type="submit" class="btn btn-neutral mt-4">
                    {{ __('Confirm password') }}
                </button>
            </x-fieldset>
        </form>
    </div>
@endsection
