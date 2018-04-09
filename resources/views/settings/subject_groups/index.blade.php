@extends('layouts.app')

@section('title')
    Subject Groups
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Subject Groups <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('subject-groups.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Subject Group
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="subject-group-table">
	    <thead>
	        <th>Serial</th>
	        <th>Name</th>
	        <th>Description</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($subjectGroups as $subjectGroup)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $subjectGroup->name }}
	                </td>
	                <td>
	                    {{ $subjectGroup->description }}
	                </td>
	                <td>
	                    <a href="{{ route('subject-groups.edit', $subjectGroup->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
	                        @click="destroy(
								'{{ $subjectGroup->id }}',
								'{{ $subjectGroup->name }}', 
								'subject group',
								'/settings/subject-groups/', 
								'#modal-delete-subject-group'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="4">
	                    No Suject Group exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-subject-group
    @endslot
	Are you sure you want to delete the
	<kbd><span>@{{ name }}</span></kbd>
	@{{ type }}?
@endcomponent


@endsection

@section('scripts')
  <script>
    $(function() {
      $("#subject-group-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection