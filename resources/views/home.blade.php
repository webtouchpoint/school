@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Home
                @endslot

                Welcome to Administration area.
            @endcomponent
        </div>
    </div>
</div>
@endsection
