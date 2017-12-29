@extends('layouts.app')

@section('title')
    Settings
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    School Details
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('school.store') }}">
                    @include('settings.school.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
