@extends('layouts.app')

@section('title')
    Sessions
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Sessions <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('school-sessions.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Session
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="school-session-table">
	    <thead>
	    	<th>Serial</th>
	        <th>Session</th>
	        <th>Start Date</th>
	        <th>End Date</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($schoolSessions as $schoolSession)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $schoolSession->session }}
	                </td>
	                <td>
	       				{{ $schoolSession->start_date->format('d-m-Y') }}
	                </td>
	                <td>
	                    {{ $schoolSession->end_date->format('d-m-Y') }}
	                </td>
	                <td>
	                    <a href="{{ route('school-sessions.edit', $schoolSession->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
	                        @click="destroy(
								'{{ $schoolSession->id }}',
								'{{ $schoolSession->session }}', 
								'session',
								'/settings/school-sessions/', 
								'#modal-delete-school-session'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="5">
	                    No session exists.
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
      $("#school-session-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection