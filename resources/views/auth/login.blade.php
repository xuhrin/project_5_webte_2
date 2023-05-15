@extends('layouts.app')

@section('content')
    <div class="section">
        <!-- Everything is inside a card -->
        <div class="card">
            <div class="card-content row">
                <form class="col s12" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Title -->
                    <div class="row">
                        <p class="col s12">
                            <h4>{{ __('form.login') }}</h4>
                        </p>
                    </div>

                    <!-- (Login) E-Mail input -->
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons-outlined prefix">email</i>
                            <input id="email" type="email" class="@error('email') invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email">{{ __('form.email') }}</label>

                            <!-- Error message here -->
                            @error('email')
                                <span class="helper-text" data-error="{{ $message }}" data-success="?"></span>
                            @enderror
                        </div>
                    </div>

                    <!-- (Login) Password input -->
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons-outlined prefix">lock</i>
                            <input id="password" type="password" class="@error('password') invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="password">{{ __('form.password') }}</label>

                            <!-- Error message here -->
                            @error('password')
                                <span class="helper-text" data-error="{{ $message }}" data-success="?"></span>
                            @enderror
                        </div>
                    </div>

                    <div class="row valign-wrapper">
                        <!-- Remember me, input -->
                        <p class="col s4 center">
                            <label for="remember">
                                <input type="checkbox" class="filled-in" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>{{ __('form.remember') }}</span>
                            </label>
                        </p>

                        <!-- Submit button -->
                        <div class="input-field col s4">
                            <button type="submit" class="btn waves-effect waves-light red darken-2">
                                {{ __('form.login_action') }}
                            </button>
                        </div>

                        <!-- Password reset -->
                        @if (Route::has('password.request'))
                            <p class="col s4 center">
                                <a class="red-text text-darken-2" href="{{ route('password.request') }}">
                                    {{ __('form.forgot') }}
                                </a>
                            </p>
                        @endif
                    </div>

                    <!-- Don't have account? Register -->
                    <div class="row">
                        <p class="col s12 center">
                            {{ __('form.dont_have_account') }}
                            <a class="red-text text-darken-2" href="{{ route('register') }}">
                                {{ __('form.register_action') }}
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
