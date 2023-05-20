@extends('layouts.app')

@section('content')
<div class="section">
    <!-- Everything is inside a card -->
    <div class="card">
        <div class="card-content row">
            <form class="col s12" method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Title -->
                <div class="row">
                    <p class="col s12">
                        <h4>{{ __('form.confirm_password') }}</h4>
                    </p>
                </div>

                <!-- Password input -->
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

                <!-- Submit button -->
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light red darken-2">
                            {{ __('form.confirm') }}
                        </button>
                    </div>
                </div>

                <!-- Password reset -->
                @if (Route::has('password.request'))
                    <div class="row">
                        <p class="col s12 center">
                            <a class="red-text text-darken-2" href="{{ route('password.request') }}">
                                {{ __('form.forgot') }}
                            </a>
                        </p>
                    </div>
                @endif

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
