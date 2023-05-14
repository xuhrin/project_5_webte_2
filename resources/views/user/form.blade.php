@extends('layouts.app')

@section('content')
    <div class="section">
        <!-- Everything is inside a card -->
        <div class="card">
            <div class="card-content row">
                <!-- Tabs -->
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s6">
                            <a href="#login">{{ __('form.login') }}</a>
                        </li>
                        <li class="tab col s6">
                            <a href="#register">{{ __('form.register') }}</a>
                        </li>
                    </ul>
                </div>

                <!-- Login tab -->
                <div id="login" class="col s12">
                    @include('user.login')
                </div>

                <!-- Registration tab -->
                <div id="register" class="col s12">
                    @include('user.register')
                </div>
            </div>
        </div>
    </div>
@endsection
