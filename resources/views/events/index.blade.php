@extends('layouts.app')

@section('title')
    Events
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Events <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('events.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Event
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="event-table">
	    <thead>
	        <th>Serial</th>
	        <th>Title</th>
	        <th>Start Date</th>
	        <th>End Date</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($events as $event)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $event->title }}
	                </td>
	                <td>
	                    {{ $event->start_date->format('d-m-Y') }}
	                </td>
	                <td>
	                    {{ $event->end_date->format('d-m-Y') }}
	                </td>
	                <td>
	                    <a href="{{ route('events.edit', $event->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
   	                        @click="destroy(
								'{{ $event->id }}',
								'{{ $event->title }}', 
								'event',
								'/events/', 
								'#modal-delete-event'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="4">
	                    No event exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-event
    @endslot
	Are you sure you want to delete the
	<kbd><span>@{{ name }}</span></kbd>
	@{{ type }}?
@endcomponent

@endsection

@section('scripts')
  <script>
    $(function() {
      $("#event-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection