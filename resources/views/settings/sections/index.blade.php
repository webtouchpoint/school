@extends('layouts.app')

@section('title')
    Sections
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Sections <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('sections.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Section
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="section-table">
	    <thead>
	        <th>Serial</th>
	        <th>Name</th>
	        <th>Class</th>
	        <th>Description</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($sections as $section)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $section->name }}
	                </td>
	                <td>
	       				{{ optional($section->schoolClass)->name }}
	                </td>
	                <td>
	                    {{ $section->description }}
	                </td>
	                <td>
	                    <a href="{{ route('sections.edit', $section->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a> 
		                <button type="button" class="btn btn-xs btn-danger"
   	                        @click="destroy(
								'{{ $section->id }}',
								'{{ $section->name }}', 
								'section',
								'/settings/sections/', 
								'#modal-delete-section',
								'{{ $section->schoolClass->name }}'
	                        )">
	                        <i class="fa fa-times-circle fa-lg"></i>
	                        Delete
	                    </button>   
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="5">
	                    No section exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@component('components.deleteConfirmationModal')
  	@slot('modal_id')
        modal-delete-section
    @endslot
      Are you sure you want to delete the section
      <kbd><span>@{{ name }}</span></kbd> of
      class <kbd><span>@{{ optional_msg }}</span></kbd>?
@endcomponent

@endsection

@section('scripts')
  <script>
    $(function() {
      $("#section-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection