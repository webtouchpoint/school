@extends('layouts.app')

@section('title')
	Examinations
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Examinations <small>&raquo; Edit Examination</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                   Examination Edit Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('examinations.update', $examination->id) }}">
                    {{ method_field('PATCH') }}
                    @include('exam_report.examinations.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection