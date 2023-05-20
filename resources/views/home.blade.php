@extends('layouts.app')

@section('content')
    <div class="section">

        @if (session('status'))
            <div class="card-panel  @if(session('failed')) white-text red @else black-text teal @endif accent-3">
                {{ session('status') }}
            </div>
        @endif

        @hasanyrole('teacher|student')
            <div>
                <h4>{{ __('home.title') }}</h4>
                {{ __('home.logged_in', ['name' => Auth::user()->name]) }}
            </div>

            @hasrole('student')
                {{ __('home.role_student') }}
            @endrole

            @hasrole('teacher')
                {{ __('home.role_teacher') }}
            @endrole
        @else
            <div>
                <h3>{{ __('home.choose_role') }}</h3>
                {{ __('home.choose_role_warning') }}
            </div>

            <br>

            <div class="row">
                <!-- Select a student role -->
                <a href="{{ route('home.select', ['role' => 'student']) }}" class="card-panel col s12 waves-effect waves-light white-text hoverable blue darken-1">
                    <i class="large material-icons">school</i>
                    <h4 class="promo-caption ">{{ __('home.role_student') }}</h4>
                </a>

                <!-- Select a teacher role -->
                <a href="{{ route('home.select', 'teacher') }}" class="card-panel col s12 waves-effect waves-light white-text hoverable green darken-1">
                    <i class="large material-icons-outlined">import_contacts</i>
                    <h4 class="promo-caption ">{{ __('home.role_teacher') }}</h4>
                </a>
            </div>
        @endrole
    </div>
@endsection
