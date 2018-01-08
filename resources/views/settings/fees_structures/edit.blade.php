@extends('layouts.app', [
    'vueView' => 'fees-structure-form-view'
])

@section('title')
	Fees Structure
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Fees Structure - Edit
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('fees-structures.update', $feesStructure->id) }}">
                    {{ method_field('PATCH') }}
                    @include('settings.fees_structures.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection