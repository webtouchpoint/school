@extends('layouts.app', [
    'vueView' => 'subject-form-view'
])

@section('title')
    Subject - Create
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Subject - Create
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('subjects.store') }}">
                    @include('settings.subjects.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
