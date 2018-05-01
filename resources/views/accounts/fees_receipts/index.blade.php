@extends('layouts.app')

@section('title')
   Fees Receipts
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-12">
	        <h3>Fees Receipts <small>&raquo; Listing</small></h3>
	    </div>
	</div>

	<table class="table table-bordered table-hover" id="fees-receipts-table">
	    <thead>
	        <th>Receipt No.</th>
	        <th>Amount</th>
	        <th>Date</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($transactions as $transaction)
	            <tr>
	                <td>
	                    {{ $transaction->accountsTransaction->id }}
	                </td>
	                <td>
	                	{{ $transaction->accountsTransaction->amount }}
	                </td>
	                <td>
	                	{{ $transaction->accountsTransaction->created_at->format('d-m-Y') }}
	                </td>
	                <td>
	                	<a href="{{ route('fees-receipts.print', [
	                		'accounts_transaction_id' => $transaction->accountsTransaction->id,
	                		 'academic_info_id' => $transaction->academic_info_id
	                	]) }}" target="_blank">
	                		<i class="fa fa-print" aria-hidden="true"></i>
	                	</a>
	             		
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="4">
	                    No fees receipt exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>
@endsection
