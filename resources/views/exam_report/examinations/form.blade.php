{{ csrf_field() }}

<div class="form-group{{ $errors->has('school_session_id') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Select Session:</label>
	 <div class="col-md-6">
	    <select class="form-control" id="school_session_id" name="school_session_id">
	        <option selected disabled>Choose a session...</option>
	        @if (count($schoolSessions) > 0) 
	            @foreach ($schoolSessions as $schoolSession)
	                <option 
	                	value="{{ $schoolSession->id }}"
	                	{{ old('school_session_id', optional($examination->schoolSession)->id) == $schoolSession->id ? ' selected' : '' }}>
	                		{{ $schoolSession->session}}
	            	</option>
	            @endforeach
	        @endif
	    </select>

		{!! $errors->first('school_session_id', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-4 control-label">Examination:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control" 
			value="{{ old('name', $examination->name) }}" 
			id="name" name="name">

		{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
	<label for="start_date" class="col-md-4 control-label">Start Date:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control datepicker" 
			value="{{ old('start_date', optional($examination->start_date)->format('d-m-Y')) }}" 
			id="start_date" name="start_date">

		{!! $errors->first('start_date', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
	<label for="end_date" class="col-md-4 control-label">End Date:</label>
	 <div class="col-md-6">
		<input type="text" 
			class="form-control datepicker" 
			value="{{ old('end_date', optional($examination->end_date)->format('d-m-Y')) }}" 
			id="end_date" name="end_date">

		{!! $errors->first('end_date', '<span class="help-block">:message</span>') !!}
	</div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('examinations.index') }}" class="btn btn-default" role="button">Cancel</a>
    </div>
</div>