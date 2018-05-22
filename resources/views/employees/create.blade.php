@extends('layouts.app')

@section('title')
    Employees
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @component('components.panel')
                <p class="bg-primary form-title">New Employee Form</p>

               <form role="form" method="POST" action="{{ route('employees.store') }}">
                    @include('employees.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
