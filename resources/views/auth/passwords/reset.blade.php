@extends('layouts.app')

@section('content')
<div class="section">
    <!-- Everything is inside a card -->
    <div class="card">
        <div class="card-content row">
            <form class="col s12" method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Title -->
                <div class="row">
                    <p class="col s12">
                        <h4>{{ __('form.reset') }}</h4>
                    </p>
                </div>

                <!-- E-Mail input -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons-outlined prefix">email</i>
                        <input id="email" type="email" class="@error('email') invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">{{ __('form.email') }}</label>

                        <!-- Error message here -->
                        @error('email')
                            <span class="helper-text" data-error="{{ $message }}" data-success="?"></span>
                        @enderror
                    </div>
                </div>

                <!-- Special token (generated) -->
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Password input -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons-outlined prefix">lock_open</i>
                        <input id="password" type="password" class="@error('password') invalid @enderror" name="password" required autocomplete="new-password">
                        <label for="password">{{ __('form.password') }}</label>

                        <!-- Error message here -->
                        @error('password')
                            <span class="helper-text" data-error="{{ $message }}" data-success="?"></span>
                        @enderror
                    </div>
                </div>

                <!-- Password confirmation input -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons-outlined prefix">lock</i>
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm">{{ __('form.confirm') }}</label>
                    </div>
                </div>

                <!-- Already have an account? Login -->
                <div class="row">
                    <p class="col s12 center">
                        {{ __('form.already_have_account') }}
                        <a class="red-text text-darken-2" href="{{ route('login') }}">
                            {{ __('form.login_action') }}
                        </a>
                    </p>
                </div>

                <!-- Submit button -->
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light red darken-2">
                            {{ __('form.reset_action') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
