@extends('layouts.app')

@section('title')
    Home
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')
<div class="container home">
    <div class="row page-title">
        <div class="col-md-12">
            <h3>Dashboard <small>&raquo; welcome</small></h3>
        </div>
    </div>
 
     <div class="panel panel-default">
        <div class="panel-heading">Calendar</div>

        <div class="panel-body">
            {!! $calendar->calendar() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection
