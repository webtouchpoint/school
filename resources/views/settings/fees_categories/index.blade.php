@extends('layouts.app')

@section('title')
    Fees Category
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Fees Category <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('fees-categories.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Fees Category
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="fees-category-table">
	    <thead>
	        <th>Serial</th>
	        <th>Name</th>
	        <th>Description</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($feesCategories as $feesCategory)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $feesCategory->name }}
	                </td>
	                <td>
	                    {{ $feesCategory->description }}
	                </td>
	                <td>
	                    <a href="{{ route('fees-categories.edit', $feesCategory->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
   	                        @click="destroy(
								'{{ $feesCategory->id }}',
								'{{ $feesCategory->name }}', 
								'fees category',
								'/settings/fees-categories/', 
								'#modal-delete-fees-category'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="4">
	                    No fees category exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-fees-category
    @endslot
	Are you sure you want to delete the
	<kbd><span>@{{ name }}</span></kbd>
	@{{ type }}?
@endcomponent


@endsection

@section('scripts')
  <script>
    $(function() {
      $("#fees-category-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection