@extends('layouts.app')

@section('title')
    Employee
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @component('components.panelWithHeading')
                @slot('title')
                    Employee Edit Form
                @endslot 
               <form role="form" method="POST" action="{{ route('employees.update', $employee->id) }}">
                    {{ method_field('PATCH') }}

                    @include('employees.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
