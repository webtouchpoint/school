@extends('layouts.app')

@section('title')
   Income/Expense
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Income/Expense <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('accounts-transactions.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Record
	        </a>
	    </div>
	</div>

	<table class="table table-bordered table-striped" id="accounts-transactions-table">
	    <thead>
	        <th>Serial</th>
	        <th>Head</th>
	        <th>Purpose</th>
	        <th>Amount</th>
	        <th>Date</th>
	        <th>Operator</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($accountsTransactions as $accountsTransaction)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $accountsTransaction->accountsHead->accounts_head }}
	                </td>
	                <td>
	                    {{ $accountsTransaction->purpose }}
	                </td>
	                <td>
	                	 {{ $accountsTransaction->amount }}
	                </td>
	                <td>
	                	 {{ $accountsTransaction->created_at->format('d-m-Y') }}
	                </td>
	                <td>
	                	 {{ $accountsTransaction->user->username }}
	                </td>
	                <td>
	                    <a href="{{ route('accounts-transactions.edit', $accountsTransaction->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
   	                        @click="destroy(
								'{{ $accountsTransaction->id }}',
								'{{ $accountsTransaction->purpose }}', 
								'accounts head',
								'/accounts/accounts-transactions/', 
								'#modal-delete-accounts-transaction'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="5">
	                    No Accounts Head exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-accounts-transaction
    @endslot
	Are you sure you want to delete the record
	<kbd><span>@{{ name }}</span></kbd>?
@endcomponent

@endsection

@section('scripts')
  <script>
    $(function() {
      $("#accounts-transactions-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection