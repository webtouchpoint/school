@extends('layouts.app')

@section('title')
    Fees Categories
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Fees Categories <small>&raquo; Add New Fees Category</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Fees Category Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('fees-categories.store') }}">
                    @include('settings.fees_categories.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
