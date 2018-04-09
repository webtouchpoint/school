@extends('layouts.app')

@section('title')
	Settings
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>School <small>&raquo; Edit School Details</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @component('components.panelWithHeading')
                            @slot('title')
                    School Edit Form
                @endslot
                
                <form class="form-horizontal" method="POST" action="{{ route('school.update', $school->id) }}">
                    {{ method_field('PATCH') }}
                    @include('settings.school.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
