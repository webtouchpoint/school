@extends('layouts.app')

@section('title')
    Section - Create
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Section <small>&raquo; Add New Session</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Section Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('sections.store') }}">
                    @include('settings.sections.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
