@extends('layouts.app')

@section('title')
    Examinations
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Examinations <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('examinations.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Examination
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="examination-table">
	    <thead>
	        <th>Serial</th>
	        <th>Session</th>
	        <th>Name</th>
	        <th>Start Date</th>
	        <th>End Date</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($examinations as $examination)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $examination->schoolSession->session }}
	                </td>	
	                <td>
	                    {{ $examination->name }}
	                </td>
	                <td>
	                    {{ $examination->start_date->format('d-m-Y') }}
	                </td>	

	                <td>
	                    {{ $examination->end_date->format('d-m-Y') }}
	                </td>	                 
	                <td>
	                    <a href="{{ route('examinations.edit', $examination->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
   	                        @click="destroy(
								'{{ $examination->id }}',
								'{{ $examination->name }}', 
								'examination',
								'/exam-report/examinations/', 
								'#modal-delete-examination',
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="7">
	                    No examination exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-examination
    @endslot
      Are you sure you want to delete the
      <kbd><span>@{{ name }}</span></kbd> examination?
    
@endcomponent


@endsection

@section('scripts')
  <script>
    $(function() {
      $("#examination-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection