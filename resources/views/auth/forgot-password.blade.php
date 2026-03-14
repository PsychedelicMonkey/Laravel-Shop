@extends ('layouts.app')

@section ('title', __('Forgot password'))

@section ('content')
    <div class="mx-auto max-w-7xl p-4 lg:p-6">
        <h1 class="mb-4 text-3xl font-semibold">{{ __('Forgot password?') }}</h1>

        <form action="{{ route('password.email') }}" method="post">
            @csrf

            <x-fieldset class="border-base-300 bg-base-200 rounded-box max-w-xl border p-4">
                @if (session()->has('status'))
                    <div class="alert alert-info" role="alert">{{ session('status') }}</div>
                @endif

                <x-label for="email">{{ __('Email address') }}</x-label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="{{ __('Email address') }}"
                    value="{{ old('email') }}"
                    @class (['input', 'w-full', 'input-error' => $errors->has('email')])
                />
                <x-input-error :messages="$errors->get('email')" />

                <button type="submit" class="btn btn-neutral mt-4">{{ __('Send email') }}</button>
            </x-fieldset>
        </form>
    </div>
@endsection
