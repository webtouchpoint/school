@extends('layouts.app')

@section('title')
    Social Category
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Social Category - Create
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('social-categories.store') }}">
                    @include('settings.social_categories.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
