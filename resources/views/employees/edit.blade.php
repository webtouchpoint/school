@extends('layouts.app')

@section('title')
    Employee
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @component('components.panel')
                <p class="bg-primary form-title">Employee Edit Form</p>

               <form role="form" method="POST" action="{{ route('employees.update', $employee->id) }}">
                    {{ method_field('PATCH') }}

                    @include('employees.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
