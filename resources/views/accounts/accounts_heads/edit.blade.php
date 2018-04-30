@extends('layouts.app')

@section('title')
	Social Category
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Accounts Heads <small>&raquo; Edit Accounts Head</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Accounts Head  Edit Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('accounts-heads.update', $accountsHead->id) }}">
                    {{ method_field('PATCH') }}
                    @include('accounts.accounts_heads.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection