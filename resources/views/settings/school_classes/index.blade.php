@extends('layouts.app')

@section('title')
    Classes
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Classes <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('school-classes.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Class
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="school-class-table">
	    <thead>
	        <th>Serial</th>
	        <th>Class</th>
	        <th>Numeric</th>
	        <th>Description</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($schoolClasses as $schoolClass)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $schoolClass->name }}
	                </td>
	                <td>
	       				{{ $schoolClass->numeric }}
	                </td>
	                <td>
	                    {{ $schoolClass->description }}
	                </td>
	                <td>
	                    <a href="{{ route('school-classes.edit', $schoolClass->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
	                        @click="destroy(
								'{{ $schoolClass->id }}',
								'{{ $schoolClass->name }}', 
								'class',
								'/settings/school-classes/', 
								'#modal-delete-school-class'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="5">
	                    No class exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-school-class
    @endslot
	Are you sure you want to delete the
	<kbd><span>@{{ name }}</span></kbd>
	@{{ type }}?
@endcomponent


@endsection

@section('scripts')
  <script>
    $(function() {
      $("#school-class-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection