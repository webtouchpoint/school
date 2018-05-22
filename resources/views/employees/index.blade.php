@extends('layouts.app')

@section('title')
    Employees
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Employees <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('employees.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Employee
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="employee-table">
	    <thead>
	    	<th>Serial</th>
	        <th>Name</th>
	        <th>Position</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($employees as $employee)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $employee->name }}
	                </td>
	                <td>
	                    {{ $employee->employeePosition->name }}
	                </td>
	                <td>
	                    <a href="{{ route('employees.edit', $employee->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
	                        @click="destroy(
								'{{ $employee->id }}',
								'{{ $employee->name }}', 
								'employee',
								'/employees/', 
								'#modal-delete-employee'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button> 
                    </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="3">
	                    No employee exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-employee
    @endslot
	Are you sure you want to delete the employee
	<kbd><span>@{{ name }}</span></kbd>?
@endcomponent


@endsection

@section('scripts')
  <script>
    $(function() {
      $("#employee-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection