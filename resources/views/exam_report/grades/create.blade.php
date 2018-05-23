@extends('layouts.app')

@section('title')
    Grades
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Grades <small>&raquo; Add New Grading Level</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Grading Level Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('grades.store') }}">
                    @include('exam_report.grades.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
