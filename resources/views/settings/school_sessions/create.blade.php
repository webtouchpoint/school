@extends('layouts.app')

@section('title')
    Session
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Session Details
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('school-sessions.store') }}">
                    @include('settings.school_sessions.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
