@extends('layouts.app')

@section('title')
	Fees Categories
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Fees Categories - Edit
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('fees-categories.update', $feesCategory->id) }}">
                    {{ method_field('PATCH') }}
                    @include('settings.fees_categories.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection