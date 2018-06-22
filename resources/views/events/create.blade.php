@extends('layouts.app')

@section('title')
    Event
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Event <small>&raquo; Add New Event</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Evnet Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('events.store') }}">
                    @include('events.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
