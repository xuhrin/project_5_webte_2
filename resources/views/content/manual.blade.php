@if (isset($pdf))
    <!DOCTYPE html>
    <html lang="{{ $locale }}">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __('manual.title') }}</title>
    </head>

    <style>
        @font-face {
            font-family: 'OpenSans';
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/OpenSans.ttf') }}') format('truetype');
        }

        html, body {
            font-family: 'OpenSans';
            font-size: 14px;
        }

        .section {
            text-align: center;
        }

        .left-align {
            text-align: left;
        }
    </style>

    <body>
@endif

{{-- This is reduced view, so that it builds manual faster --}}

<div class="section">
    <h1>{{ __('manual.title') }}</h1>
</div>

<div class="section left-align">
    <h4>{{ __('manual.login_title') }}</h4>
    <ul class="collection">
        <li class="collection-item">
            {{ __('manual.login_begin', ['login' => __('app.login')]) }}
            <ul class="collection">
                <li class="collection-item">
                    {{ __('manual.login_register', ['register' => __('form.register_action')]) }}</li>
                <li class="collection-item">{{ __('manual.login_forgot', ['forgot' => __('form.forgot')]) }}</li>
            </ul>
        </li>
        <li class="collection-item">{{ __('manual.login_write') }}</li>
        <li class="collection-item">{{ __('manual.login_remember', ['remember' => __('form.remember')]) }}</li>
        <li class="collection-item">{{ __('manual.login_submit', ['submit' => __('form.login_action')]) }}</li>
    </ul>
</div>

<div class="section left-align">
    <h4>{{ __('manual.logout_title') }}</h4>
    <ul class="collection">
        <li class="collection-item">{{ __('manual.logout_begin') }}</li>
        <li class="collection-item">{{ __('manual.logout_submit', ['submit' => __('app.logout')]) }}</li>
    </ul>
</div>

<div class="section left-align">
    <h4>{{ __('manual.register_title') }}</h4>
    <ul class="collection">
        <li class="collection-item">
            {{ __('manual.register_begin', ['section' => __('manual.login_title'), 'register' => __('form.register_action')]) }}
        </li>
        <li class="collection-item">{{ __('manual.register_write') }}</li>
        <li class="collection-item">{{ __('manual.register_submit', ['submit' => __('form.register_action')]) }}</li>
    </ul>
</div>

<div class="section left-align">
    <h4>{{ __('manual.reset_title') }}</h4>
    <ul class="collection">
        <li class="collection-item">{{ __('manual.reset_begin', ['section' => __('manual.login_title'), 'reset' => __('form.forgot')]) }}</li>
        <li class="collection-item">{{ __('manual.reset_write') }}</li>
        <li class="collection-item">{{ __('manual.reset_submit', ['submit' => __('form.send_reset_link')]) }}</li>
        <li class="collection-item">{{ __('manual.reset_email') }}</li>
        <li class="collection-item">{{ __('manual.reset_write_new') }}</li>
        <li class="collection-item">{{ __('manual.reset_submit_new', ['submit' => __('form.reset_action')]) }}</li>
    </ul>
</div>

<div class="section left-align">
    <h4>{{ __('manual.language_title') }}</h4>
    <ul class="collection">
        <li class="collection-item">{{ __('manual.language_begin', ['language' => __('app.language')]) }}</li>
        <li class="collection-item">{{ __('manual.language_submit') }}</li>
    </ul>
</div>

<div class="section left-align">
    <h4>{{ __('manual.role_title') }}</h4>
    <ul class="collection">
        <li class="collection-item">{{ __('manual.role_begin') }}</li>
        <li class="collection-item">{{ __('manual.role_submit', ['student' => __('home.role_student'), 'teacher' => __('home.role_teacher')]) }}</li>
    </ul>
</div>

@if (isset($pdf))
    </body>

    </html>
@endif
