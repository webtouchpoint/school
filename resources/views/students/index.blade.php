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
	            </tr>
	        @empty
	            <tr>
	                <td colspan="2">
	                    No student exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-school-session
    @endslot
	Are you sure you want to delete the
	<kbd><span>@{{ name }}</span></kbd>
	@{{ type }}?
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