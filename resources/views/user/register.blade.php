<div class="row">
    <form class="col s12" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name and surname -->
        <div class="row">
            <!-- (Register) Name input -->
            <div class="input-field col s6">
                <i class="material-icons-outlined prefix">badge</i>
                <input id="register-name" type="text" class="@error('register-name') invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="given-name">
                <label for="register-name">{{ __('form.name') }}</label>

                <!-- Error message here -->
                @error('register-name')
                    <span class="helper-text" data-error="{{ $message }}" data-success="right"></span>
                @enderror
            </div>

            <!-- (Register) Surname input -->
            <div class="input-field col s6">
                <i class="material-icons-outlined prefix">face</i>
                <input id="register-surname" type="text" class="@error('register-surname') invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="family-name">
                <label for="register-surname">{{ __('form.surname') }}</label>

                <!-- Error message here -->
                @error('register-surname')
                    <span class="helper-text" data-error="{{ $message }}" data-success="right"></span>
                @enderror
            </div>
        </div>

        <!-- (Register) E-Mail input -->
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons-outlined prefix">email</i>
                <input id="register-email" type="email" class="@error('register-email') invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label for="register-email">{{ __('form.email') }}</label>

                <!-- Error message here -->
                @error('register-email')
                    <span class="helper-text" data-error="{{ $message }}" data-success="?"></span>
                @enderror
            </div>
        </div>

        <!-- (Register) Password input -->
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons-outlined prefix">lock_open</i>
                <input id="register-password" type="password" class="@error('register-password') invalid @enderror" name="password" required autocomplete="new-password">
                <label for="register-password">{{ __('form.password') }}</label>

                <!-- Error message here -->
                @error('register-password')
                    <span class="helper-text" data-error="{{ $message }}" data-success="?"></span>
                @enderror
            </div>
        </div>

        <!-- (Register) Password confirmation input -->
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons-outlined prefix">lock</i>
                <input id="password-confirm" type="password" name="password-confirm" required autocomplete="new-password">
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
    </form>
</div>
