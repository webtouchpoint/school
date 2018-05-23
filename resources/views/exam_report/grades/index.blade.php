@extends('layouts.app')

@section('title')
	Grades
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Grades <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('grades.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Grading Level
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="social-grade-table">
	    <thead>
	        <th>Serial</th>
	        <th>Letter Grade</th>
	        <th>Marks</th>
	        <th>Performance</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($grades as $grade)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $grade->letter_grade }}
	                </td>
	                <td>
	                    {{ $grade->marks_from }} - {{ $grade->marks_to }}
	                </td>
	                <td>
	                    {{ $grade->performance }}
	                </td>
	                <td>
	                    <a href="{{ route('grades.edit', $grade->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
   	                        @click="destroy(
								'{{ $grade->id }}',
								'{{ $grade->letter_grade }}', 
								'grading level',
								'/exam-report/grades/', 
								'#modal-delete-grade'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="6">
	                    No Grading level exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-grade
    @endslot
	Are you sure you want to delete the
	<kbd><span>@{{ name }}</span></kbd>
	@{{ type }}?
@endcomponent

@endsection

@section('scripts')
  <script>
    $(function() {
      $("#social-grade-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection