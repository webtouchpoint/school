@extends('layouts.app', [
    'vueView' => 'marks-form-view'
])

@section('title')
    Marks
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Marks <small>&raquo; Add New Marks</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Marks Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('marks.store') }}">
                    @include('exam_report.marks.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
