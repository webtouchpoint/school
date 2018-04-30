@extends('layouts.app')

@section('title')
    Accounts Heads
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Accounts Head <small>&raquo; Add New Accounts Head</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    New Accounts Head Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('accounts-heads.store') }}">
                    @include('accounts.accounts_heads.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection
