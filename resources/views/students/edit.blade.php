@extends('layouts.app', [
    'vueView' => 'admission-form-view'
])

@section('title')
    Student
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @component('components.panelWithHeading')
                @slot('title')
                    Student Info Edit Form
                @endslot 
               <form role="form" method="POST" action="{{ route('students.update', $student->id) }}">
                    {{ method_field('PATCH') }}

                    @include('students.form', [
                        'isEdit' => true
                    ])
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
