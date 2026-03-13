@extends ('layouts.app')

@section ('title', __('Verify email'))

@section ('content')
    <div class="mx-auto max-w-7xl p-4 lg:p-6">
        @if (session('status') === 'verification-link-sent')
            <div class="alert alert-info" role="alert">{{ __('Verification link sent') }}</div>
        @endif

        <h1 class="my-4 text-3xl font-semibold">{{ __('Verify your email') }}</h1>

        <p>{{ __('Before you continue, please verify your email address by clicking the link we sent you during registration.') }}</p>
        <p>{{ __('If you need a new email verification link, click the button below.') }}</p>

        <form action="{{ route('verification.send') }}" method="post">
            @csrf

            <button type="submit" class="btn btn-neutral mt-4">
                {{ __('Send new verification link') }}
            </button>
        </form>
    </div>
@endsection
