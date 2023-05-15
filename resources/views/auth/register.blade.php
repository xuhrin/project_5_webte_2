@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Everything is inside a card -->
    <div class="card">
        <div class="card-content row">
            <form class="col s12" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Title -->
                <div class="row">
                    <p class="col s12">
                        <h4>{{ __('form.register') }}</h4>
                    </p>
                </div>

                <!-- Name and surname -->
                <div class="row">
                    <!-- (Register) Name input -->
                    <div class="input-field col s6">
                        <i class="material-icons-outlined prefix">badge</i>
                        <input id="name" type="text" class="@error('name') invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="given-name">
                        <label for="name">{{ __('form.name') }}</label>

                        <!-- Error message here -->
                        @error('name')
                            <span class="helper-text" data-error="{{ $message }}" data-success="right"></span>
                        @enderror
                    </div>

                    <!-- (Register) Surname input -->
                    <div class="input-field col s6">
                        <i class="material-icons-outlined prefix">face</i>
                        <input id="surname" type="text" class="@error('surname') invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="family-name">
                        <label for="surname">{{ __('form.surname') }}</label>

                        <!-- Error message here -->
                        @error('surname')
                            <span class="helper-text" data-error="{{ $message }}" data-success="right"></span>
                        @enderror
                    </div>
                </div>

                <!-- (Register) E-Mail input -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons-outlined prefix">email</i>
                        <input id="email" type="email" class="@error('email') invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="email">{{ __('form.email') }}</label>

                        <!-- Error message here -->
                        @error('email')
                            <span class="helper-text" data-error="{{ $message }}" data-success="?"></span>
                        @enderror
                    </div>
                </div>

                <!-- (Register) Password input -->
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

                <!-- (Register) Password confirmation input -->
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons-outlined prefix">lock</i>
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm">{{ __('form.confirm') }}</label>
                    </div>
                </div>

                <!-- Submit button -->
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light red darken-2">
                            {{ __('form.register_action') }}
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
            </form>
        </div>
    </div>
</div>
@endsection
