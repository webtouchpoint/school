@extends('layouts.app')

@section('title')
    Student
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Students <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('students.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Admission
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="student-table">
	    <thead>
	    	<th>Serial</th>
	        <th>Name</th>
	        <th>Class</th>
	        <th>Roll Number</th>
	        <th>Father&#39s Name</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($academicInfos as $academicInfo)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $academicInfo->student->name }}
	                </td>
                  	<td>
	                    {{ $academicInfo->schoolClass->name }}
	                </td>
	                <td>
	                	{{ $academicInfo->roll_number }}
	                </td>
                    <td>
	                    {{ $academicInfo->student->fathers_name }}
	                </td>
	                <td>
	                    <a href="{{ route('students.edit', $academicInfo->student_id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
	                        @click="destroy(
								'{{ $academicInfo->student_id }}',
								'{{ $academicInfo->student->name }}', 
								'student',
								'/students/', 
								'#modal-delete-student',
								'{{ $academicInfo->schoolClass->name }}'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button> 
                    </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="4">
	                    No student exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-student
    @endslot
	Are you sure you want to delete the
	<kbd><span>@{{ name }}</span></kbd> student of
	class <kbd><span>@{{ optional_msg }}</span></kbd>?
@endcomponent


@endsection

@section('scripts')
  <script>
    $(function() {
      $("#student-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection