@extends('layouts.app')

@section('title')
	Subject Group
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Subject Groups <small>&raquo; Edit Subject Group</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Subject Group Edit Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('subject-groups.update', $subjectGroup->id) }}">
                    {{ method_field('PATCH') }}
                    @include('settings.subject_groups.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection