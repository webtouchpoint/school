@extends('layouts.app', [
    'vueView' => 'fees-structure-form-view'
])

@section('title')
    Fees Structure
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Fees Structures <small>&raquo; Add New Fees Structure</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Fees Structure Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('fees-structures.store') }}">
                    @include('settings.fees_structures.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
