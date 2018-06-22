@extends('layouts.app')

@section('title')
	Event
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Event <small>&raquo; Edit Event</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Event  Edit Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('events.update', $event->id) }}">
                    {{ method_field('PATCH') }}
                    @include('events.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection