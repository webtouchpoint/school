@extends('layouts.app')

@section('title')
    Session - Create
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Sessions <small>&raquo; Add New Session</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Session Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('school-sessions.store') }}">
                    @include('settings.school_sessions.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
