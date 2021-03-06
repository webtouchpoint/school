@extends('layouts.app')

@section('title')
    Employee Positions
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Employee Positions <small>&raquo; Add New Employee Position</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Employee Position Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('employee-positions.store') }}">
                    @include('settings.employee_positions.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
