@extends('layouts.app', [
    'vueView' => 'marks-entry-form-view'
])

@section('title')
    Set Marks
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Marks Entry<small>&raquo; Student Wise Marks Entry </small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Marks Entry Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('student-marks.store') }}">
                    @include('exam_report.student_marks.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
