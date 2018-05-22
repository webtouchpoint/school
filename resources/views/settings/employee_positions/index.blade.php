@extends('layouts.app')

@section('title')
	Employee Positions
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Employee Positions <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('employee-positions.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Employee Position
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="employee-position-table">
	    <thead>
	        <th>Serial</th>
	        <th>Name</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($employeePositions as $employeePosition)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $employeePosition->name }}
	                </td>
	                <td>
	                    <a href="{{ route('employee-positions.edit', $employeePosition->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
   	                        @click="destroy(
								'{{ $employeePosition->id }}',
								'{{ $employeePosition->name }}', 
								'employee position',
								'/settings/employee-positions/', 
								'#modal-delete-employee-position'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="4">
	                    No Employee Position exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-employee-position
    @endslot
	Are you sure you want to delete the
	<kbd><span>@{{ name }}</span></kbd>
	@{{ type }}?
@endcomponent

@endsection

@section('scripts')
  <script>
    $(function() {
      $("#employee-position-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection