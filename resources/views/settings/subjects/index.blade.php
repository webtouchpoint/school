@extends('layouts.app')

@section('title')
    Subjects
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Subjects <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('subjects.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Subject
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="subject-table">
	    <thead>
	        <th>Serial</th>
	        <th>Name</th>
	        <th>Class</th>
	        <th>Subject Group</th>
	        <th>Description</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($subjects as $subject)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $subject->name }}
	                </td>
	                <td>
	                    {{ $subject->schoolClass->name }}
	                </td>
	                <td>
	                    {{ $subject->subjectGroup->name }}
	                </td>	                	                
	                <td>
	                    {{ $subject->description }}
	                </td>
	                <td>
	                    <a href="{{ route('subjects.edit', $subject->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
	                        @click="destroy(
								'{{ $subject->id }}',
								'{{ $subject->name }}', 
								'subject',
								'/settings/subjects/', 
								'#modal-delete-subject',
								'{{ $subject->schoolClass->name }}'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="6">
	                    No subject exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-subject
    @endslot
	Are you sure you want to delete the subject
	<kbd><span>@{{ name }}</span></kbd> of
	class <kbd><span>@{{ optional_msg }}</span></kbd>?
@endcomponent


@endsection

@section('scripts')
  <script>
    $(function() {
      $("#subject-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection