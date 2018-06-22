@extends('layouts.app')

@section('title')
    Employees
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @component('components.panelWithHeading')
                @slot('title')
                    New Employee Form
                @endslot 
               <form role="form" method="POST" action="{{ route('employees.store') }}">
                    @include('employees.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
