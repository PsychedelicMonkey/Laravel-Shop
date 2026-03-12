<div class="drawer-side">
    <label for="navbar-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
    <div class="bg-base-200 min-h-full w-80">
        <div class="join w-full p-4">
            <label class="input join-item">
                <input type="search" name="search" id="search" placeholder="{{ __('Search') }}" />
            </label>
            <button class="btn btn-neutral join-item">{{ __('Search') }}</button>
        </div>

        <ul class="menu w-full px-4 pb-4">
            <li><a href="#">{{ __('About') }}</a></li>
            <li><a href="#">{{ __('Wishlist') }}</a></li>
            <li class="menu-title">{{ __('Account') }}</li>
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li><button type="submit">{{ __('Logout') }}</button></li>
                </form>
            @else
                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @endauth
        </ul>
    </div>
</div>
