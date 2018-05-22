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
            @component('components.panel')
                <p class="bg-primary form-title">New Admission Form</p>

               <form role="form" method="POST" action="{{ route('students.store') }}">
                    @include('students.form', [
                        'isEdit' => false
                    ])
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
