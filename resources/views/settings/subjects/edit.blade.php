@extends('layouts.app', [
    'vueView' => 'subject-form-view'
])

@section('title')
	Subjects - Edit
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Subjects <small>&raquo; Edit Subject</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Subject Edit Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('subjects.update', $subject->id) }}">
                    {{ method_field('PATCH') }}
                    @include('settings.subjects.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection