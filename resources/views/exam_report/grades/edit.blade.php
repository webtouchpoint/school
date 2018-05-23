@extends('layouts.app')

@section('title')
	Gardes
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Gardes <small>&raquo; Edit Grading Level</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Grading Level Edit Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('grades.update', $grade->id) }}">
                    {{ method_field('PATCH') }}
                    @include('exam_report.grades.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection