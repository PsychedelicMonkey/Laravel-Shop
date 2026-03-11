<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- prettier-ignore-start --}}
    @hasSection ('title')
        <title>
            @yield ('title') - {{ config('app.name') }}
        </title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    {{-- prettier-ignore-end --}}

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite (['resources/css/app.css', 'resources/js/app.ts'])
    @endif
</head>
<body class="font-sans antialiased">
    <div class="drawer">
        <input type="checkbox" id="navbar-drawer" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            @include ('layouts.navigation')

            <!-- Page Content -->
            <div class="min-h-screen">
                <main>
                    @yield ('content')
                </main>
            </div>

            @include ('layouts.footer')
        </div>

        <!-- Sidebar -->
        @include ('layouts.sidebar')
    </div>
</body>
</html>
