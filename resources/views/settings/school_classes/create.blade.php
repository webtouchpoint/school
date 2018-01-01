@extends('layouts.app')

@section('title')
    Class - Create
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Classes - Create
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('school-classes.store') }}">
                    @include('settings.school_classes.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
