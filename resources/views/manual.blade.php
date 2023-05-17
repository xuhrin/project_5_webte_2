@extends('layouts.app')

@section('content')

    @include('content.manual')

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red" href="{{ route('manual.pdf') }}">
            <i class="large material-icons">picture_as_pdf</i>
        </a>
    </div>
@endsection
