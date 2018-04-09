@extends('layouts.app')

@section('title')
    Social Categories
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Social Categories <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('social-categories.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Social Category
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="social-category-table">
	    <thead>
	        <th>Serial</th>
	        <th>Name</th>
	        <th>Description</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($socialCategories as $socialCategory)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $socialCategory->name }}
	                </td>
	                <td>
	                    {{ $socialCategory->description }}
	                </td>
	                <td>
	                    <a href="{{ route('social-categories.edit', $socialCategory->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
   	                        @click="destroy(
								'{{ $socialCategory->id }}',
								'{{ $socialCategory->name }}', 
								'social category',
								'/settings/social-categories/', 
								'#modal-delete-social-category'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="4">
	                    No Social Category exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-social-category
    @endslot
	Are you sure you want to delete the
	<kbd><span>@{{ name }}</span></kbd>
	@{{ type }}?
@endcomponent

@endsection

@section('scripts')
  <script>
    $(function() {
      $("#social-category-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection