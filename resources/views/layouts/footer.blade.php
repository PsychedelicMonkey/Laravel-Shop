<footer class="footer sm:footer-horizontal bg-base-200 p-10">
    <nav>
        <h6 class="footer-title">{{ __('Language') }}</h6>
        <a class="link link-hover">{{ __('English') }}</a>
        <a class="link link-hover">{{ __('Français') }}</a>
    </nav>
    <nav>
        <h6 class="footer-title">{{ __('Account') }}</h6>
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="link link-hover">{{ __('Logout') }}</button>
            </form>
        @else
            <div>
                <a href="{{ route('login') }}" class="link link-hover">{{ __('Login') }}</a>
                <span class="text-base-content/60">{{ __('or') }}</span>
                <a href="{{ route('register') }}" class="link link-hover">{{ __('Register') }}</a>
            </div>
        @endauth
        <a class="link link-hover">{{ __('Wishlist') }}</a>
        <a class="link link-hover">{{ __('Order Status') }}</a>
    </nav>
    <nav>
        <h6 class="footer-title">{{ __('Legal') }}</h6>
        <a class="link link-hover">{{ __('Terms of Service') }}</a>
        <a class="link link-hover">{{ __('Privacy Policy') }}</a>
        <a class="link link-hover">{{ __('Cookies') }}</a>
    </nav>

    <!-- Theme controller -->
    <nav>
        <h6 class="footer-title">{{ __('Theme') }}</h6>
        <x-theme-controller />
    </nav>
</footer>
<footer class="footer sm:footer-horizontal footer-center bg-neutral text-neutral-content p-4">
    <aside>
        <p>&copy; {{ __(':date - All rights reserved by :app', ['date' => now()->format('Y'), 'app' => config('app.name')]) }}</p>
    </aside>
</footer>
