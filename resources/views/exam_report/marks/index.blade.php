@extends('layouts.app')

@section('title')
    Marks
@endsection

@section('content')
<div class="container">
	<div class="row page-title-row">
	    <div class="col-md-6">
	        <h3>Marks <small>&raquo; Listing</small></h3>
	    </div>
	    <div class="col-md-6 text-right">
	        <a href="{{ route('marks.create') }}" class="btn btn-success btn-md">
	            <i class="fa fa-plus-circle"></i> New Marks
	        </a>
	    </div>
	</div>

	<table class="table table-bordered" id="marks-table">
	    <thead>
	        <th>Serial</th>
	        <th>Class</th>
	        <th>Subject</th>
	        <th>Examination</th>
	        <th>Marks</th>
			<th data-sortable="false">Actions</th>
	    </thead>   
	    <tbody>
	        @forelse ($allMarks as $marks)
	            <tr>
	                <td>
	                    {{ $loop->index + 1 }}
	                </td>
	                <td>
	                    {{ $marks->schoolClass->name }}
	                </td>
	                <td>
	                    {{ $marks->subject->name }}
	                </td>
	                <td>
	                    {{ $marks->examination->name }}
	                </td>	                	                
	                <td>
	                    {{ $marks->marks }}
	                </td>
	                <td>
	                    <a href="{{ route('marks.edit', $marks->id) }}"
	                        class="btn btn-xs btn-info">
	                        <i class="fa fa-edit"></i> Edit
	                    </a>  
	                </td>
	            </tr>
	        @empty
	            <tr>
	                <td colspan="6">
	                    No marks exists.
	                </td>
	            </tr>
	        @endforelse
	    </tbody>
	</table>
</div>

@endsection

@section('scripts')
  <script>
    $(function() {
      $("#marks-table").DataTable({
        order: [[0, "asc"]]
      });
    });
</script>
@endsection