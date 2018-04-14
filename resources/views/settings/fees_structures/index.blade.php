@extends('layouts.app')

@section('title')
    Fees Structure
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Fees Structure <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('fees-structures.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Fees Structure
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="fees-structure-table">
	    <thead>
	        <th>Serial</th>
	        <th>Name</th>
	        <th>Class</th>
	        <th>Session</th>
        	<th>Fees Category</th>
	        <th>Description</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($feesStructures as $feesStructure)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $feesStructure->name }}
	                </td>
	                <td>
	                    {{ $feesStructure->schoolClass->name }}
	                </td>	
	                <td>
	                    {{ $feesStructure->schoolSession->session }}
	                </td>		                 
	                <td>
	                    {{ $feesStructure->feesCategory->name }}
	                </td>	               
	                <td>
	                    {{ $feesStructure->description }}
	                </td>
	                <td>
	                    <a href="{{ route('fees-structures.edit', $feesStructure->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
   	                        @click="destroy(
								'{{ $feesStructure->id }}',
								'{{ $feesStructure->name }}', 
								'fees structure',
								'/settings/fees-structures/', 
								'#modal-delete-fees-structure',
								'{{ $feesStructure->schoolClass->name }}'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="6">
	                    No fees structure exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-fees-structure
    @endslot
      Are you sure you want to delete the
      <kbd><span>@{{ name }}</span></kbd> fees of
      class <kbd><span>@{{ optional_msg }}</span></kbd>?
@endcomponent


@endsection

@section('scripts')
  <script>
    $(function() {
      $("#fees-structure-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection