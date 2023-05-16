@extends('layouts.app')

@section('content')
<div class="section">
    <!-- Everything is inside a card -->
    <div class="card">
        <div class="card-content row">
            <form class="col s12" method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Title -->
                <div class="row">
                    <p class="col s12">
                        <h4>{{ __('form.reset') }}</h4>
                    </p>
                </div>

                @if (session('status'))
                    <div class="card-panel black-text teal accent-3">
                        {{ session('status') }}
                    </div>
                @endif

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

                <!-- Submit button -->
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light red darken-2">
                            {{ __('form.send_reset_link') }}
                        </button>
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
