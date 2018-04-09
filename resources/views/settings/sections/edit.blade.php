@extends('layouts.app')

@section('title')
	Sections
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Sections <small>&raquo; Edit Sections</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Section Edit Form 
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('sections.update', $section->id) }}">
                    {{ method_field('PATCH') }}
                    @include('settings.sections.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection