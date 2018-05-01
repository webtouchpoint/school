@extends('layouts.app')

@section('title')
    Accounts Head
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Accounts Head <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('accounts-heads.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Accounts Head
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="accounts-heads-table">
	    <thead>
	        <th>Serial</th>
	        <th>Category</th>
	        <th>Accounts Head</th>
	        <th>Status</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($accountsHeads as $accountsHead)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $accountsHead->category }}
	                </td>
	                <td>
	                    {{ $accountsHead->accounts_head }}
	                </td>
	                <td>
	                    @if($accountsHead->is_active == 1)
	                     	<span class="text-success"><i class="fa fa-circle" aria-hidden="true"></i></span>
	                     @else
	                     	<span class="text-warning"><i class="fa fa-circle" aria-hidden="true"></i></span>
 						@endif
	                </td>
	                <td>
	                    <a href="{{ route('accounts-heads.edit', $accountsHead->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
   	                        @click="destroy(
								'{{ $accountsHead->id }}',
								'{{ $accountsHead->accounts_head }}', 
								'accounts head',
								'/accounts/accounts-heads/', 
								'#modal-delete-accounts-head'
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
        modal-delete-accounts-head
    @endslot
	Are you sure you want to delete the
	<kbd><span>@{{ name }}</span></kbd>
	@{{ type }}?
@endcomponent

@endsection

@section('scripts')
  <script>
    $(function() {
      $("#accounts-heads-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection