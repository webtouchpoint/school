@extends('layouts.app')

@section('title')
    Examination
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Examinations <small>&raquo; Add New Examination</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Examination Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('examinations.store') }}">
                    @include('exam_report.examinations.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
