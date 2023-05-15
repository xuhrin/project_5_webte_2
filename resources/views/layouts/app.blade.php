<!DOCTYPE html>
<html lang="{{ $locale }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Projekt') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <!-- Top bar -->
    <nav class="red darken-2">
        <div class="nav-wrapper">
            <!-- Project logo/name -->
            <a href="{{ route('welcome') }}" class="brand-logo center">
                {{ config('app.name') }}
            </a>

            <!-- Hamburger menu, shown on small screens -->
            <a href="#" data-target="nav-mobile" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>

            <!-- Top menu, hidden on small screens -->
            <ul class="brand-logo right hide-on-med-and-down">
                @guest
                    <!-- Guest -->
                @else
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="material-icons">home</i>
                            {{ __('app.home') }}
                        </a>
                    </li>
                @endguest
                <li>
                    <a href="{{ route('manual') }}">
                        <i class="material-icons">book</i>
                        {{ __('app.manual') }}
                    </a>
                </li>
                <li>
                    <a id="language-trigger" class="dropdown-trigger" href="#" data-target="language-dropdown">
                        <i class="material-icons">language</i>
                        {{ __('app.language') }}
                    </a>
                </li>
                <ul id="language-dropdown" class="dropdown-content">
                    @foreach ($locales as $l)
                        <li @if ($l == $locale) class="active" @endif>
                            <a class="red-text text-darken-2 center" href="{{ route('language', $l) }}">
                                {{ __('app.' . $l) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}">
                                <i class="material-icons">login</i>
                                {{ __('app.login') }}
                            </a>
                        </li>
                    @endif
                    {{-- You can get here through login --}}
                    {{-- @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">
                                <i class="material-icons">input</i>
                                {{ __('app.register') }}
                            </a>
                        </li>
                    @endif --}}
                @else
                    <li>
                        <a id="user-trigger" class="dropdown-trigger" href="#" data-target="user-dropdown">
                            <i class="material-icons-outlined">person</i>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <ul id="user-dropdown" class="dropdown-content">
                        <li>
                            <a class="red-text text-darken-2 center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons">logout</i>
                                {{ __('app.logout') }}
                            </a>
                        </li>
                    </ul>
                @endguest
            </ul>
        </div>
    </nav>

    <!-- Sidebar, shown when top menu changes to hamburger menu -->
    <ul id="nav-mobile" class="sidenav">
        <li class="logo">
            <a href="{{ route('welcome') }}" class="brand-logo">
                <h3 class="bold red-text text-darken-2">{{ config('app.name') }}</h3>
            </a>
        </li>
        <li>
            <div class="divider"></div>
        </li>
        @guest
            <!-- Guest -->
        @else
            <li class="active">
                <a href="#">
                    <i class="material-icons-outlined">person</i>
                    {{ Auth::user()->name }}
                </a>
            </li>
            <li>
                <!-- TODO: Use blade to mark active page -->
                <a class="waves-effect" href="{{ route('home') }}">
                    <i class="material-icons">home</i>
                    {{ __('app.home') }}
                </a>
            </li>
        @endguest
        <li>
            <a class="waves-effect" href="{{ route('manual') }}">
                <i class="material-icons">book</i>
                {{ __('app.manual') }}
            </a>
        </li>
        <!-- Collapsible menu, class tweaked in app.css -->
        <li class="no-padding">
            <ul class="collapsible">
                <li>
                    <a class="collapsible-header waves-effect bold" href="#" data-target="language-collapsible">
                        <i class="material-icons">language</i>
                        {{ __('app.language') }}
                    </a>
                    <ul id="language-collapsible" class="collapsible-body">
                        @foreach ($locales as $l)
                            <li @if ($l == $locale) class="active" @endif>
                                <a href="{{ route('language', $l) }}">
                                    <i class="material-icons">chevron_right</i> {{ __('app.' . $l) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </li>
        @guest
            @if (Route::has('login'))
                <li>
                    <a class="waves-effect"  href="{{ route('login') }}">
                        <i class="material-icons">login</i>
                        {{ __('app.login') }}
                    </a>
                </li>
            @endif
            @if (Route::has('register'))
                <li>
                    <a class="waves-effect" href="{{ route('register') }}">
                        <i class="material-icons">input</i>
                        {{ __('app.register') }}
                    </a>
                </li>
            @endif
        @else
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons">logout</i>
                    {{ __('app.logout') }}
                </a>
            </li>
        @endguest
    </ul>

    <!-- Page contents, set by other blade files -->
    <div class="container center-align">
        @yield('content')
    </div>

    <!-- To send POST instead of GET -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
        @csrf
    </form>

</body>

</html>
