<div class="navbar bg-base-200 shadow-sm">
    <div class="navbar-start">
        <div class="lg:hidden">
            <label for="navbar-drawer" class="btn btn-square btn-ghost">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    class="inline-block h-6 w-6 stroke-current"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    ></path>
                </svg>
            </label>
        </div>

        <a href="{{ route('home') }}" class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
    </div>

    <div class="navbar-center hidden lg:block">
        <div class="join">
            <div class="w-96">
                <label class="input join-item w-full">
                    <input
                        type="search"
                        name="search"
                        id="search"
                        placeholder="{{ __('Search') }}"
                    />
                </label>
            </div>
            <button class="btn btn-neutral join-item">{{ __('Search') }}</button>
        </div>
    </div>

    <div class="navbar-end">
        <div class="hidden lg:block">
            <ul class="menu menu-horizontal">
                <li><a href="#">{{ __('About') }}</a></li>
                <li><a href="#">{{ __('Wish list') }}</a></li>
                @guest
                    <li>
                        <details>
                            <summary>{{ __('Account') }}</summary>
                            <ul>
                                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            </ul>
                        </details>
                    </li>
                @endguest
            </ul>
        </div>

        <div class="flex-none">
            <!-- Cart dropdown -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        <span class="badge badge-sm indicator-item">8</span>
                    </div>
                </div>
                <div
                    tabindex="0"
                    class="card card-compact dropdown-content bg-base-100 z-1 mt-3 w-52 shadow"
                >
                    <div class="card-body">
                        <span class="text-lg font-bold">{{ __('8 Items') }}</span>
                        <span class="text-info">{{ __('Subtotal: $999') }}</span>
                        <div class="card-actions">
                            <button class="btn btn-primary btn-block">{{ __('View cart') }}</button>
                        </div>
                    </div>
                </div>
            </div>

            @auth
                <!-- User dropdown -->
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img
                                alt="{{ __('Tailwind CSS Navbar component') }}"
                                src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"
                            />
                        </div>
                    </div>
                    <ul
                        tabindex="-1"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow"
                    >
                        <li>
                            <a class="justify-between">
                                {{ __('Profile') }}
                                <span class="badge">{{ __('New') }}</span>
                            </a>
                        </li>
                        <li>
                            <details>
                                <summary>{{ __('Settings') }}</summary>
                                <ul>
                                    <li>
                                        <a href="{{ route('profile.edit') }}">
                                            {{ __('Edit profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('password.edit') }}">
                                            {{ __('Change password') }}
                                        </a>
                                    </li>
                                </ul>
                            </details>
                        </li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf

                            <li>
                                <button type="submit">{{ __('Logout') }}</button>
                            </li>
                        </form>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</div>
