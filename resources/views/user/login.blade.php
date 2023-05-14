<div class="row">
    <form class="col s12" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- (Login) E-Mail input -->
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons-outlined prefix">email</i>
                <input id="login-email" type="email" class="@error('login-email') invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label for="login-email">{{ __('form.email') }}</label>

                <!-- Error message here -->
                @error('login-email')
                    <span class="helper-text" data-error="{{ $message }}" data-success="?"></span>
                @enderror
            </div>
        </div>

        <!-- (Login) Password input -->
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons-outlined prefix">lock</i>
                <input id="login-password" type="password" class="@error('login-password') invalid @enderror" name="password" required autocomplete="current-password">
                <label for="login-password">{{ __('form.password') }}</label>

                <!-- Error message here -->
                @error('login-password')
                    <span class="helper-text" data-error="{{ $message }}" data-success="?"></span>
                @enderror
            </div>
        </div>

        <!-- Submit button -->
        <div class="row">
            <div class="input-field col s12">
                <button type="submit" class="btn waves-effect waves-light red darken-2">
                    {{ __('form.login_action') }}
                </button>
            </div>
        </div>
    </form>
</div>
