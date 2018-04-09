@extends('layouts.app')

@section('title')
	Class
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Classes <small>&raquo; Edit Class</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Class Edit Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('school-classes.update', $schoolClass->id) }}">
                    {{ method_field('PATCH') }}
                    @include('settings.school_classes.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection