@extends('layouts.app')

@section('title')
    Social Category
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Social Category <small>&raquo; Add New Social Category</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Social Category Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('social-categories.store') }}">
                    @include('settings.social_categories.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
