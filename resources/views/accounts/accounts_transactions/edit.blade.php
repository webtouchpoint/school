@extends('layouts.app')

@section('title')
	Income/Expense
@endsection

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>Income/Expense <small>&raquo; Edit Income/Expense</small></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @component('components.panelWithHeading')
                @slot('title')
                    Edit Form
                @endslot

               <form class="form-horizontal" method="POST" action="{{ route('accounts-transactions.update', $accountsTransaction->id) }}">
                    {{ method_field('PATCH') }}
                    @include('accounts.accounts_transactions.form')
                </form>
            @endcomponent
        </div>
    </div>
</div>
@endsection