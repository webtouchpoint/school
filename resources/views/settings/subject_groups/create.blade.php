@extends('layouts.app')

@section('title')
    Subject Group - Create
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Subject Group - Create
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('subject-groups.store') }}">
                    @include('settings.subject_groups.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
