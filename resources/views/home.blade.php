@extends('layouts.app')

@section('content')
    <div class="section">
        <div>
            <h4 class="col s12">{{ __('home.title') }}</h4>
            {{ __('home.logged_in', ['name' => Auth::user()->name]) }}
        </div>

        @if (session('status'))
            <div class="card-panel black-text teal accent-3">
                {{ session('status') }}
            </div>
        @endif
    </div>
@endsection
